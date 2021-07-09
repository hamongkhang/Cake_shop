<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
use App\Bill;
use App\Product;
use Auth;
use App\News;
use Cart;
use Srmklive\PayPal\Services\ExpressCheckout;
use App\User;
use Carbon\Carbon;
use App\Exports\UsersExport;
use App\Exports\UsersExportQuery;
use App\Exports\UsersExportView;
use Maatwebsite\Excel\Facades\Excel;



use App\ProductType;

class PageController extends Controller
{

    public function index()
    {
        $users = User::all();
        return View('list-users')->with(array('users'=>$users));
    }
 
    public function export(Request $request)
    {
        $type = $request->type;
        
        if($request->created!="" && $request->template==""){
            $now = new Carbon($request->created);
            $year = $now->year;
            $created = $request->created;
            return Excel::download(new UsersExportQuery($year,$created),'users.'.$type);
        }else if($request->created=="" && $request->template!=""){
 
            return Excel::download(new UsersExportView($request->template), 'users.'.$type);
        }
        return Excel::download(new UsersExport, 'users.'.$type);
    }




    public function thanhtoan(){
        return view('page.dat_hang');
    }

    public function postCheckout(Request $req){
        $cart = Session()->get('cart');

        $customer = new Customer;
        $customer->name = $req->name;
        $customer->gender = $req->gender;
        $customer->email = $req->email;
        $customer->address = $req->address;
        $customer->phone_number = $req->phone;
        $customer->note = $req->notes;
        $customer->save();

        $bill = new Bill;
        $bill->id_customer = $customer->id;
        $bill->date_order = date('Y-m-d');
        $bill->total = $cart->totalPrice;
        $bill->payment = $req->payment_method;
        $bill->note = $req->notes;
        $bill->save();

        foreach($cart->items as $key=>$value){
            $bill_detail = new BillDetail;
            $bill_detail->id_bill = $bill->id;
            $bill_detail->id_product = $key;//$value['item']['id'];
            $bill_detail->quantity = $value['qty'];
            $bill_detail->unit_price = $value['price']/$value['qty'];
            $bill_detail->save();
        }

        $message = [
            'type' => 'Đặt hàng thành công!!!',
            'cart' =>$cart,
            'thanks' =>$req->name,
            'content' => 'has been created!',
        ];
        SendEmail::dispatch($message, $req->email)->delay(now()->addMinute(1));
     
        
        Session()->forget('cart');
        return redirect()->back()->with('thongbao','Đặt hàng thành công');
    }



    public function getIndex(){
        $slide = Slide::all();
        $news=News::all();
        /*$products= Cart::content();*/
        $new_product = Product::where('new',1)->get();
        $sale_product =Product::where('promotion_price','<>',0)->get();
        $hot_product = Product::where('hot',1)->get();
        /*dd($new_product);*/
    	return view('page.index',compact('slide','new_product','sale_product','hot_product','news'));
    }

    public function getProduct($type){
        $product =Product::all();
        $type_product =ProductType::all();
        $sp_theoloai = Product::where('id_type',$type) ->get();
    	return view('page.product',compact('type_product','sp_theoloai','product'));
    }

    public function getProductdetail(Request $req){
        $product =Product::all();
        $type_product =ProductType::where('id',$req->id)->first();
        $productdetail= Product::where('id',$req->id)->first();
        $relatied =  Product::where('id_type',$productdetail->id_type)->get();
    	return view('page.productdetail',compact('productdetail','relatied','type_product'));
    }
    

    public function getAbout(){
    	return view('page.about');
    }

    public function getCart(){
    	return view('page.cart');
    }

     public function getLogout(){
        Auth::logout();
        return redirect(route('trangchu'));
    }
    public function payment()
    {
        $data = [];
        $data['items'] = [
            [
                'name' => 'ItSolutionStuff.com',
                'price' => 100,
                'desc'  => 'Description for ItSolutionStuff.com',
                'qty' => 1
            ]
        ];
  
        $data['invoice_id'] = 1;
        $data['invoice_description'] = "Order #{$data['invoice_id']} Invoice";
        $data['return_url'] = route('payment.success');
        $data['cancel_url'] = route('payment.cancel');
        $data['total'] = 100;
  
        $provider = new ExpressCheckout;
  
        $response = $provider->setExpressCheckout($data);
  
        $response = $provider->setExpressCheckout($data, true);
  
        return redirect($response['paypal_link']);
    }

    public function cancel()
    {
        dd('Your payment is canceled. You can create cancel page here.');
    }

    public function success(Request $request)
    {
        $response = $provider->getExpressCheckoutDetails($request->token);
  
        if (in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {
            dd('Your payment was successfully. You can create success page here.');
        }
  
        dd('Something is wrong.');
    }

    
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Session\Session;

use PDF;
use Srmklive\PayPal\Services\ExpressCheckout;

use App\Http\Requests\showProductRequest;
use App\Jobs\SendEmail;
use App\Models\Slide;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\Cart;
use App\Models\Customer;
use App\Models\Bill;
use App\Models\BillDetail;
use App\Models\Comment;


class PageController extends Controller
{
    public function getIndex(){
        //DB::table('news')->get(); truy vấn query builder
        $slide = Slide::all(); //truy vấn select tất cả dữ liệu, aloquent dùng tên model
        $new_product = Product::where('new',1)->paginate(6);
        $sanpham_khuyenmai = Product::where('promotion_price','<>',0)->paginate(8);
        // $new_product=Product::where('new',1)->get();
        // print_r($slide);
        // exit;
        //return view('page.trangchu',['slide'=>$slide]);
        // dd($new_product);
        return view('page.trangchu',compact('slide','new_product','sanpham_khuyenmai'));
    }
    public function getLoai($type){
        $sp_theloai = Product::where('id_type',$type)->get();
        $sp_khac = Product::where('id_type','<>',$type)->paginate(3);
        $loai = ProductType::all();
        $loap_sp = ProductType::where('id',$type)->first();
        return view('page.loai_sanpham',compact('sp_theloai','sp_khac','loai','loap_sp'));
    }
    public function getChitietSp(Request $req){
        $sanpham = Product::where('id',$req->id)->first();
        $sp_tuongtu = Product::where('id_type',$sanpham->id_type)->paginate(3);
        return view('page.chitiet_sanpham', compact('sanpham','sp_tuongtu'));
    }

    protected function comment(array $data){
        $comment = new Comment(); 
            $file = $request->file('image');
            $fileName = $file->getClientOriginalName('image'); 
            $file->move('source/image/product',$fileName);
            $file_name = null;
            if($request->file ('image')!= null){ 
            $file_name = $request->file('image')->getClientOriginalName();
            }
            $comment->message = $request->message; 
            $comment->anh = $file_name;
            $comment->id_product = $request->idd;
            $comment->save(); 
            return $this->getIndex();
    }
    


    public function getLienhe(){
        return view('page.lienhe');
    }
    public function getAbout(){
        return view('page.about');
    }
    //CRUD laravel
    //Trang admin
    public function getIndexAdmin(){
        $new_products = Product::all();
        return view('Admin.admin')->with(['products'=>$new_products]);
    }
    //form thêm dữ liệu
    public function getAdminAdd(){
        return view('Admin.formAdd');
    }
    //Phương thức thêm dữ liệu
    public function postAdminAdd(Request $request ) { 
        $product = new Product(); 
        if($request->hasFile('image')){ 
            $file = $request->file('image');
            $fileName = $file->getClientOriginalName('image'); 
            $file->move('source/image/product',$fileName);

            $file_name = null;
            if($request->file ('image')!= null){ 
            $file_name = $request->file('image')->getClientOriginalName();
            }
            $product->name = $request->name; 
            $product->image = $file_name;
            $product->description = $request->description; 
            $product->unit_price = $request->unit_price; 
            $product->promotion_price = $request->promotion_price; 
            $product->unit = $request->unit; 
            $product->new = $request->new; 
            $product->id_type = $request->type;
            $product->save(); 
            return $this->getIndexAdmin();
        }
    }
    //form edit dữ liệu
    public function getAdminEdit($id){
        $product = Product::find($id);
        return view('Admin.formEdit')->with(['product'=>$product]);
    }
    //phương thức edit dữ liệu
    public function postAdminEdit(Request $request ) { 
            $id = $request->id;
            $product = Product::find($id); 
        if($request->hasFile('image')){ 
            $file = $request->file('image');
            $fileName = $file->getClientOriginalName('image'); 
            $file->move('source/image/product',$fileName);
        }

            if($request->file ('image')!= null){ 
                $product->image=$fileName;
            }
            $product->name = $request->name;
            $product->id_type = $request->type; 
            $product->description = $request->description; 
            $product->unit_price = $request->unit_price; 
            $product->promotion_price = $request->promotion_price; 
            $product->unit = $request->unit; 
            $product->new = $request->new; 
            $product->save(); 
            return $this->getIndexAdmin();
    }

    // xóa dữ liệu

    public function postAdminDelete($id){
        $product = Product::find($id);
        $product->delete();
        return $this->getIndexAdmin();
    }

    //Giỏ hàng 
    //Thêm giỏ hàng
    public function getAddToCart(Request $req, $id){					
        $product = Product::find($id);		//tìm xem có sp nào có id này không?			
        $oldCart = Session('cart')?Session()->get('cart'):null;			// xem trong giỏ hàng có sp trong giỏ hàng hay không, nếu chưa có là null, nếu có rồi thì lấy Session('cart') gán cho oldcart		
        $cart = new Cart($oldCart);	//tạo 1 giỏ hàng mới và sau đó khởi gán cho giỏ hàng ban đầu				
        $cart->add($product,$id);	//có 2 tham số là item và id của product, thêm 1 sản phẩm mới vào giỏ hàng			
        $req->session()->put('cart', $cart);					
        return redirect()->back();		//trở về trang chủ			
    }			
    //Xóa giỏ hàng
    public function getDelItemCart($id){
        $oldCart = Session()->has('cart')?Session()->get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if(count($cart->items)>0){
        Session()->put('cart',$cart);
        }
        else{
            Session()->forget('cart');
        }
        return redirect()->back();
    }
		
    //Đặt hàng

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

//bill
    public function bill()
    {
        $bills= Bill::all();
        return view('Bill.bill', compact('bills'));
    }


    public function downloadPdf()
    {
        $bills = Bill::all();

        // share data to view
        view()->share('bill_pdf',$bills);
        $pdf = PDF::loadView('Bill.bill_pdf', ['bills' => $bills]);
        return $pdf->download('bill.pdf');
    }

// phương thức thành toán bằng paypal
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
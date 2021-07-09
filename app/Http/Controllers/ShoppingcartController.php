<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Cart;
use Session;
use App\Customer;
use App\Bill;
use App\BillDetail;
use App\User;
use App\Wishlist;
use App\Jobs\SendEmail;
use Mail;

class ShoppingcartController extends Controller
{
    public function addProduct(Request $req,$id){
    	$product=Product::select('name','id','unit_price','promotion_price','image')->find($id);

    	if(!$product) return redirect(route('trangchu'));

        /*$price = $product->unit_price;
        if ($product->promotion_price) {
            
            $price = $price*(100-$product->promotion_price)/100;

        }*/
        /*dd($product);*/
    	Cart::instance('shopping')->add([
    		'id' => $id,
    		'name' => $product->name,
    		'qty' => 1, 
            'price' => $product->unit_price, 
            
    		'weight' => 550,
    		'options' => [
                'image' =>  $product->image,
                'sale'=> $product->promotion_price,
                /*'price_old'=>$product->promotion_price*/

            ]
    	]);
    	return redirect()->back();
    }



    public function addProduct2(Request $req,$id){
    	$product=Product::select('name','id','unit_price','promotion_price','image')->find($id);

    	if(!$product) return redirect(route('trangchu'));

        /*$price = $product->unit_price;
        if ($product->promotion_price) {
            
            $price = $price*(100-$product->promotion_price)/100;

        }*/
        /*dd($product);*/
    	Cart::instance('wishlist')->add([
    		'id' => $id,
    		'name' => $product->name,
    		'qty' => 1, 
            'price' => $product->unit_price, 
            
    		'weight' => 550,
    		'options' => [
                'image' =>  $product->image,
                'sale'=> $product->promotion_price,
                /*'price_old'=>$product->promotion_price*/

            ]
    	]);
        $wishlist = new Wishlist(); 
        $wishlist->name=$product->name;
        $wishlist->id_product=$id;
        $wishlist->image=$product->image;
        $wishlist->qty=1;
        $wishlist->price=$product->unit_price;
        $wishlist->save(); 
    	return redirect()->back();
    }












    public function getList(){
    	$products= Cart::instance('shopping')->content();
    	return view('page.cart',compact('products'));
    }
    public function getList2(){
    	$products= Cart::instance('wishlist')->content();
    	return view('page.wishlist',compact('products'));
    }

    public function getCheckout(){
    	$products= Cart::instance('shopping')->content();
    	return view('page.checkout',compact('products'));
    }
    /*lưu thông tin đơn hàng*/
    public function postCheckout(Request $req){
        $totalMoney = str_replace(',','',Cart::instance('shopping')->subtotal());
        $billId=Bill::insertGetId([
            'id_customer'=>get_data_user('web'),
            'total'=>$totalMoney,
            'date_order'=>date('Y-m-d'),
            'status'=>0,
            'payment'=>$req->payment_method,
            'note'=>$req->notes
        ]);

        if($billId)
        {
            $products= Cart::instance('shopping')->content();
            foreach ($products as $product) {
                BillDetail::insert([
                    'id_bill'=>$billId,
                    'id_product'=>$product->id,
                    'quantity'=>$product->qty,
                    'unit_price'=>$product->price,
                ]);
            }
        }
        $email= $req->email;
        $checkUser= User::where('email',$email)->first();
        $cart= Cart::instance('shopping')->content();
        $message = [
            'type' => 'Đặt hàng thành công!!!',
            'cart' => $cart,
            'thanks' =>$req->fullname,
            'diachi' =>$req->address,
            'sdt' =>$req->phone,
            'ghichu' =>$req->notes,
            'content' => 'Vui lòng chờ xác nhận!!',
        ];
      
        SendEmail::dispatch($message, $email)->delay(now()->addMinute(1));
       
        Cart::instance('shopping')->destroy();
        return redirect()->back()->with('success','Bạn đã đặt hàng thành công , vui lòng chờ xử lí ! Kiểm tra trong hộp thư email của bạn');
    }

     public function deleteProduct($key){
        Cart::instance('shopping')->remove($key);
     	return redirect()->back();
     }
     public function deleteProduct2($key){
        Cart::instance('wishlist')->remove($key);
     	return redirect()->back();
     }
}

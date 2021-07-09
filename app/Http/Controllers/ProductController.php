<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductType;

class ProductController extends Controller
{
    public function product(){
    	$product = Product::all()->first()->paginate(5);

    	return view ('admin.products.list',compact('product'));
    }

    public function getproduct (){
    	$cate = ProductType::all();
    	
    	return view('admin.products.add',compact('cate'));
    }

    public function postproduct(Request $req){
    	
    	$product = new Product();
    	$this->validate($req,
    		[
    			'name'=>'min:3'
    		],
    		[
    			'name.min'=>'Tên sản phẩm không được nhỏ hơn 3 ký tự'
    		]);

    	$product->name= $req->name;
    	$product->id_type= $req->soidtu;
    	$product->unit_price= $req->unit_price;
    	$product->promotion_price= $req->promo_price;
    	$product->hot= $req->hot;
    	$product->new= $req->new;
    	$product->description= $req->txtReview;
    	$product->id_type= $req->soidtu;
    	$product->status= $req->status;
        
    	if ($req->hasFile('image')) {
            $file=$req->file('image');
            $duoi=$file->getClientOriginalExtension();
            if($duoi !='jpg' && $duoi !='png' && $duoi !='jpeg')
            {
                return redirect()->back()->with('danger','Định dạng hình ảnh không hợp lệ');
            }
            $name=$file->getClientOriginalName();
            $image=str_random(4)."_".$name;
            echo $image;
            while(file_exists("frontend/image/product/".$image))
            {
                $image=str_random(4)."_".$name;
            }
            $file->move("frontend/image/product" ,$image);
            $product->image=$image;
         } 
         else{
            $product->image="";
         }

         $product->save();

         return redirect()->back()->with('success','Thêm một sản phẩm mới thành công');

    }

    public function geteditproduct($id){
    	$edit= Product::find($id);
    	$cate = ProductType::all();
    	return view('admin.products.edit',compact('edit','cate'));
    }

    public function posteditproduct(Request $req, $id){
    	$editproduct= Product::find($id);
    	/*dd($req);*/
    	$editproduct->name= $req->name;
    	$editproduct->id_type= $req->soidtu;
    	$editproduct->unit_price= $req->unit_price;
    	$editproduct->promotion_price= $req->promo_price;
    	$editproduct->hot= $req->hot;
    	$editproduct->new= $req->new;
    	$editproduct->description= $req->description;
    	$editproduct->status= $req->status;
    	if ($req->hasFile('image')) {
            $file=$req->file('image');
            $duoi=$file->getClientOriginalExtension();
            if($duoi !='jpg' && $duoi !='png' && $duoi !='jpeg')
            {
                return redirect()->back()->with('danger','Định dạng hình ảnh không hợp lệ');
            }
            $name=$file->getClientOriginalName();
            $image=str_random(4)."_".$name;
            echo $image;
            while(file_exists("frontend/image/product/".$image))
            {
                $image=str_random(4)."_".$name;
            }
            $file->move("frontend/image/product" ,$image);
            $editproduct->image=$image;
         } 
         else{
            $editproduct->image="";
         }

         $editproduct->save();

         return redirect()->back()->with('success','Sửa sản phẩm mới thành công');
    }


    public function deleteproduct($id){
    	$del=Product::find($id);
    	$del->delete();

    	return redirect()->back()->with('success','Xóa sản phẩm thành công');
    }
}

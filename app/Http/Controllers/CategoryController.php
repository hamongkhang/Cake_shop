<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductType;

class CategoryController extends Controller
{
    public function category(){

    	$category = ProductType::all();

    	return view('admin.category.list',compact('category'));
    }
    /*thêm danh mục*/
    public function getCategory(){
    	return view('admin.category.add');
    }
    public function postCategory(Request $req){

    	$data = $req->except('_token');
    	ProductType::insert($data);
    	return redirect(route('category'))->with('success','Thêm một danh mục thành công');
    }

   /* sửa danh mục*/

   	public function getEdit($id){
   		$editcate = ProductType::find($id);
   		return view('admin.category.edit',compact('editcate'));
   	}

   	public function postEdit(Request $req ,$id){
   		$add= ProductType::find($id);
   		$this->validate($req,
   			[
   				'name'=>'required|min:3'
   			],
   			[
   				'name.required'=>'Tên danh mục không được bỏ trống',
   				'name.min'=>'Tên danh mục không được nhỏ hơn 3 ký tự'
   			]);

   		$add->name= $req->name;
   		$add->save();
    	return redirect(route('category'))->with('success','Cập nhật danh mục thành công');
   	}

   	/*xóa danh mục*/

   	public function delete($id){
   		$delete = ProductType::find($id);
        $delete->delete();
        return redirect()->back()->with('success','Xóa Danh Mục thành công');
   	}
}

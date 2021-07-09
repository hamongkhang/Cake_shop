<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use Auth;

class CommentController extends Controller
{
	

    public function postComment(Request $req,$id){
    	$productdetail = $id;

    	$comment= new Comment;
    	$comment->id_Product=$productdetail;
    	$comment->id_User= Auth::user()->id;
    	$comment->content=$req->content;
    	$comment->date_comment=date('Y-m-d');
    	$comment->save();
    	return redirect()->back()->with('success','Bình luận thành công');
    }
}

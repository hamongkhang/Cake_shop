<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;

class ContactController extends Controller
{
    public function getContact(){
    	return view('page.contact');
    }

    public function postContact(Request $req){
    	$data = $req->except('_token');
    	Contact::insert($data);
    	return redirect()->back()->with('success', 'Cảm ơn bạn đã liên hệ với chúng tôi , chúng tôi sẽ xử lí liên hệ của bạn trong thời gian sớm nhất ! Xin cảm ơn !');
    }
}

<?php

namespace App\Http\Middleware;

use Closure;

class CheckLoginUser
 {
    public function handle($req ,Closure $next){
    	if (!get_data_user('web'))
    		
    	{

    		return redirect()->route('login')->with('flag','Bạn phải đăng nhập để thanh toán');
    		
    	}
    	return $next($req);
    }
}

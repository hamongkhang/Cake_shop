<?php

namespace App\Http\Middleware;

use Closure;

class CheckLoginAdmin 
 {
    public function handle($req ,Closure $next){
    	if (!get_data_user('admins'))
    		
    	{

    		return redirect()->route('auth.login');
    		
    	}
    	return $next($req);
    }
}

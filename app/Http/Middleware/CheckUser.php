<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class CheckUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {


       
        // if (auth()->user()->role==1){

        //   //  return redirect()->route('editblogs');
        //    //return response()->json('this is json resoponse');
        //  return redirect()->route('admindashboard');
        // }else{
        //     return redirect()->route('dashboard');
        // }
        // if(   Auth::guard('admin')->check()){
           
        //       return redirect('/editblog');//loged in is admin go to this page or go to allblog
        //    }
        //    if(   Auth::guard('web')->check()){
           
        //     return redirect('/editblog');//loged in is admin go to this page or go to allblog
        //  }
        if(  Auth::guard('admin')->check()){
       return redirect('/editblog');
    
        }
      
        return $next($request);
        
    }
}

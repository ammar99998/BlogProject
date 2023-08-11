<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Request;
class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        // if (! $request->expectsJson()) {
        //     return route('login');
        // }

///this page if the user or admin were in the wrong place
        if (! $request->expectsJson()) {
            return 'your can not login';
            // if(Request ::is(app()->getLocale().'/dashoard/admin')){

            //    return route('selection');
              
            // }
            // if(Request ::is(app()->getLocale().'/dashoard/user')){

            //   //  return route('selection');
            //   return 'ok user';
            // }
            // else {
            //     return route('login');
            // }
      
        
    
        }
}
}
<?php
/**
 * Created by PhpStorm.
 * User: alt
 * Date: 08-Apr-18
 * Time: 12:12 AM
 */

namespace ForIt\Api\MiddleWare;

use Closure;
use Illuminate\Http\Request;

class ApiMiddleware
{
    function handle(Request $request, Closure $next){

        $request->headers->set('Accept','application/json',true);
        return $next($request);
    }
}
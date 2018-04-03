<?php
namespace ForIt\Admin\Middleware;
use ForIt\Admin\Exceptions\PermissionDenied;
use Closure;
use \Illuminate\Auth\Middleware\Authenticate;

class AuthenticateAdmin extends Authenticate{

    function handle( $request, Closure $next, ...$guards ) {
        return $next($request);
    }

}
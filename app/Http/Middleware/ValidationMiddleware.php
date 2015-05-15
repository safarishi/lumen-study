<?php
namespace App\Http\Middleware;

use Closure;

class ValidationMiddleware {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
    	// $pwd = \Request::input('password');
    	// $confir_pwd = \Request::input('password_confirmation');
    	// var_dump($pwd, $confir_pwd);
    	// if ($pwd !== $confir_pwd) {
    	// 	echo 'no equal';
    	// }
        return $next($request);
    }

}

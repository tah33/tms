<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;
use App\Role;
use App\Permission;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Router;
class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
      /*  /*$controllers = [];
        foreach (Route::getRoutes()->getRoutes() as $route) {
            $action = $route->getAction();
            if (array_key_exists('uses', $action)) {
                $controllers[] = $action['uses'];
            }
			if (array_key_exists('as', $action)) {
                $rote_name = $action['as'];
            }
        }
       // echo Route::getCurrentRoute()->getActionName();
    //    echo $controllers;
	//	echo $rote_name;*/
       // dd (Auth::check()) ;*/
        if (Auth::guest()) {
            return redirect('/');
        }
        return $next($request);
    }
}

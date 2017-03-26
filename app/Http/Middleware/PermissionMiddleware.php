<?php

namespace App\Http\Middleware;
use \App\Helpers\CustomAuth;
use Closure;


class PermissionMiddleware
{
     public $permissionAllowed = array(".","permissiondenied.index","auth.login","auth.logout");
     public $roleallowed = array("admin");
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!$this->permissionrequestCheck($request)){
            return redirect('/permissiondenied');
        }
        return $next($request);
    }
      /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     */
  private function permissionrequestCheck($request){
      $permission = CustomAuth::getRoutePermission($request);
      $rolelist = CustomAuth::getRolesUser();
      
     if(!in_array($permission,$this->permissionAllowed) && count(array_intersect($rolelist,$this->roleallowed))==0){    
      
         $haspermission = CustomAuth::hasPermission($permission);         
        if(!$haspermission){     
            return false;
        }
     }
     return true;
  }
  
}

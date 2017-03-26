<?php

namespace App\Helpers;

use  \Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use \Illuminate\Http\Request;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class CustomAuth {
    public static $roleallowed = array("admin");
    public static function hasPermission($permission){
        $userid = 3; // anonymouse use
        if (Auth::check()){     
             $userid = Auth::user()->id;             
        }   
        $authUser = \Kodeine\Acl\Models\Eloquent\User::find($userid);
        $permissionlist = $authUser->getPermissions();
        $roles = $authUser->getRoles();
       // print_r($roles);
       
        // print_r($permissionlist);
        // print $permission;
        if(count(array_intersect($roles,self::$roleallowed))>0 || array_key_exists($permission,$permissionlist)){
             return true;
        } else {
             return false;
        }
        return false;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public static function getRoutePermission($request){
        $currentPath= $request->path();
        if (strpos($currentPath, '/') === false) {
            $currentPath = $currentPath."/index";
        }
        $permission = str_replace('/', '.', $currentPath);
        return $permission;
    }
     public static function getRolesUser(){
         $userid = 3;
         if (Auth::check()){     
             $userid = Auth::user()->id;             
        } 
         $user = \Kodeine\Acl\Models\Eloquent\User::find($userid);
         return $user->getRoles();         
     }
    
}

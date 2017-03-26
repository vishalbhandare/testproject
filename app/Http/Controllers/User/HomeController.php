<?php
namespace App\Http\Controllers\User;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use App\Http\Controllers\BaseController;

class HomeController extends BaseController
{
    /**
     * Show Home Screen
     *
     * @return Response
     */
    public function index()
    {  
       return view('welcome'); 
    }
    
     public function permissiondenied()
    {  
       return view('permissiondenied'); 
    }
}
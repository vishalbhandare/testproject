<?php
namespace App\Http\Controllers;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use App\Models\User\Message;
use Auth;
use Illuminate\Contracts\View\View;
use \Illuminate\Support\Facades\DB;


class BaseController extends Controller{
 
    
  public function __construct()
  {
     $this->setNotificationCount();
  } 
  
  private function setNotificationCount(){
     if (Auth::check()){        
            //DB::enableQueryLog();
            $count = Message::where('receiver_id', Auth::user()->id)->where('status_id',1)->count();
           // View::share('notificationcount', $count);
            view()->share('notificationcount', $count);
        }  
  } 
  

  
}
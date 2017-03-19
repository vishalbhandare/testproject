<?php
namespace App\Http\Controllers\User;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use App\Http\Controllers\BaseController;
use App\User;
use Auth;

use App\Models\User\Message;
use Illuminate\Http\Request;
use Validator;

class MessageController extends BaseController
{
    
       
    /**
     * Show the Message Compose Form
     *
     * @return Response
     */
    public function showForm()
    {
        $users = array();
        if (Auth::check()){
            $users = User::orderBy('created_at', 'desc')->whereNotIn('id',array(Auth::user()->id))->get();
        }
      
        return view('messages.create', ['userlist'=>$users]);
    } 
    
    /**
     * Save Message to DB
     * 
     * @param  Request  $request
     * @return Response
     */
    public function save(Request $request)
    {    
        $validator = Validator::make($request->all(), [
            'message' => 'required|max:255',
        ]);
        
        if ($validator->fails()) {
            return redirect('/message/compose')->withInput()->withErrors($validator);
        }
    
        $message = new Message;
        $message->content = $request->message;
        $message->sender_id = Auth::user()->id;
        $message->receiver_id = $request->receiver_id;
        $message->status_id = 1;
        //Check if Message got saved
        if (!$message->save())
        {
           return redirect('/message/compose')->withInput()->withErrors(['Message Save Failed, Try Again']);
        }else{
           \Session::flash('success','Message Sent successfully.');
           return redirect('/message/compose');
        }            
    }  
    
    /**
     * View List of Notification
     * 
     */
    public function view()
    {
        $list = array();
        $readlist = array();
        $sentlist = array();
        
         if (Auth::check()){
                //DB::enableQueryLog();
                $list = Message::where('receiver_id', Auth::user()->id)->where('status_id',1)->orderBy('created_at', 'desc')->get();
                $readlist = Message::where('receiver_id', Auth::user()->id)->where('status_id',2)->orderBy('created_at', 'desc')->get();
                $sentlist = Message::where('sender_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
                view()->share('notificationcount', 0);
                Message::where('status_id', 1)
                    ->where('receiver_id', Auth::user()->id)
                    ->update(['status_id' => 2]);
            }  
           
              return view('messages.list', ['notification'=>$list,'readlist'=>$readlist,'sentlist'=>$sentlist]);
    }
}
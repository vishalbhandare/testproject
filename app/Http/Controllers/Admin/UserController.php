<?php
namespace App\Http\Controllers\Admin;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use App\Http\Controllers\BaseController;

use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use \Kodeine\Acl\Models\Eloquent\Role;
use \Kodeine\Acl\Models\Eloquent\User;
use Kodeine\Acl\Models\Eloquent\Permission;

class UserController extends BaseController
{
       /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        // get all the users
        //$users = User::all();
       
        $userlist = \Kodeine\Acl\Models\Eloquent\User::all();
      
       
        // load the view and pass the users
        return view('users.index',['users'=> $userlist]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        // get all the users
        $roles = Role::all();
    
         // load the create form (app/views/nerds/create.blade.php)
        return view('users.create',array('roles'=>$roles));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
         $validator = Validator::make($request->all(), [
            'username' => 'required|unique:users',
            'email' => 'required|unique:users|email',
            'password' => 'required',
        ]);
        
        if ($validator->fails()) {
            return redirect('/users/create')->withInput()->withErrors($validator);
        }
        
        $user = User::create([
            'username' => $request['username'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
        ]);
        
        //Check if User got created
        if (!$user)
        {           
           return redirect('/users/create')->withInput()->withErrors(['User could not be created, Try Again']);
        }else{
           if($request->roles){
               $user->assignRole($request->roles);
           }           
           // Assign permission to user
           \Session::flash('success','User '.$request['username'].' created successfully.');
           return redirect('/users');
        }  
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        // get the User
        $user = User::find($id);

        // show the view and pass the User to it
        return view('users.show',['user'=> $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
         // get all the users
        $roles = Role::all();
        
            // get the User
        $user = User::find($id);

        // show the view and pass the User to it
        return view('users.edit',['user'=> $user,'roles'=>$roles]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $rules = array(
            'email' => 'required|unique:users,email,'.$id,
            'username' => 'required|unique:users,username,'.$id,
            'roles'=>"required"
        );
        
        $validator = Validator::make(Input::all(), $rules);
        
        if ($validator->fails()) {
            return redirect('/users/'.$id.'/edit')->withInput(Input::except('password'))->withErrors($validator);
        }else{
           
            
              // get the User
            $user = User::find($id);
            $user->username       = Input::get('username');
            $user->email      = Input::get('email');
            if(Input::get('passwordreset')){
                $user->password = bcrypt(Input::get('password'));
            }
            //$user->assInput::get('role');
            $user->revokeAllRoles();
            $user->assignRole(Input::get('roles'));
            $user->save();
              // redirect
            \Session::flash('message', 'Successfully updated User!');
            return redirect('/users');
            
        }
        
      
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    } 
}
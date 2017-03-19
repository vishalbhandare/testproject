<?php
namespace App\Http\Controllers\Admin;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use App\Http\Controllers\BaseController;
use App\User;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Bican\Roles\Models\Role;

class RoleController extends BaseController
{
       /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        // get all the users
        $roles = Role::all();

        // load the view and pass the users
        return view('roles.index',['roles'=> $roles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
         // load the create form (app/views/roles/create.blade.php)
        return view('roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
         $validator = Validator::make($request->all(), [
            'name' => 'required|unique:roles',
            'slug' => 'required'
        ]);
        
        if ($validator->fails()) {
            return redirect('/roles/create')->withInput()->withErrors($validator);
        }
        
        $role = Role::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'description' => $request->description, // optional
            'level' => $request->level, // optional, set to 1 by default
        ]);
       
        
        //Check if User got created
        if (!$role)
        {           
           return redirect('/roles/create')->withInput()->withErrors(['Role could not be created, Try Again']);
        }else{
           $roleId = $role->id; 
           // Assign permission to user
           \Session::flash('success','Role '.$request['name'].' created successfully.');
           return redirect('/roles');
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
        $role = Role::find($id);

        // show the view and pass the User to it
        return view('roles.show',['role'=> $role]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
            // get the User
        $role = Role::find($id);

        // show the view and pass the User to it
        return view('roles.edit',['role'=> $role]);
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
            'name' => 'required|unique:roles,name,'.$id,
            'slug'=> 'required',
            'description'=> 'required'
        );
        
        $validator = Validator::make(Input::all(), $rules);
        
        if ($validator->fails()) {
            return redirect('/roles/'.$id.'/edit')->withErrors($validator);
        }else{
              // get the User
            $role = Role::find($id);
            $role->name       = Input::get('name');
            $role->slug      = Input::get('slug');
             $role->description      = Input::get('description');
           
           // $user->role = Input::get('role');
            $role->save();
              // redirect
            \Session::flash('message', 'Successfully updated Role!');
            return redirect('/roles');
            
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
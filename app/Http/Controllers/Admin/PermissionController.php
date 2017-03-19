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
use Bican\Roles\Models\Permission;

class PermissionController extends BaseController
{
       /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        // get all the permission
        $permissions = Permission::all();

        // load the view and pass the users
        return view('permissions.index',['permissions'=> $permissions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
         // load the create form (app/views/roles/create.blade.php)
        return view('permissions.create');
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
            return redirect('/permissions/create')->withInput()->withErrors($validator);
        }
        
        $permission = Permission::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'description' => $request->description, // optional
            'level' => $request->level, // optional, set to 1 by default
        ]);
       
        
        //Check if User got created
        if (!$permission)
        {           
           return redirect('/permissions/create')->withInput()->withErrors(['Role could not be created, Try Again']);
        }else{
           $permissionId = $permission->id; 
           // Assign permission to user
           \Session::flash('success','Permission '.$request['name'].' created successfully.');
           return redirect('/permissions');
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
        $permission = Permission::find($id);

        // show the view and pass the User to it
        return view('permissions.show',['permission'=> $permission]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
            // get the Permission
        $permission = Permission::find($id);

        // show the view and pass the User to it
        return view('permissions.edit',['permission'=> $permission]);
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
            return redirect('/permissions/'.$id.'/edit')->withErrors($validator);
        }else{
              // get the User
            $permission = Permission::find($id);
            $permission->name       = Input::get('name');
            $permission->slug      = Input::get('slug');
             $permission->description      = Input::get('description');
           
           // $user->role = Input::get('role');
            $permission->save();
              // redirect
            \Session::flash('message', 'Successfully updated Permission!');
            return redirect('/permissions');
            
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
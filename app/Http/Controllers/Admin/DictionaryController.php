<?php
namespace App\Http\Controllers\Admin;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use App\Http\Controllers\BaseController;
use App\User;
use App\Models\Core\Dictionary;
use App\Models\Core\DictionaryBannedRole;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use \Kodeine\Acl\Models\Eloquent\Role;

class DictionaryController extends BaseController
{
       /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        // get all the dictionary
        $dictionary = Dictionary::all();
         
        // load the view and pass the users
        return view('dictionary.index',['dictionary'=> $dictionary]);
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
         
         // load the create form (app/views/dictionary/create.blade.php)
        return view('dictionary.create',['roles'=> $roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
         $validator = Validator::make($request->all(), [
            'textword' => 'required|unique:dictionary|alpha'
        ]);
       
        if ($validator->fails()) {
            return redirect('/dictionary/create')->withInput()->withErrors($validator);
        }
      
                 
        $dictionary = Dictionary::create([
            'textword' => $request->textword,
            'description' => $request->description==null?'':$request->description,
        ]);
        
        
        //Check if User got created
        if (!$dictionary)
        {           
           return redirect('/dictionary/create')->withInput()->withErrors(['Dictionary could not be created, Try Again']);
        }else{
          
           $dictionary->save();
          
           $dictionary->roles()->attach(Input::get('roles'));
           // Assign permission to user
           \Session::flash('success','Dictionary '.$request['textword'].' created successfully.');
           return redirect('/dictionary');
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
        $dictionary = Dictionary::find($id);

        // show the view and pass the User to it
        return view('dictionary.show',['dictionary'=> $dictionary]);
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
        $dictionary = Dictionary::find($id);
      // get all the users
        $roles = Role::all();
        
        // show the view and pass the User to it
        return view('dictionary.edit',['dictionary'=> $dictionary,'roles'=> $roles,'enabled_roles'=>$dictionary->roles()->lists('role_id')->toArray()]);
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
            'textword' => 'required|alpha|unique:dictionary,textword,'.$id,
        );
        
        $validator = Validator::make(Input::all(), $rules);
        
        if ($validator->fails()) {
            return redirect('/dictionary/'.$id.'/edit')->withErrors($validator);
        }else{
              // get the User
            $dictionary = Dictionary::find($id);
            $dictionary->textword       = Input::get('textword');           
            $dictionary->description       = Input::get('description');                      
            $dictionary->save();
            $dictionary->roles()->detach();
            $dictionary->roles()->attach(Input::get('roles'));  
              // redirect
            \Session::flash('message', 'Successfully updated Dictionary!');
            return redirect('/dictionary');            
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
        $dictionary = Dictionary::find($id);
        $dictionary->delete();

        // redirect
        Session::flash('message', 'Successfully deleted the dictionary!');
        return Redirect::to('dictionary');
    } 
}
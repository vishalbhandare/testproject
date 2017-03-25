@extends('layout.app')

@section('content')
<h1>Create Role</h1>

@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

 @include('common.errors')
<form method="POST" action="/roles"  class="form-horizontal">
    {!! csrf_field() !!}

   
   <div class="form-group">
                        <label for="Name" class="control-label col-sm-2">Name:</label>
                         <div class="col-sm-10">
                           
                             <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                         </div>
                </div>
    
   

      <div class="form-group">
                        <label for="slug" class="control-label col-sm-2">Slug:</label>
                         <div class="col-sm-10">
                           
                             <input type="text" class="form-control" name="slug" value="{{ old('slug') }}">
                         </div>
                </div>
    
 
       <div class="form-group">
                        <label for="description" class="control-label col-sm-2">Description:</label>
                         <div class="col-sm-10"> 
                              <textarea type="text" class="form-control" name="description" value="{{ old('description') }}">
                           </textarea>  
                         </div>
                </div>
    
  <!--<div class="form-group">
                        <label for="level" class="control-label col-sm-2">Level:</label>
                         <div class="col-sm-10">
                               <input type="text" class="form-control" name="level" value="{{ old('level') }}">
                         
                         </div>
                </div>
-->
 <div class="form-group">
                        <label for="permissions" class="control-label col-sm-2">Permission:</label>
                         <div class="col-sm-10">
                             <select class="selectpicker" multiple name='permissions[]'>
                                @foreach ($permissions as $permission) 
                                
                                <option value="{{$permission->id}}">{{$permission->name}}</option>
                                
                                @endforeach
                              </select>

                          <!-- <textarea type="text" class="form-control" name="role"></textarea>     -->
                         </div>
                </div>

  <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Submit</button>
      </div>
    </div>

@endsection
@section('scripts')

@stop

@extends('layout.app')

@section('content')
<h1>Create User</h1>

@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

 @include('common.errors')
<form method="POST" action="/users"  class="form-horizontal">
    {!! csrf_field() !!}

   
   <div class="form-group">
                        <label for="username" class="control-label col-sm-2">Username:</label>
                         <div class="col-sm-10">                           
                             <input type="text" class="form-control" name="username" value="{{ old('username') }}">
                         </div>
                </div>
    
   

      <div class="form-group">
                        <label for="email" class="control-label col-sm-2">Email:</label>
                         <div class="col-sm-10">
                           
                             <input type="text" class="form-control" name="email" value="{{ old('email') }}">
                         </div>
                </div>
    
 
       <div class="form-group">
                        <label for="email" class="control-label col-sm-2">Password:</label>
                         <div class="col-sm-10">
                           <input type="password" class="form-control" name="password">
                         </div>
                </div>
    
  <div class="form-group">
                        <label for="role" class="control-label col-sm-2">Role:</label>
                         <div class="col-sm-10">
                             <select class="selectpicker" multiple name='roles[]'>
                                @foreach ($roles as $role) 
                                
                                <option value="{{$role->id}}">{{$role->name}}</option>
                                
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

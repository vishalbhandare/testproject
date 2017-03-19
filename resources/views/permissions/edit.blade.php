@extends('layout.app')

@section('content')
<h1>Edit Permission: {{ $permission->name }}</h1>

@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

 @include('common.errors')
<form method="POST" action="/roles/{{ $permission->id}}"  class="form-horizontal">
    {!! csrf_field() !!}

   <input type="hidden" class="form-control" name="_method" value="PUT">
   <div class="form-group">
                        <label for="name" class="control-label col-sm-2">Name:</label>
                         <div class="col-sm-10">
                           
                             <input type="text" class="form-control" name="name" value="{{ $permission->name }}">
                         </div>
                </div>
    
   

      <div class="form-group">
                        <label for="slug" class="control-label col-sm-2">slug:</label>
                         <div class="col-sm-10">
                           
                             <input type="text" class="form-control" name="slug" value="{{ $permission->slug }}">
                         </div>
                </div>
    
 
       <div class="form-group">
                        <label for="description" class="control-label col-sm-2">Description:</label>
                         <div class="col-sm-10">
                             <textarea type="text" class="form-control" name="description">{{ $permission->description }}</textarea>    
                         </div>
                </div>
    
  <div class="form-group">
                        <label for="role" class="control-label col-sm-2">Model:</label>
                         <div class="col-sm-10">
                             <input type="text" class="form-control" name="level" value="{{ $permission->model }}">
                           
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

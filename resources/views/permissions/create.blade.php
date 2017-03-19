@extends('layout.app')

@section('content')
<h1>Create Permission</h1>

@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

 @include('common.errors')
<form method="POST" action="/permissions"  class="form-horizontal">
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
<textarea type="text" class="form-control" name="description" value="{{ old('description') }}"></textarea>  
                         </div>
                </div>
    
  <div class="form-group">
                        <label for="model" class="control-label col-sm-2">Model:</label>
                         <div class="col-sm-10">
                               <input type="text" class="form-control" name="level" value="{{ old('model') }}">
                         
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

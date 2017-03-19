@extends('layout.app')

@section('content')
<h1>Create Dictionary</h1>

@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

 @include('common.errors')
<form method="POST" action="/dictionary"  class="form-horizontal">
    {!! csrf_field() !!}

   
   <div class="form-group">
                        <label for="textword" class="control-label col-sm-2">Word:</label>
                         <div class="col-sm-10">
                           
                             <input type="text" class="form-control" name="textword" value="{{ old('textword') }}">
                         </div>
                </div>
    
    <div class="form-group">
                        <label for="description" class="control-label col-sm-2">Description:</label>
                         <div class="col-sm-10"> 
<textarea type="text" class="form-control" name="discription" value="{{ old('description') }}"></textarea>  
                         </div>
                </div>

    
 
       <div class="form-group">
                        <label for="description" class="control-label col-sm-2">Roles Allowed:</label>
                         <div class="col-sm-10"> 
<textarea type="text" class="form-control" name="roles" value="{{ old('roles') }}"></textarea>  
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

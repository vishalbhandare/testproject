<!-- resources/views/auth/login.blade.php -->
@extends('layout.app')

@section('content')
<div class="container">
    <form method="POST" action="/auth/login" class="form-horizontal">
    {!! csrf_field() !!}

    <div class="form-group">
        <label for="email" class="control-label col-sm-2">Email address:</label>
         <div class="col-sm-10">
        <input type="email" class="form-control" name="email" value="{{ old('email') }}">
         </div>
    </div>

    <div class="form-group">
        <label for="pwd"  class="control-label col-sm-2">Password:</label>
        <div class="col-sm-10">
        <input type="password" class="form-control" name="password" id="password">
        </div>
    </div>


    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Submit</button>
      </div>
    </div>
</form>
    
    </div>
@endsection
@extends('layout.app')

@section('content')
<h1>Edit User: {{ $user->name }}</h1>

@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

 @include('common.errors')
<form method="POST" action="/users/{{ $user->id}}"  class="form-horizontal">
    {!! csrf_field() !!}

   <input type="hidden" class="form-control" name="_method" value="PUT">
   <div class="form-group">
                        <label for="Name" class="control-label col-sm-2">Name:</label>
                         <div class="col-sm-10">
                           
                             <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                         </div>
                </div>
    
   

      <div class="form-group">
                        <label for="email" class="control-label col-sm-2">Email:</label>
                         <div class="col-sm-10">
                           
                             <input type="text" class="form-control" name="email" value="{{ $user->email }}">
                         </div>
                </div>
    
 
       <div class="form-group">
                        <label for="email" class="control-label col-sm-2">Password:</label>
                         <div class="col-sm-10">
                             <label class="checkbox-inline"><input type="checkbox" value="passwordreset"
                                                                   id="resetpasschk">Reset Password</label>
                           <input type="password" class="form-control" name="password" disabled
                                   id="password">
                         </div>
                </div>
    
  <div class="form-group">
                        <label for="role" class="control-label col-sm-2">Role:</label>
                         <div class="col-sm-10">
                           <textarea type="text" class="form-control" name="role">
                           </textarea>     
                         </div>
                </div>

  <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Submit</button>
      </div>
    </div>

@endsection

@section('scripts')
 <script>
jQuery.noConflict()(function ($) { // this was missing for me
        $(document).ready(function(){
            $("#resetpasschk").change(function() {
                if(this.checked) {
                   $("#password").removeAttr("disabled");
                }else{
                  $("#password").attr("disabled", true);      
                }
            });
        });
});
</script>
@stop

@extends('layout.app')

@section('content')
<h1>Edit Dictionary: {{ $dictionary->word }}</h1>

@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

 @include('common.errors')
<form method="POST" action="/dictionary/{{ $dictionary->id}}"  class="form-horizontal">
    {!! csrf_field() !!}

   <input type="hidden" class="form-control" name="_method" value="PUT">
   <div class="form-group">
                        <label for="textword" class="control-label col-sm-2">Word:</label>
                         <div class="col-sm-10">
                           
                             <input type="text" class="form-control" name="textword" value="{{ $dictionary->textword }}">
                         </div>
                </div>
    
    <div class="form-group">
                        <label for="description" class="control-label col-sm-2">Description:</label>
                         <div class="col-sm-10">
                           
                             <input type="text" class="form-control" name="description" value="{{ $dictionary->description }}">
                         </div>
                </div>

    
 
   <div class="form-group">
                        <label for="role" class="control-label col-sm-2">Role:</label>
                         <div class="col-sm-10">
                             <select class="selectpicker" multiple name='roles[]'>
                                @foreach ($roles as $role) 
                                @if (in_array($role->id,$enabled_roles))
                                <option value="{{$role->id}}" selected>{{$role->name}}</option>
                                @else
                                <option value="{{$role->id}}">{{$role->name}}</option>
                                @endif
                                
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
<script>
 
 </script>
@stop

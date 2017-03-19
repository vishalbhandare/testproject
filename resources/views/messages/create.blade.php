@extends('layout.app')

@section('content')
        <div class="container">
            @if(Session::has('success'))
            <div class="alert-box success">
                <h2>{{ Session::get('success') }}</h2>
            </div>
            @endif
            <div class="content">
               
                <form method="POST" action="/message/send" class="form-horizontal">
                {!! csrf_field() !!}
                
                 <div class="form-group">
                        <label for="User" class="control-label col-sm-2">Select User:</label>
                         <div class="col-sm-10">
                             @if (count($userlist) > 0)
                                <select class="form-control" id="receiver_id" name="receiver_id">
                                    @foreach ($userlist as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                     @endforeach
                                </select>
                             @else
                                <p>Create User To Send Message</p>
                             @endif
                             
                         </div>
                </div>
               <div class="form-group">
                        <label for="Message" class="control-label col-sm-2">Message:</label>
                         <div class="col-sm-10">
                            <textarea class="form-control" rows="5" id="message"
                                      name="message"></textarea>
                         </div>
                </div> 
                
                 <div class="form-group">        
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-default">Submit</button>
                    </div>
                  </div>
                
                </form>
                
            </div>
        </div>
@endsection

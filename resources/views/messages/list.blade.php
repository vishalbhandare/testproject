@extends('layout.app')

@section('content')
<div class="container">
  <h2>Messages</h2>
  <ul class="nav nav-tabs">
   @if (count($notification)>0) 
   <li class="active"><a href="#new">New Messages</a></li>
   @endif
    @if (count($readlist)>0) 
    <li><a href="#read">Already Read</a></li>
     @endif
     @if (count($sentlist)>0) 
        <li><a href="#sent">Sent</a></li>
     @endif
  </ul>

  <div class="tab-content">
   
      @if (count($notification)>0) 
      <div id="new" class="tab-pane fade in active">
        <ul class = "list-group">
             <li class = "list-group-item">
         <div class="row">
            <div class="col-sm-2">No</div>
            <div class="col-sm-3">Sender</div>
            <div class="col-sm-7">Content</div>
          </div>
         </li>
            @foreach ($notification as $message)
                <li class = "list-group-item">
                   
                 <div class="row">
                    <div class="col-sm-2"> {{$message->id}}</div>
                    <div class="col-sm-3"> {{$message->sender_id}}</div>
                    <div class="col-sm-7">{{$message->content}}</div>
                  </div>
                </li>
             @endforeach
           
        </ul>
    </div>
   @endif
   
   @if (count($readlist)>0) 
    <div id="read" class="tab-pane fade">
     <ul class = "list-group">
         <li class = "list-group-item">
         <div class="row">
            <div class="col-sm-2">No</div>
            <div class="col-sm-3">Sender</div>
            <div class="col-sm-7">Content</div>
          </div>
         </li>
          @foreach ($readlist as $message)
                <li class = "list-group-item">
                <div class="row">
                    <div class="col-sm-2"> {{$message->id}}</div>
                    <div class="col-sm-3"> {{$message->sender_id}}</div>
                    <div class="col-sm-7">{{$message->content}}</div>
                  </div>
                </li>
             @endforeach
     </ul>
    </div>
    @endif
    
    @if (count($sentlist)>0) 
    <div id="sent" class="tab-pane fade">
    <ul class = "list-group">
         <li class = "list-group-item">
         <div class="row">
            <div class="col-sm-2">No</div>
            <div class="col-sm-3">Sender</div>
            <div class="col-sm-7">Content</div>
          </div>
         </li>
         @foreach ($sentlist as $message)
                <li class = "list-group-item">
                <div class="row">
                    <div class="col-sm-2"> {{$message->id}}</div>
                    <div class="col-sm-3"> {{$message->sender_id}}</div>
                    <div class="col-sm-7">{{$message->content}}</div>
                  </div>
                </li>
             @endforeach
     </ul>
    </div>
    @endif
  </div>
</div>

@endsection
@section('scripts')
   <script>
    jQuery.noConflict()(function ($) { // this was missing for me
        $(document).ready(function(){
            $(".nav-tabs a").click(function(){
                $(this).tab('show');
            });
        });
        });
    </script>
@stop

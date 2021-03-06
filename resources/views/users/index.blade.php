@extends('layout.app')

@section('content')


  @if(Session::has('success'))
            <div class="alert-box success">
                <h2>{{ Session::get('success') }}</h2>
            </div>
 @endif
 <div class="container">
     <div class="row row-eq-height">
        <div class="col-md-8 col-centered"><h1>All Users</h1></div>
        <div class="col-md-4 col-centered"  >
            <a class="btn btn-small btn-success " style="vertical-align: middle" href="{{ URL::to('/users/create') }}">Create Users</a>
        </div>
      </div> 
 </div>
<table class="table table-striped table-bordered">
       <thead>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Email</td>
            <td>Role</td>
            <td>Actions</td>
        </tr>
    </thead>
      <tbody>
          @foreach($users as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->username }}</td>
            <td>{{ $value->email }}</td>
            <td>
             
                @foreach ($value->getRoles() as $role)
                 {{ $role }}
                @endforeach
            </td>
            
            <!-- we will also add show, edit, and delete buttons -->
            <td>

                <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
                <!-- we will add this later since its a little more complicated than the other two buttons -->

                <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
                <a class="btn btn-small btn-success" href="{{ URL::to('users/' . $value->id) }}">Show this User</a>

                <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                <a class="btn btn-small btn-info" href="{{ URL::to('users/' . $value->id . '/edit') }}">Edit this User</a>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>


@endsection
@section('scripts')

@stop

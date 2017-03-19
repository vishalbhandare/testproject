@extends('layout.app')

@section('content')
<h1>All Roles</h1>

  @if(Session::has('success'))
            <div class="alert-box success">
                <h2>{{ Session::get('success') }}</h2>
            </div>
 @endif

<table class="table table-striped table-bordered">
       <thead>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Slug</td>
            <td>Description</td>
             <td>Level</td>
            <td>Actions</td>
        </tr>
    </thead>
      <tbody>
          @foreach($roles as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->name }}</td>
            <td>{{ $value->slug }}</td>
            <td>{{ $value->description }}</td>
            <td></td>

            <!-- we will also add show, edit, and delete buttons -->
            <td>

                <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
                <!-- we will add this later since its a little more complicated than the other two buttons -->

                <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
                <a class="btn btn-small btn-success" href="{{ URL::to('roles/' . $value->id) }}">Show this Role</a>

                <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                <a class="btn btn-small btn-info" href="{{ URL::to('roles/' . $value->id . '/edit') }}">Edit this Role</a>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>


@endsection
@section('scripts')

@stop

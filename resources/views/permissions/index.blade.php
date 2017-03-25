@extends('layout.app')

@section('content')


  @if(Session::has('success'))
            <div class="alert-box success">
                <h2>{{ Session::get('success') }}</h2>
            </div>
 @endif
 <div class="container">
     <div class="row row-eq-height">
        <div class="col-md-8 col-centered"><h1>All Permission</h1></div>
        <div class="col-md-4 col-centered"  >
            <a class="btn btn-small btn-success " style="vertical-align: middle" href="{{ URL::to('/permissions/create') }}">Create New Permission</a>
        </div>
      </div> 
 </div>
<table class="table table-striped table-bordered">
       <thead>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Slug</td>
            <td>Description</td>
             <td>Model</td>
            <td>Actions</td>
        </tr>
    </thead>
      <tbody>
          @foreach($permissions as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->name }}</td>
            <td>{{ $value->slug }}</td>
            <td>{{ $value->description }}</td>
            <td>{{ $value->model }}</td>

            <!-- we will also add show, edit, and delete buttons -->
            <td>

                <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
                <!-- we will add this later since its a little more complicated than the other two buttons -->

                <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
                <a class="btn btn-small btn-success" href="{{ URL::to('permissions/' . $value->id) }}">Show this Role</a>

                <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                <a class="btn btn-small btn-info" href="{{ URL::to('permissions/' . $value->id . '/edit') }}">Edit this Role</a>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>


@endsection
@section('scripts')

@stop

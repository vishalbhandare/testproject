@extends('layout.app')

@section('content')
<h1>Showing {{ $permission->name }}</h1>

    <div class="jumbotron text-center">
        <h2>{{ $permission->name }}</h2>
        <p>
            <strong>Name:</strong> {{ $permission->name }}<br>
            <strong>Slug:</strong> {{ $permission->slug  }}<br>
            <strong>Description:</strong> {{ $permission->description  }}<br>
            <strong>Model:</strong> {{ $permission->model  }}
        </p>
    </div>

@endsection
@section('scripts')

@stop

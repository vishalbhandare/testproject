@extends('layout.app')

@section('content')
<h1>Showing {{ $role->name }}</h1>

    <div class="jumbotron text-center">
        <h2>{{ $role->name }}</h2>
        <p>
            <strong>Name:</strong> {{ $role->name }}<br>
            <strong>Slug:</strong> {{ $role->slug  }}<br>
            <strong>Description:</strong> {{ $role->description  }}<br>
            <strong>Level:</strong> {{ $role->level  }}
        </p>
    </div>

@endsection
@section('scripts')

@stop

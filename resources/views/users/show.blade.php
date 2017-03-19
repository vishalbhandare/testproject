@extends('layout.app')

@section('content')
<h1>Showing {{ $user->name }}</h1>

    <div class="jumbotron text-center">
        <h2>{{ $user->name }}</h2>
        <p>
            <strong>Email:</strong> {{ $user->email }}<br>
            <strong>Role:</strong> {{ "Not Defined" }}
        </p>
    </div>

@endsection
@section('scripts')

@stop

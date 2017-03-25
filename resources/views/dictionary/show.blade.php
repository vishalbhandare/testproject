@extends('layout.app')

@section('content')
<h1>Showing {{ $dictionary->textword }}</h1>

    <div class="jumbotron text-center">
        <h2>{{ $dictionary->textword }}</h2>
        <p>
            <strong>Word:</strong> {{ $dictionary->name }}<br>
            <strong>Roles:</strong> <br>
        </p>
    </div>

@endsection
@section('scripts')

@stop

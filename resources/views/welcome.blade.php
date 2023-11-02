@extends('layouts.app')

@section('content')
    <section class="jumbo vh-100 d-flex justify-content-center align-items-center">
        <div class="d-flex flex-column justify-content-center bg-light rounded-2 p-2">
            <h1 class="d-inline-block">Welcome to Laravel DC Comics</h1>
            <a class="btn btn-primary" href="{{ route('comics') }}">Go to Comics</a>
        </div>

    </section>
@endsection

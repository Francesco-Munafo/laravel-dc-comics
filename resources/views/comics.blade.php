@extends('layouts.app')

@section('content')

<div class="container py-5">
    <div class="row row-cols-6">
        @forelse($comics as $comic)
        <div class="col mb-5">
            <div class="card h-100">


                <div class="comic_img">
                    <img class="object-fit-cover w-100" height="255" src="{{ $comic['thumb'] }}" alt="">
                </div>
                <div class="card-body">
                    <h6 class="">{{$comic['title']}}</h6>
                    <h6 class="">{{$comic['series']}}</h6>
                    <h6 class="">{{$comic['price']}}</h6>
                </div>
            </div>

        </div>
        @empty
        <h3>No comics available yet</h3>
        @endforelse
        <button class="btn btn-primary rounded-0 mx-auto">LOAD MORE</button>
    </div>
</div>

@endsection
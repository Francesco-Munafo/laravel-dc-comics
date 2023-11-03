@extends('layouts.app')

@section('content')
    <section class="jumbo h-100">


        <div class="container py-5">
            <div class="row row-cols-6">
                @forelse($comics as $comic)
                    <a class=" text-decoration-none mb-5" href="{{ route('show', $comic->id) }}">
                        <div class="col  h-100">
                            <div class="card shadow border-1 border-black h-100">


                                <div class="comic_img">
                                    @if (str_contains($comic->thumb, 'http'))
                                        <img class="object-fit-cover w-100" height="255" src="{{ $comic->thumb }}"
                                            alt="">
                                    @else
                                        <img class="object-fit-cover w-100" height="255"
                                            src="{{ asset('storage/' . $comic->thumb) }}" alt="">
                                    @endif

                                </div>
                                <div class="card-body">
                                    <h6 class="">{{ $comic['title'] }}</h6>
                                    <hr>
                                    <h6 class="">{{ $comic['series'] }}</h6>
                                    <h6 class="">{{ $comic['price'] }}</h6>
                                </div>
                            </div>

                        </div>
                    @empty
                        <h3>No comics available yet</h3>
                @endforelse
            </div>
            </a>
            <div class="row">

                <button class="btn btn-primary rounded-0 w-25 mx-auto">LOAD MORE</button>
            </div>
        </div>
    </section>
@endsection

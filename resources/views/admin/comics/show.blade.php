@extends('layouts.admin')


@section('title', 'Comic')
@section('content')

    <div class="container">
        <div class="row pt-4">
            <div class="col-6 d-flex flex-column">
                <h1>{{ $comic->title }}</h1>
                <div class="row py-4">
                    <div class="col-6 text-center">
                        <h5>Series: {{ $comic->series }}</h5>
                    </div>
                    <div class="col-6 text-center">
                        <h5>Price: {{ $comic->price }}</h5>
                    </div>
                    <div class="col-6 text-center">
                        <h5>Sale date: {{ Carbon\Carbon::parse($comic->sale_date)->format('m/d/Y') }}</h5>
                    </div>
                    <div class="col-6 text-center">
                        <h5>Type: {{ $comic->type }}</h5>
                    </div>
                </div>



                <p>{{ $comic->description }}</p>



                <div class="row justify-content-between">


                    <div class="col-6">

                        <h3>Artists:</h3>
                        <ul class="list-unstyled">
                            @if ($comic->artists)
                                @forelse(json_decode($comic->artists) as $artist)
                                    <li>{{ $artist }}</li>
                                @empty
                                    <h3>No artists available</h3>
                                @endforelse
                            @endif

                        </ul>
                    </div>

                    <div class="col-6 text-end">
                        <h3>Writers:</h3>
                        <ul class="list-unstyled">
                            @if ($comic->writers)
                                @forelse(json_decode($comic->writers) as $writer)
                                    <li>{{ $writer }}</li>
                                @empty
                                    <h3>No writers available</h3>
                                @endforelse
                            @endif

                        </ul>
                    </div>
                    <a class="btn btn-primary" href="{{ route('comics.edit', $comic->id) }}">Edit</a>
                </div>
            </div>
            <div class="col-6 text-center">

                @if (str_contains($comic->thumb, 'http'))
                    <img src="{{ $comic->thumb }}" alt="">
                @else
                    <img src="{{ asset('storage/' . $comic->thumb) }}" alt="">
                @endif
            </div>
        </div>
    </div>

@endsection

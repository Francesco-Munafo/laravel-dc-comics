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



                <div class="row justify-content-between py-4">


                    <div class="col-6 border-end border-secondary">

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
                    <a class="btn btn-primary my-4" href="{{ route('comics.edit', $comic->id) }}">Edit</a>
                    <!-- Modal trigger button -->
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                        data-bs-target="#modalId-{{ $comic->id }}">
                        Delete
                    </button>

                    <!-- Modal Body -->
                    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                    <div class="modal fade" id="modalId-{{ $comic->id }}" tabindex="-1" data-bs-backdrop="static"
                        data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId-{{ $comic->id }}"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title text-decoration-underline"
                                        id="modalTitleId-{{ $comic->id }}">Deleting your
                                        comic "{{ $comic->title }}"
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Warning! This is an irreversible operation! Doing this you'll delete your
                                    comic.
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Dismiss</button>

                                    <form action="{{ route('comics.destroy', $comic->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger">Delete</button>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 d-flex justify-content-center align-items-center">

                @if (str_contains($comic->thumb, 'http'))
                    <img src="{{ $comic->thumb }}" alt="">
                @else
                    <img src="{{ asset('storage/' . $comic->thumb) }}" alt="">
                @endif
            </div>
        </div>
    </div>

@endsection

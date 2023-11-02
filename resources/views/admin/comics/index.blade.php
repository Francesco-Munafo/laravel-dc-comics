@extends('layouts.admin')

@section('content')
    <div class="container py-5">
        <div class="table-responsive">
            <table class="table table-primary">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Title</th>
                        <th scope="col">Thumb</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($comics as $comic)
                        <tr class="">
                            <td>{{ $comic->id }}</td>
                            <td>{{ $comic->title }}</td>
                            <td>
                                @if (str_contains($comic->thumb, 'http'))
                                    <img height="80" src="{{ $comic->thumb }}" alt="">
                                @else
                                    <img height="80" src="{{ asset('storage/' . $comic->thumb) }}" alt="">
                                @endif
                            </td>
                            <td>
                                <a class="btn btn-secondary" href="{{ route('comics.show', $comic->id) }}">More</a>
                                <a class="btn btn-primary" href="{{ route('comics.edit', $comic->id) }}">Edit</a>
                                <a class="btn btn-danger" href="#">Delete</a>
                            </td>

                        </tr>
                    @empty
                        <tr class="">
                            <td scope="row">Item</td>
                            <td>Item</td>
                            <td>Item</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection

@extends('layouts.admin')

@section('content')
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
                        <td><img height="80px" src="{{ $comic->thumb }}" alt=""></td>
                        <td>
                            <a class="btn btn-secondary" href="{{ route('comics.show', $comic->id) }}">More</a>
                            <a class="btn btn-primary" href="#">Edit</a>
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
@endsection

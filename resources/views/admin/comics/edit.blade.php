@extends('layouts.admin')

@section('content')
    <div class="container py-5">
        <form action="{{ route('comics.update', $comic) }}" method="POST" enctype="multipart/form-data">
            @csrf

            @method('PUT')

            <h1>Editing "{{ $comic->title }}"</h1>

            <div class="mb-3">
                <label for="name" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" id="title" aria-describedby="helpTitle"
                    placeholder="Insert a comic title" value="{{ old('title', $comic->title) }}">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <input type="text" class="form-control" name="description" id="description"
                    aria-describedby="helpDescription" placeholder="Insert a comic description"
                    value="{{ old('description', $comic->description) }}">
            </div>

            <div class="mb-3">
                <label for="thumb" class="form-label">Select a file</label>
                <input type="file" class="form-control" name="thumb" id="thumb" placeholder="Select a file"
                    value="{{ $comic->thumb }}">
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="text" class="form-control" name="price" id="price" aria-describedby="helpPrice"
                    placeholder="Insert a comic price" value="{{ old('price', $comic->price) }}">
            </div>

            <div class="mb-3">
                <label for="series" class="form-label">Series</label>
                <input type="text" class="form-control" name="series" id="series" aria-describedby="helpSeries"
                    placeholder="Insert a comic series" value="{{ old('series', $comic->series) }}">
            </div>

            <div class="mb-3">
                <label for="type" class="form-label">Type</label>
                <input type="text" class="form-control" name="type" id="type" aria-describedby="helpType"
                    placeholder="Insert a comic type" value="{{ old('type', $comic->type) }}">
            </div>

            <div class="mb-3">
                <label for="sale_date" class="form-label">Sale Date</label>
                <input type="date" class="form-control" name="sale_date" id="sale_date" aria-describedby="helpDate"
                    placeholder="Insert a comic sale date" value="{{ old('sale_date', $comic->sale_date) }}">
            </div>
            <button class="btn btn-primary" type="submit">Submit</button>
        </form>
    </div>
@endsection

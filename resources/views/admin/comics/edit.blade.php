@extends('layouts.admin')

@section('content')
    <div class="container py-5">
        <form action="{{ route('comics.update', $comic) }}" method="POST" enctype="multipart/form-data">
            @csrf

            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" id="title" aria-describedby="helpTitle"
                    placeholder="Insert a comic title" value="{{ $comic->title }}">
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="text" class="form-control" name="price" id="price" aria-describedby="helpPrice"
                    placeholder="Insert a comic price" value="€{{ $comic->price }}">
            </div>
            <div class="mb-3">
                <label for="thumb" class="form-label">Select a file</label>
                <input type="file" class="form-control" name="thumb" id="thumb" placeholder="Select a file">
            </div>
            <button class="btn btn-primary" type="submit">Submit</button>
        </form>
    </div>
@endsection

@extends('layouts.admin')

@section('content')
    <div class="container py-5">
        <form action="{{ route('comics.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="mb-3">
                <label for="name" class="form-label">Title</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="title" id="title"
                    aria-describedby="helpTitle" placeholder="Insert a comic title">
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Description</label>
                <input type="text" class="form-control" name="description" id="description"
                    aria-describedby="helpDescription" placeholder="Insert a comic description">
            </div>

            <div class="mb-3">
                <label for="thumb" class="form-label">Select a file</label>
                <input type="file" class="form-control" name="thumb" id="thumb" placeholder="Select a file">
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="text" class="form-control" name="price" id="price" aria-describedby="helpPrice"
                    placeholder="Insert a comic price" value="$">
            </div>

            <div class="mb-3">
                <label for="series" class="form-label">Series</label>
                <input type="text" class="form-control" name="series" id="series" aria-describedby="helpSeries"
                    placeholder="Insert a comic series">
            </div>

            <div class="mb-3">
                <label for="type" class="form-label">Type</label>
                <input type="text" class="form-control" name="type" id="type" aria-describedby="helpType"
                    placeholder="Insert a comic type">
            </div>

            <div class="mb-3">
                <label for="sale_date" class="form-label">Sale Date</label>
                <input type="date" class="form-control" name="sale_date" id="sale_date" aria-describedby="helpDate"
                    placeholder="Insert a comic sale date">
            </div>

            <button class="btn btn-primary" type="submit">Submit</button>
        </form>
    </div>
@endsection

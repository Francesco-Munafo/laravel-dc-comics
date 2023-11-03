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

                                <!-- Modal trigger button -->
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#modalId-{{ $comic->id }}">
                                    Delete
                                </button>

                                <!-- Modal Body -->
                                <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                                <div class="modal fade" id="modalId-{{ $comic->id }}" tabindex="-1"
                                    data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                    aria-labelledby="modalTitleId-{{ $comic->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                                        role="document">
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

<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreComicRequest;
use App\Http\Requests\UpdateComicRequest;
use App\Models\Comic;
use Illuminate\Support\Facades\Storage;


class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.comics.index', ['comics' => Comic::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.comics.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreComicRequest $request)
    {

        $val_data = $request->validated();

        if ($request->has('thumb')) {

            $file_path = Storage::put('comics_images', $val_data['thumb']);
        }

        $new_comic = new Comic();
        $new_comic->title = $val_data['title'];
        $new_comic->price = $val_data['price'];
        $new_comic->thumb = $file_path;
        $new_comic->save();

        return to_route('comics.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Comic $comic)
    {
        return view('admin.comics.show', ['comic' => $comic]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comic $comic)
    {
        return view('admin.comics.edit', compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateComicRequest $request, Comic $comic)
    {
        $val_data = $request->validated();

        if ($request->has('thumb')) {
            $newImageFile = $request->thumb;
            $file_path = Storage::put('comics_images', $newImageFile);
            if (!is_null($comic->thumb) && Storage::fileExists($comic->thumb)) {

                Storage::delete($comic->thumb);
            }

            $val_data['thumb'] = $file_path;
        }

        $comic->update($val_data);

        return to_route('comics.show', $comic);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comic $comic)
    {
        if (!is_null($comic->thumb)) {

            Storage::delete($comic->thumb);
        }
        $comic->delete();

        return to_route('comics.index', $comic);
    }
}

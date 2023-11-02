<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
    public function store(Request $request)
    {
        if ($request->has('thumb')) {

            $file_path = Storage::put('comics_images', $request->thumb);
        }

        $new_comic = new Comic();
        $new_comic->title = $request['title'];
        $new_comic->price = $request['price'];
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
    public function update(Request $request, Comic $comic)
    {
        $data = $request->all();

        if ($request->has('thumb') && $comic->thumb) {
            Storage::delete($comic->thumb);
            $file_path = Storage::put('comics_images', $request->thumb);
            $data['thumb'] = $file_path;
        }
        $comic->update($data);

        return to_route('comics.show', $comic);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comic $comic)
    {
        //
    }
}

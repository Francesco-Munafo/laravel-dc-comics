<?php

namespace App\Http\Controllers\Guests;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comic;

class PageController extends Controller
{
    function index()
    {
        return view('welcome');
    }

    function comics()
    {
        return view('comics', ['comics' => Comic::all()]);
    }

    function about()
    {
        return view('about');
    }

    function show(Comic $comic)
    {
        return view('show', ['comic' => $comic]);
    }
}

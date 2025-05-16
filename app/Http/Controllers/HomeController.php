<?php

namespace App\Http\Controllers;

use App\Models\Album;

class HomeController extends Controller
{
    public function index()
    {
        // Traemos 8 álbumes con su artista para destacar en el home
        $albumsDestacados = Album::with('artista')->take(8)->get();

        return view('home', compact('albumsDestacados'));
    }
}

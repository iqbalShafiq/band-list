<?php

namespace App\Http\Controllers\Band;

use App\Models\Band;
use App\Models\Genre;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BandController extends Controller
{
    public function create()
    {
        return view('bands.create', [
            'genres' => Genre::get(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'thumbnail' => $request->thumbnail ? 'image|mimes:jpeg,jpg,gif,png' : '',
            'genres' => 'required'
        ]);

        $band = Band::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'thumbnail' => request()->file('thumbnail')->store('images/band')
        ]);

        $band->genres()->sync($request->genres);

        return back()->with('success', 'Band has been created');
    }
}

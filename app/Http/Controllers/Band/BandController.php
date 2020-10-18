<?php

namespace App\Http\Controllers\Band;

use App\Models\Band;
use App\Models\Genre;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class BandController extends Controller
{
    public function table()
    {
        return view('bands.table', [
            'bands' => Band::latest()->paginate(16)
        ]);
    }

    public function create()
    {
        return view('bands.create', [
            'genres' => Genre::get(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:bands,name',
            'thumbnail' => $request->thumbnail ? 'image|mimes:jpeg,jpg,gif,png' : '',
            'genres' => 'required'
        ]);

        $band = Band::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'thumbnail' => $request->thumbnail ? request()->file('thumbnail')->store('images/band') : null
        ]);

        $band->genres()->sync($request->genres);

        return back()->with('success', 'Band has been created');
    }

    public function edit(Band $band)
    {
        return view('bands.edit', [
            'band' => $band,
            'genres' => Genre::get(),
        ]);
    }

    public function update(Request $request, Band $band)
    {
        $request->validate([
            'name' => 'required|unique:bands,name,' . $band->id,
            'thumbnail' => $request->thumbnail ? 'image|mimes:jpeg,jpg,gif,png' : '',
            'genres' => 'required'
        ]);

        if ($request->thumbnail) {
            Storage::delete($band->thumbnail);
            $thumbnail = request()->file('thumbnail')->store('images/band');
        } else if ($band->thumbnail) {
            $thumbnail = $band->thumbnail;
        } else {
            $thumbnail = null;
        }

        $band->update([
            'name' => $request->name,
            'thumbnail' => $thumbnail
        ]);

        $band->genres()->sync($request->genres);

        return back()->with('success', 'Band has been updated');
    }
}

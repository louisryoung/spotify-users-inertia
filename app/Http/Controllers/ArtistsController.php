<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class ArtistsController extends Controller
{
    /**
     * @return Artist[]|Collection
     */
    public function get()
    {
        $artists = Artist::all();
        
        return Inertia::render('Dashboard', [
            'artists'   => $artists,
        ]);
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|max:50',
            'spotify_id' => 'nullable|alpha_num|distinct|size:22',
            'deezer_id' => 'nullable|numeric|distinct',
            'apple_id' => 'nullable|numeric|distinct',
            'bio' => 'nullable|max:1024',
        ]);
        Artist::create($request->all());

        return Redirect::route('dashboard');
    }
}

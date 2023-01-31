<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Services\SpotifyService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class ArtistsController extends Controller
{
    /**
     * @return Artist[]|Collection
     */
    private $spotifyService;
    public function __construct()
    {
        $this->spotifyService = new SpotifyService();
    }

    public function get()
    {
        $artists = Artist::all();
        
        return Inertia::render('Dashboard', compact('artist'));
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

    public function show($artist)
    {
        $artist = Artist::findOrFail($artist);
        $spotifyArtist = $this->spotifyService->findArtist($artist->spotify_id);

        return Inertia::render('Artist', compact('artist', 'spotifyArtist'));
    }
}

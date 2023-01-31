<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use Illuminate\Database\Eloquent\Collection;

class ArtistsController extends Controller
{
    /**
     * @return Artist[]|Collection
     */
    public function get()
    {
        return Artist::all();
    }
}

<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Artist;
use App\Services\SpotifyService;

class SyncFollowers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync:followers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Syncing Followers Data from Spotify';

    private $spotifyService;

    /**
     * Create a new command instance.
     *
     * @return void
     */

    public function __construct()
    {
        parent::__construct();
        $this->spotifyService = new SpotifyService();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $artists = Artist::all();
        foreach ($artists as $artist) {
            if ($artist->spotify_id) {
                $spotifyArtist = $this->spotifyService->findArtist($artist->spotify_id);
                if ($spotifyArtist) {
                    $artist->followers = $spotifyArtist->followers->total;
                    $artist->save();
                }
            }
        }
    }
}

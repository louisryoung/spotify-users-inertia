<?php

namespace App\Services;

use SpotifyWebAPI\Session;
use SpotifyWebAPI\SpotifyWebAPI;
use SpotifyWebAPI\SpotifyWebAPIException;
use Illuminate\Support\Facades\Cache;

class SpotifyService
{
    /**
     * @var string
     */
    private $accessToken;

    /**
     * @var SpotifyWebAPI
     */
    private $api;

    /**
     * SpotifyService constructor.
     */
    public function __construct()
    {
        $this->authenticate();

        $this->api = new SpotifyWebAPI();
        $this->api->setAccessToken($this->accessToken);
    }

    /**
     * @param $identifier
     */
    public  function findArtist($identifier)
    {
        $artist = null;
        try {
            if (Cache::has($identifier)) {
                $artist = Cache::get($identifier);
            } else {
                $artist = $this->api->getArtist($identifier);
                Cache::put($identifier, $artist, now()->addHour());
            }
        } catch (SpotifyWebAPIException $e) {
            echo 'Spotify API Error: ' . $e->getCode();
        }

        return $artist;
    }

    /**
     * Set up authentication so requests can be made to Spotify API
     */
    private function authenticate()
    {
        if(Cache::has('spotify_access_token')) {
            $this->accessToken = Cache::get('spotify_access_token');
        } else {
            $session = new Session(
                env("SPOTIFY_CLIENT_ID"), env("SPOTIFY_CLIENT_SECRET")
            );
            $session->requestCredentialsToken();
            $this->accessToken = $session->getAccessToken();
            Cache::put('spotify_access_token', $this->accessToken, now()->addHour());
        }
    }
}

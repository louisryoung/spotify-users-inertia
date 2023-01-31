<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class AddArtistTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_artist_can_be_added()
    {
        $this->actingAs($user = User::factory()->create());
        $response = $this->withHeaders([
            'X-Header' => 'Value',
        ])->post('/artists/create', ['name' => 'Sally']);

        $response->assertStatus(302);
        $response->assertRedirect('/dashboard');
    }
}

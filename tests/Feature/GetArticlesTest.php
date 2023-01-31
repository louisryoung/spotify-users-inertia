<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Artist;

class GetArticlesTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_articles_can_be_loaded()
    {
        $this->actingAs($user = User::factory()->create());
        $artist = Artist::factory()->create([
            'name' => 'hello'
        ]);

        $response = $this->get('/dashboard');

        $response->assertStatus(200);
        $response->assertSee($artist->name);
    }
}

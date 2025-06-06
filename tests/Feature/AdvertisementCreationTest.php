<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdvertisementCreationTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_create_advertisement()
    {
        $user = factory(User::class)->create();

        $data = [
            'title' => 'Test Advertisement',
            'description' => 'This is a test advertisement description.'
        ];

        $response = $this->actingAs($user)
                         ->post('/advertisement/store', $data);

        $response->assertStatus(302);
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('advertisements', [
            'title' => $data['title'],
            'description' => $data['description'],
            'user_id' => $user->id,
        ]);
    }
}

<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Modules\Signup\Models\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class AddPhoneFeatureTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

     use RefreshDatabase;

    public function test_add_phone_view_is_rendered()
    {
        // $this->withoutExceptionHandling();
        // $user = User::factory()->create();
        // $this->actingAs($user);

        $this->withoutMiddleware();

        $response = $this->get('/add/phone');
        $response->assertStatus($response->status(), 200);
        //$response->assertStatus(200);
    }

    public function test_user_can_add_a_phone()
    { 
        //$user = User::factory()->create();
        $this->withoutMiddleware();

        $response = $this->post('/add_phone',[
            'name' => 'Infinix hot 12', 
            'price' => '520000',  
            'category' => 'ANDROID', 
        ]);
  
        $response->assertStatus(200);
    }
}

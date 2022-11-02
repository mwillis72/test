<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class LoginTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_login_view_can_be_rendered()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
        $response->assertSee('Please sign in to continue','Remember me');
        $response->assertDontSee('Please sign up to continue');
    }

    // public function test_user_can_login()
    // {
        
    //     $user = User::factory()->create();

    //     $response = $this->post('/login',[
    //         'email' => 'sam@gmail.com',
    //         'password' => 'mysecpass',
    //     ]);

    //     $this->assertAuthenticated();
    //     $response->assertRedirect(RouteServiceProvider::HOME);
    // }
}

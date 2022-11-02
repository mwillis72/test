<?php

namespace Tests\Feature;

use Modules\Signup\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_registration_view_can_be_rendered()
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
        $response->assertSee('Please sign up to continue');
        $response->assertDontSee('Remember me');
    }

    // public function test_user_can_be_registered()
    // {

    //     $response = $this->post('/register',[
    //         'name' => 'Sam Developer',
    //         'occupation' => 'Laravel Dev',
    //         'phone' => '0758993567',
    //         'photo' => 'sam.jpg',
    //         'email' => 'sam@gmail.com',
    //         'password' => 'mysecpass',
    //         'repeat_password' => 'mysecpass',
    //         'agreement' => 'accepted',
    //     ]);

    //     $this->assertAuthenticated();
    //     $response->assertRedirect(RouteServiceProvider::HOME);
    // }
}

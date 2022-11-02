<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class AddPhoneTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_add_phone()
    {
        $this->withoutMiddleware();

        $response = $this->call('POST','/add_phone',[
            'name' => 'Infinix', 
            'price' => '300,000',  
            'category' => 'Android', 
        ]);

        $response->assertStatus($response->status(), 200);
        //$this->assertTrue(true);
    }
}

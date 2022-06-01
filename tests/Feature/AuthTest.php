<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthTest extends TestCase
{
    /**
     * Test registering a user
     */
    public function test_register(){

        $userData = [
            "name" => "John Doe",
            "email" => "doe@example.com",
            "phone_number" => "0932111112",
            "password" => "demo12345"
        ];

        $this->postJson('api/v1/auth/register', $userData, ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJson(['Status'=>true,"Message"=>"User successfully registered."]);
    }
}
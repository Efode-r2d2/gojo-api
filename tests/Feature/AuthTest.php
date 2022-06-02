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

        $userInfo = [
            "name" => "John Doe",
            "email" => "doe@example.com",
            "phone_number" => "0932111113",
            "password" => "demo12345"
        ];

        $this->postJson('api/v1/auth/register', $userInfo, ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJson(['Status'=>true,"Message"=>"User successfully registered."]);
    }
    /**
     * Test logging into the system
     */
    public function test_login(){
        $userInfo = [
            "phone_number" => "0932111113",
            "password" => "demo12345"
        ];

        $this->postJson('api/v1/auth/login', $userInfo, ['Accept' => 'application/json'])
            ->assertStatus(200);
    }
}

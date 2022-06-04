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

        $user_info = [
            "name" => "John Doe",
            "email" => "doe@example.com",
            "phone_number" => "0932111114",
            "password" => "demo12345"
        ];

        $this->postJson('api/v1/auth/register', $user_info, ["Accept" => "application/json"])
            ->assertStatus(200)
            ->assertJson(['Status'=>true,"Message"=>"User successfully registered."]);
    }
    
    /**
     * Test invalid phone number
     */
    public function test_login_phone_validation(){
        $user_info = [
            "phone_number" => "091234",
            "password" => "demo12345" 
        ];

        $this->postJson("api/v1/auth/login", $user_info, ["Accept" => "application/json"])
            ->assertStatus(422);
    }

    /**
     * Test invalid password
     */
    public function test_login_invalid_password(){
        $user_info = [
            "phone_number" => "0932111114",
            "password" => ""
        ];

        $this->postJson("api/v1/auth/login", $user_info, ["Accept" => "application/json"])
            ->assertStatus(422);
    }

    /**
     * Test logging into the system
     */
    public function test_login(){
        $user_info = [
            "phone_number" => "0932111114",
            "password" => "demo12345"
        ];

        $this->postJson("api/v1/auth/login", $user_info, ["Accept" => "application/json"])
            ->assertStatus(200);
    }
}

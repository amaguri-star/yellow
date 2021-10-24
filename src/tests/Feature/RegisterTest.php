<?php

namespace Tests\Feature;

use Auth;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_view_a_register_form()
    {
        $response = $this->get(route('auth.register'));
        $response->assertStatus(200);
        $response->assertViewIs('auth.register');
    }

    public function test_user_can_create_own_accout_with_correct_input_fields()
    {
        $this->get(route('auth.register'));

        $user = [
            'name' => 'testuser',
            'email' => 'testuser@sample.com',
            'password' => 'testuserpass01',
            'password_confirmation' => 'testuserpass01',
        ];

        $response = $this->post(route('auth.register'), $user);
        $this->assertDatabaseHas('users', ['email' => 'testuser@sample.com']);
        $response->assertRedirect(route('home'));
        $this->assertTrue(Auth::check());
    }
}

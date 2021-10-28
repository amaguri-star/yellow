<?php

namespace Tests\Feature;

use Auth;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->user = [
            'name' => 'testuser',
            'email' => 'testuser@sample.com',
            'password' => 'testuserpass01',
            'password_confirmation' => 'testuserpass01',
        ];
    }

    public function test_user_can_view_a_register_form()
    {
        $response = $this->get(route('auth.register'));
        $response->assertStatus(200);
        $response->assertViewIs('auth.register');
    }

    public function test_user_can_create_own_accout_with_correct_input_fields()
    {
        $this->get(route('auth.register'));
        $response = $this->post(route('auth.register'), $this->user);
        $response->assertRedirect(route('home'));
        $this->assertDatabaseHas('users', ['email' => 'testuser@sample.com']);
        $this->assertTrue(Auth::check());
    }

    public function test_validate_error_is_fired_when_user_name_contains_string_other_than_alpha_num()
    {
        $this->get(route('auth.register'));
        $this->user['name'] = 'invalid-name';
        $response = $this->post(route('auth.register'), $this->user);
        $response->assertRedirect(route('auth.register'));
        $response->assertSessionHasErrors(['name' => 'The name must only contain letters and numbers.']);
        $this->assertDataBaseMissing('users', ['name' => 'invalid-name']);
        $this->assertFalse(Auth::check());
    }

    public function test_validate_error_is_fired_when_user_name_less_than_three_characters()
    {
        $this->get(route('auth.register'));
        $this->user['name'] = 'ab';
        $response = $this->post(route('auth.register'), $this->user);
        $response->assertRedirect(route('auth.register'));
        $response->assertSessionHasErrors(['name' => 'The name must be at least 3 characters.']);
        $this->assertDataBaseMissing('users', ['name' => 'ab']);
        $this->assertFalse(Auth::check());
    }

    public function test_validate_error_is_fired_when_user_name_greater_than_sixteen_charachters()
    {
        $this->get(route('auth.register'));
        $name = 'thisnameisgraterthansixteenchar';
        $this->user['name'] = $name;
        $response = $this->post(route('auth.register'), $this->user);
        $response->assertRedirect(route('auth.register'));
        $response->assertSessionHasErrors(['name']);
        $this->assertDataBaseMissing('users', ['name' => $name]);
        $this->assertFalse(Auth::check());
    }
}

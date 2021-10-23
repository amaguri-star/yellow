<?php

namespace Tests\Feature;

use App\Models\User;
use Auth;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_can_view_a_login_form()
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
        $response->assertViewIs('auth.login');
    }

    public function test_user_can_login_with_correct_credentials()
    {
        $user = User::factory()->create([
            'password' => bcrypt('i-love-laravel'),
        ]);

        $this->assertFalse(Auth::check());
        $this->get('/login');

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'i-love-laravel',
        ]);

        $this->assertTrue(Auth::check());
        $response->assertRedirect(route('home'));
    }

    public function test_user_can_not_login_with_incorrect_credentials()
    {
        $user = User::factory()->create([
            'password' => bcrypt('i-love-laravel'),
        ]);

        $this->assertFalse(Auth::check());
        $this->get('/login');

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'i-do-not-love-laravel',
        ]);

        $this->assertFalse(Auth::check());
        $response->assertSessionHasErrors([
            'email' => trans('auth.failed'),
        ]);
        $response->assertRedirect(route('auth.login'));
    }

}

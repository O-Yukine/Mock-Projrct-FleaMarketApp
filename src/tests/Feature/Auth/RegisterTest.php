<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_access_to_registerpage()
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }

    public function test_user_can_register()
    {
        $testData = [
            'name' => 'test1',
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ];

        $response = $this->post('/register', $testData);

        $this->assertDatabaseHas('users', [
            'email' => 'test@example.com',
            'name' => 'test1',
        ]);

        $this->assertAuthenticated();

        $response->assertRedirect('/mypage/profile');
    }

    public function test_validation_name()
    {
        $response = $this->post('/register', [
            'name' => '',
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response->assertSessionHasErrors(['name' => 'お名前を入力してください',]);
    }

    public function test_validation_email()
    {
        $response = $this->post('/register', [
            'name' => 'test1',
            'email' => '',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response->assertSessionHasErrors(['email' => 'メールアドレスを入力してください',]);
    }

    public function test_validation_password_is_empty()
    {
        $response = $this->post('/register', [
            'name' => 'test1',
            'email' => 'test@example.com',
            'password' => '',
            'password_confirmation' => 'password',
        ]);

        $response->assertSessionHasErrors(['password' => 'パスワードを入力してください',]);
    }

    public function test_validation_password_is_less_than_eight()
    {
        $response = $this->post('/register', [
            'name' => 'test1',
            'email' => 'test@example.com',
            'password' => 'passwor',
            'password_confirmation' => 'password',
        ]);

        $response->assertSessionHasErrors(['password' => 'パスワードは8文字以上で入力してください',]);
    }

    public function test_validation_password_notmatch()
    {
        $response = $this->post('/register', [
            'name' => 'test1',
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'passworb',
        ]);

        $response->assertSessionHasErrors(['password_confirmation' => 'パスワードと一致しません',]);
    }
}

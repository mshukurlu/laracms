<?php

namespace Tests\Feature\App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_login_page()
    {
        $user = User::factory()->create();

        $response = $this->post('/login',[
            'email'=>$user->email,
            'password'=>'password'
        ]);

        $response->assertRedirect('/home');

        $this->assertAuthenticatedAs($user);
    }
}

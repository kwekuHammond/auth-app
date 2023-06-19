<?php

namespace Tests\Feature;

use App\Actions\StoreUserAction;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase; //trait to interact with the database when testing database

    public function test_store_user_action()
    {
        $requestData = [
            'name' => 'Akwesi Philipo',
            'email' => 'akwesiphilipo@mail.com',
            'phone' => '0241234567',
            'password' => 'password',
        ];

        $response = $this->post('http://localhost:8001/api/users', $requestData);
        $response->assertStatus(200);
    }

    public function test_user_login(){
        $user = User::factory()->create([
            'name' => 'Akwesi Philipo',
            'email' => 'akwesiphilipo@mail.com',
            'phone' => '0241234567',
            'password' => 'password'
        ]);

        $response = $this->post('http://localhost:8001/api/users/login', [
            'email' => $user->email,
            'password' => 'password'
        ]);
        $this->assertGuest();
        $response->assertStatus(200);
//        $this->assertAuthenticated();
    }

}

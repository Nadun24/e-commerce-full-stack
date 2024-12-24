<?php

namespace Tests\Feature\UserAuthentication;



use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;



final class AdminAuthenticationTest extends TestCase
{
    use RefreshDatabase;
    // test already run remove data from database
    public function test_admin_can_sign_in()
    {
        // triple AAA theory

        // A -Arrage test data for test case
            $user = User::factory()->create();

            $userLoginDetails = [
              'email' => $user->email,
              'password' => '12345678'
            ];

        // A -Action the test case
        $response = $this->post('api/user-sign-in', $userLoginDetails);

        // A -Assertion the test outcome
        $response->assertStatus(200);

        $response->assertJsonStructure([
            'user_first_name',
            'user_last_name',

        ]);

    }


}

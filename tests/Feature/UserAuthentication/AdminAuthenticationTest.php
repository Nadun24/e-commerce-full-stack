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
            'user_last_name'

        ]);
        $response->assertExactJson(
            [
                'user_first_name' => $user->first_name,
                'user_last_name' => $user->last_name
            ]
        );

    }

    public function test_if_user_not_existing_should_return_bad_request()
    {
        // A -Arrage test data for test case
        $userLoginDetails = [
            "email" => "test@test.com",
            "password" => "12345678"
        ];

        // Action
        $response = $this->post('api/user-sign-in', $userLoginDetails);

        //Assertion
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'status',
            'message'
        ]);

    }


}

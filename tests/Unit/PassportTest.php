<?php

namespace Tests\Unit;

use Tests\TestCase;

class PassportTest extends TestCase
{
    const LOGIN_ROUTE = '/api/login';

    /**
     * Test login sending no data.
     *
     * @return void
     */
    public function testSendNoDataToLogin()
    {
        $response = $this->postJson('/api/login');
        $response->assertStatus(422);
    }

    /**
     * Test login with bad email format.
     *
     * @return void
     */
    public function testSendWrongEmailFormatToLogin()
    {
        $response = $this->postJson('/api/login', [
            'email' => 'test',
            'password' => 'test'
        ]);
        
        $response->assertStatus(422);
    }

    /**
     * Test login with wrong data.
     *
     * @return void
     */
    public function testNoAuthenticationOnLogin()
    {
        $response = $this->postJson('/api/login', [
            'email'     => 'danieletulone.work@gmail.com',
            'password'  => 'Hacksombrero'
        ]);

        $response->assertStatus(401);
        $response->assertJson([
            "error" => "Unauthorised"
        ]);
    }

    /**
     * Testing login with right data.
     *
     * @return void
     */
    public function testAuthenticationOnLogin()
    {
        $response = $this->postJson('/api/login', [
            'email'     => 'danieletulone.work@gmail.com',
            'password'  => 'Hacksombrero1'
        ]);
        
        $response->assertStatus(201);
    }

    /**
     * Testing login with right data.
     *
     * @return void
     */
    public function testRegistrationSuccess()
    {
        $response = $this->postJson('/api/login', [
            'email'     => 'danieletulone.work@gmail.com',
            'password'  => 'Hacksombrero1'
        ]);
        
        $response->assertStatus(201);
    }

    /**
     * Testing login with right data.
     *
     * @return void
     */
    public function testRegistrationFailure()
    {
        $response = $this->postJson('/api/login', [
            'email'     => 'danieletulone.work@gmail.com',
            'password'  => 'Hacksombrero1'
        ]);
        
        $response->assertStatus(201);
    }
}

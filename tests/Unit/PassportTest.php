<?php

namespace Tests\Unit;

use Tests\TestCase;

class PassportTest extends TestCase
{

    private function getLoginPath()
    {
        return '/api/auth/login';
    }

    private function getRegisterPath()
    {
        return '/api/auth/register';
    }

    /**
     * Testing login with right data.
     *
     * @return void
     */
    public function testRegistrationSuccess()
    {
        $this->artisan('migrate:refresh');
        $this->artisan('passport:install');

        $response = $this->postJson($this->getRegisterPath(), [
            'firstname' => 'Daniele',
            'lastname' => 'Tulone',
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);
        
        $response->assertStatus(201);
    }

    /**
     * Test login sending no data.
     *
     * @return void
     */
    public function testSendNoDataToLogin()
    {
        $response = $this->postJson($this->getLoginPath());
        $response->assertStatus(422);
    }

    /**
     * Test login with bad email format.
     *
     * @return void
     */
    public function testSendWrongEmailFormatToLogin()
    {
        $response = $this->postJson($this->getLoginPath(), [
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
        $response = $this->postJson($this->getLoginPath(), [
            'email'     => 'test@example.com',
            'password'  => 'pass'
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
        $response = $this->postJson($this->getLoginPath(), [
            'email'     => 'test@example.com',
            'password'  => 'password'
        ]);
        
        $response->assertStatus(201);
    }

    /**
     * Testing login with right data.
     *
     * @return void
     */
    public function testRegistrationFailureEmailWrong()
    {
        $response = $this->postJson($this->getRegisterPath(), [
            'firstname' => 'Daniele',
            'lastname' => 'Tulone',
            'email' => 'test@example',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);
        
        $response->assertStatus(422);
    }

     /**
     * Testing login with right data.
     *
     * @return void
     */
    public function testRegistrationFailurePasswordWrong()
    {
        $response = $this->postJson($this->getRegisterPath(), [
            'firstname' => 'Daniele',
            'lastname' => 'Tulone',
            'email' => 'test@example',
            'password' => 'password',
            'password_confirmation' => 'pass',
        ]);
        
        $response->assertStatus(422);
    }
}

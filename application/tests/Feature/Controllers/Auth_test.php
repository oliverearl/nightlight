<?php

namespace App\Tests\Feature\Controllers;

use App\Tests\DbTestCase;

class Auth_test extends DbTestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->resetInstance();

        $this->request->enableHooks();
    }

    public function test_guests_will_see_a_login_page(): void
    {
        $output = $this->request('GET', '/login');

        $this->assertResponseCode(200);

        $this->assertContains('Login', $output);
    }

    public function test_users_will_be_redirected_to_the_dashboard(): void
    {
        $this->mockLogin();

        $this->request('GET', '/login');

        $this->assertRedirect('/dashboard');
    }

    public function test_login_submissions_must_have_a_valid_email_address(): void
    {
        $output = $this->request('POST', '/login', [
            'email' => 'not a valid email address',
            'password' => 'password',
        ]);

        $this->assertContains('must contain a valid email address', $output);
    }
}

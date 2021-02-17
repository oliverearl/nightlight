<?php

namespace App\Tests\Feature\Controllers;

use App\Tests\TestCase;

class Dashboard_test extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->resetInstance();

        $this->request->enableHooks();
    }

    public function test_guests_cannot_view_the_dashboard(): void
    {
        $output = $this->request('GET', '/dashboard');

        $this->assertRedirect('/login');
    }

    public function test_users_can_view_the_dashboard(): void
    {
        $this->mockLogin();

        $output = $this->request('GET', '/dashboard');

        $this->assertContains('Dashboard', $output);
    }
}

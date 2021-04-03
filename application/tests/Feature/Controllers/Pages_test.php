<?php

namespace App\Tests\Feature\Controllers;

use App\Tests\TestCase;

class Pages_test extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->resetInstance();

        $this->request->enableHooks();
    }

    public function test_the_homepage_is_viewable(): void
    {
        $output = $this->request('GET', '/');

        $this->assertResponseCode(200);

        $this->assertContains('Home', $output);
    }

    public function test_the_call_page_is_viewable(): void
    {
        $output = $this->request('GET', '/call');

        $this->assertResponseCode(200);

        $this->assertContains('phone number', $output);
    }

    public function test_the_email_page_is_viewable(): void
    {
        $output = $this->request('GET', '/email');

        $this->assertResponseCode(200);

        $this->assertContains('emails within 48 hours', $output);
    }

    public function test_the_instant_messaging_page_is_viewable(): void
    {
        $output = $this->request('GET', '/chat');

        $this->assertResponseCode(200);

        $this->assertContains('online chat service', $output);
    }

    public function test_the_what_is_nightline_page_is_viewable(): void
    {
        $output = $this->request('GET', '/what-is-nightline');

        $this->assertResponseCode(200);

        $this->assertContains('History of Nightline', $output);
    }
}

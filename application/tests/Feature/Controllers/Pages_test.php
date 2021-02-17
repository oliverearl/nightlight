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
}

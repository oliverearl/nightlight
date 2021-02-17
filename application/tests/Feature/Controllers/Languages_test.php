<?php

namespace App\Tests\Feature\Controllers;

use App\Tests\TestCase;

class Languages_test extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->resetInstance();

        $this->request->enableHooks();
    }

    public function test_the_site_can_be_set_to_english(): void
    {
        $this->request('GET', '/en');

        $this->assertRedirect('/');

        $check_for_english = $this->request('GET', '/');

        $this->assertContains('Home', $check_for_english);
    }

    public function test_the_site_can_be_set_to_welsh(): void
    {
        $this->request('GET', '/cy');

        $this->assertRedirect('/');

        $check_for_welsh = $this->request('GET', '/');

        $this->assertContains('Hafan', $check_for_welsh);
    }
}

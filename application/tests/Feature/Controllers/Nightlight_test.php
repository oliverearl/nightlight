<?php

namespace App\Tests\Feature\Controllers;

use App\Tests\TestCase;

class Nightlight_test extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->resetInstance();

        $this->request->enableHooks();
    }

    public function test_nightlight_chat_system_being_set_to_zoho_enables_the_legacy_instant_messaging_system(): void
    {
        $this->request('GET', '/testing/chat/legacy');

        $this->assertResponseCode(204);

        $output = $this->request('GET', '/chat');

        $this->assertResponseCode(200);

        $this->assertContains('http://chat.zoho.com', $output);
    }

    public function test_nightlight_chat_system_being_set_to_mibew_enables_the_standard_instant_messaging_system(): void
    {
        $this->request('GET', '/testing/chat/nla');

        $this->assertResponseCode(204);

        $output = $this->request('GET', '/chat');

        $this->assertContains('trialling our new instant messaging system', $output);

        $this->assertResponseCode(200);

        $this->assertContains('https://im.aberystwyth.nightline.ac.uk/webim/client.php', $output);
    }
}

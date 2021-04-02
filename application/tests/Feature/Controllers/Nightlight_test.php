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
        get_instance()->config->set_item('nightlight_chat_system', CHAT_SYSTEM_ZOHO);

        $output = $this->request('GET', '/chat');

        $this->assertContains('http://chat.zoho.com', $output);
    }

    public function test_nightlight_chat_system_being_set_to_mibew_enables_the_standard_instant_messaging_system(): void
    {
        get_instance()->config->set_item('nightlight_chat_system', CHAT_SYSTEM_MIBEW);

        $output = $this->request('GET', '/chat');

        $this->assertContains('trialling our new instant messaging system', $output);

        $this->assertContains('https://im.aberystwyth.nightline.ac.uk/webim/client.php', $output);
    }

}

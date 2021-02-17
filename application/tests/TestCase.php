<?php

namespace App\Tests;

use App\Tests\Traits\MockLogin;
use CIPHPUnitTestCase;

abstract class TestCase extends CIPHPUnitTestCase
{
    use MockLogin;
}

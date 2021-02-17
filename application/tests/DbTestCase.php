<?php

namespace App\Tests;

use App\Tests\Traits\MockLogin;
use CIPHPUnitTestDbTestCase;

abstract class DbTestCase extends CIPHPUnitTestDbTestCase
{
    use MockLogin;
}

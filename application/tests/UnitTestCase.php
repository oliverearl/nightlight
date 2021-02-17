<?php

namespace App\Tests;

use App\Tests\Traits\MockLogin;
use CIPHPUnitTestUnitTestCase;

abstract class UnitTestCase extends CIPHPUnitTestUnitTestCase
{
    use MockLogin;
}

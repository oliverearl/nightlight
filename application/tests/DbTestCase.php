<?php

namespace App\Tests;

use CIPHPUnitTestDbTestCase;

abstract class DbTestCase extends CIPHPUnitTestDbTestCase
{
    use MockLogin;
}

<?php

namespace App\Tests;

trait MockLogin
{
    public function __construct()
    {
        // Just having the constructor suppresses weird PhpStorm suggestions...
    }

    /**
     * This method loads a mocked version of Ion Auth to mimic being logged in without needing
     * to load the library.
     */
    protected function mockLogin(): void
    {
        $this->request->setCallablePreConstructor(function () {
            $auth = $this->getDouble('Ion_auth', ['logged_in' => true]);
            load_class_instance('ion_auth', $auth);
        });
    }
}

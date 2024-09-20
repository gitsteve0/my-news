<?php

namespace App\Http\Middleware;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function unauthenticated($request, array $guards)
    {
        $redirectTo = in_array('panel', $guards) ? route('panel.login') : route('login');

        throw new AuthenticationException(
            'Unauthenticated.', $guards, $redirectTo
        );
    }
}

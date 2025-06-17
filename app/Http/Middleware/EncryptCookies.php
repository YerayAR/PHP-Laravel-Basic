<?php

namespace App\Http\Middleware;

use Illuminate\Cookie\Middleware\EncryptCookies as Middleware;

/**
 * Middleware responsible for encrypting cookies sent back to the client.
 *
 * Any cookie names listed in the $except array will not be encrypted.
 */
class EncryptCookies extends Middleware
{
    /**
     * Cookies that should not be encrypted.
     *
     * @var array<int, string>
     */
    protected $except = [];
}

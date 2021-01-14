<?php

use Illuminate\Contracts\Auth\Authenticatable;

/**
 * A simple helper that return the authenticated user.
 *
 * @return Authenticatable
 */
function current_user(): Authenticatable
{
    return auth()->user();
}

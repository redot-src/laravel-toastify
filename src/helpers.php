<?php

use Illuminate\Support\Facades\App;
use Redot\LaravelToastify\Toastify;

/**
 * Get the toastify instance.
 */
function toastify(): Toastify
{
    return App::make(Toastify::class);
}

<?php

namespace Redot\LaravelToastify;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

/**
 * @method void toast(string $message, array $options = [])
 * @method void error(string $message, array $options = [])
 * @method void success(string $message, array $options = [])
 * @method void info(string $message, array $options = [])
 * @method void warning(string $message, array $options = [])
 */
class Toastify
{
    /**
     * Get toastify css.
     */
    public function css(): string
    {
        return View::make('toastify::css')->render();
    }

    /**
     * Get toastify js.
     */
    public function js(): string
    {
        return View::make('toastify::js')->render();
    }

    /**
     * Push message to session.
     */
    protected function push(string $message, string $type, array $options = []): void
    {
        Session::push('toastify', compact('message', 'type', 'options'));
    }

    /**
     * Magic method to call toast methods.
     */
    public function __call(string $name, array $arguments)
    {
        $this->push($arguments[0], $name, $arguments[1] ?? []);
    }
}

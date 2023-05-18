<?php

namespace Redot\LaravelToastify;

use Illuminate\Support\Facades\Session;

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
     * Magic method to call toast methods.
     */
    public function __call(string $name, array $arguments)
    {
        $this->push($arguments[0], $name, $arguments[1] ?? []);
    }

    /**
     * Push message to session.
     */
    protected function push(string $message, string $type, array $options = []): void
    {
        Session::push('toastify', compact('message', 'type', 'options'));
    }
}

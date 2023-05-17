<?php

namespace Redot\LaravelToastify;

use Illuminate\Support\Facades\Session;

class Toastify
{
    /**
     * Append a new toast message.
     */
    public function toast(string $message, array $options = []): void
    {
        $this->push($message, 'toast', $options);
    }

    /**
     * Append a new error message.
     */
    public function error(string $message, array $options = []): void
    {
        $this->push($message, 'error', $options);
    }

    /**
     * Append a new success message.
     */
    public function success(string $message, array $options = []): void
    {
        $this->push($message, 'success', $options);
    }

    /**
     * Append a new info message.
     */
    public function info(string $message, array $options = []): void
    {
        $this->push($message, 'info', $options);
    }

    /**
     * Append a new warning message.
     */
    public function warning(string $message, array $options = []): void
    {
        $this->push($message, 'warning', $options);
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

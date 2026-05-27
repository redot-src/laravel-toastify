<?php

namespace Redot\LaravelToastify;

use Livewire\Component;

/**
 * @method void toast(string $message, array $options = [])
 * @method void error(string $message, array $options = [])
 * @method void success(string $message, array $options = [])
 * @method void info(string $message, array $options = [])
 * @method void warning(string $message, array $options = [])
 */
class LivewireToastifier
{
    public function __construct(protected Component $component)
    {
    }

    /**
     * Dispatch a toast to the browser from the Livewire component.
     */
    public function __call(string $name, array $arguments): void
    {
        $this->component->dispatch(
            'toastify',
            message: $arguments[0],
            type: $name,
            options: $arguments[1] ?? [],
        );
    }
}

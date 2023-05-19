# Laravel Toastify

Laravel Toastify is a PHP library that allows you to quickly and easily display toast messages in your Laravel applications. It is built on top of [toastify-js](https://github.com/apvarun/toastify-js), a JavaScript library for displaying beautiful toast messages.

## Installation

Installation of Laravel Toastify is easy. Simply run the following command:

```bash
composer require redot/laravel-toastify
```

Then, add the following line to the head section of your `app.blade.php` file:

```html
@toastifyCss
```

And the following line to the bottom of your `app.blade.php` file:

```html
@toastifyJs
```

If you want to customize the default configuration, you can publish the configuration file using this command:

```bash
php artisan vendor:publish --tag=toastify-config
```

## Usage

To display a toast message, simply call the `toastify()` helper function with the desired type and message:

```php
toastify()->success('Your action was successful!');
```

There are five predefined methods available by default: `success()`, `info()`, `warning()`, `error()`, and `toast()`. Each method accepts two parameters: the message to display and an optional options array.

```php
toastify()->success('Your action was successful!', [
    'duration' => 5000,
    // ...
]);
```

If you want to create custom toast types, you can add them in the `toastifiers` array of the configuration file.

```php
'toastifiers' => [
    'custom' => [
        'duration' => 5000,
        'style' => [
            'background' => '#000',
            'color' => '#fff',
        ],
    ],
],
```

You can then use the `toastify()` helper function to call your custom method:

```php
toastify()->custom('/* ... */');
```

## Client-side usage

Laravel Toastify also provides a client-side `toastify()` method that you can use to display toast messages from your JavaScript code. The syntax is similar to the server-side `toastify()` helper function:

```javascript
toastify().success('Your action was successful!');
```

## Configuration

The configuration file for Laravel Toastify is located at `config/toastify.php`. Here you can specify the CDN links for the toastify library and customize the default toastifiers.
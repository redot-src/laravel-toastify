# Laravel Toastify

Laravel Toastify is a library for integrating [toastify-js](https://github.com/apvarun/toastify-js) into Laravel applications. It provides an easy way to display toast messages in your application.

## Installation

Install the package via composer:

```bash
composer require redot/laravel-toastify
```

Then add the following line to the end of your blade layout file:

```html
@include('toastify::toastify')
```

If you want to customize the default configuration, you can publish the configuration file:

```bash
php artisan vendor:publish --tag=toastify-config
```

## Usage

To display a toast message, you can use the `toastify()` helper function:

```php
toastify()->success('/* ... */');
```

The `toastify()` helper function returns an instance of `Redot\LaravelToastify\Toastify`, which provides the following methods by default:

```php
toastify()->success('/* ... */');
toastify()->info('/* ... */');
toastify()->warning('/* ... */');
toastify()->error('/* ... */');
toastify()->toast('/* ... */');
```

Each method accepts two parameters: the message to display, and an optional options array. The options array can be used to override the default options specified in the configuration file.

```php
toastify()->success('/* ... */', [
    'duration' => 5000,
    // ...
]);
```

If you want to extend the `Toastify` class with your own methods, you can add them to the configuration file in the 'toastifiers' array:

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

Laravel Toastify provides a `toastify` method to the `window` object, which can be used to display toast messages from your JavaScript code just like the `toastify()` helper function in PHP:

```javascript
toastify().success('/* ... */');
```

## Configuration

The configuration file for Laravel Toastify is located at `config/toastify.php`. Here you can specify the CDN links for the toastify library, as well as the default toastifiers.
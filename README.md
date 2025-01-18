# Laravel Title

Probably the easiest way to add dynamic HTML title to Laravel app

## Installation

Run the following command from your terminal:

```bash
composer require kminek/laravel-title
```

or add this to `require` section in your `composer.json` file:

```bash
"kminek/laravel-title": "^1.0"
```

then run `composer update`

## Usage

Modify your layout template (for example `resources/views/layouts/app.blade.php`):

```bladehtml
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ title() }}</title>
    </head>
    <body>
        <main>
            @yield('content')
        </main>
    </body>
</html>
```

Modify your controller action template (for example `resources/views/auth/register.blade.php`):

```bladehtml
@extends('layouts.app')

@title('Register')

@section('content')

    <h1>
        Register
    </h1>

    ...

@endsection
```

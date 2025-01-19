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

### Version compatibility

 Laravel | laravel-title
:--------|:-------------
 11.x    | 1.x

## Usage

Modify your layout view (for example `resources/views/layouts/app.blade.php`):

```html
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

Modify your controller action view (for example `resources/views/auth/register.blade.php`):

```html
@extends('layouts.app')

@title('Register')

@section('content')

    <h1>
        Register
    </h1>

    ...

@endsection
```

## Advanced usage

Change default separator (` | `):

```html
<title>{{ title()->separator(' - ') }}</title>
```

Change default text (`config('app.name')`):

```html
<title>{{ title()->default('AppName') }}</title>
```

Set a description which is displayed when no title is set inside
controller action view:

```html
<title>{{ title()->default('AppName')->description('This app will blow your mind!') }}</title>
```

You are not required to use `@title()` Blade directive, you can call
library directly which opens more possibilities:

```html
@extends('layouts.app')

@php(title()->append('Register')) {{-- append (same behaviour as Blade directive) --}}
@php(title()->prepend('Register')) {{-- prepend --}}
@php(title()->set('Register')) {{-- replace whole stack --}}

@section('content')

    <h1>
        Register
    </h1>

    ...

@endsection
```

You can have multiple title "stacks" under different keys.
Default stack is using "default" as a key, but you are free to create new ones:

```html
<title>{{ title('homepage') }}</title>
```

and later in Blade view:

```html
@php(title('homepage')->append('Register'))
```

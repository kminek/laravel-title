<?php

/**
 * `kminek/laravel-title` source code file
 *
 * @link      https://github.com/kminek/laravel-title
 * @copyright Copyright (c) 2025
 * @license   MIT
 * @author    Grzesiek W <kontakt@kminek.pl>
 */

declare(strict_types=1);

namespace Kminek\Title;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class TitleServiceProvider extends ServiceProvider
{
    /**
     * Register any package services.
     */
    public function register(): void
    {
        $this->app->singleton(TitleManager::class, function () {
            return new TitleManager;
        });

        $this->app->alias(TitleManager::class, 'title');
    }

    /**
     * Bootstrap any package services.
     */
    public function boot(): void
    {
        Blade::directive('title', function ($expression) {
            return "<?php title()->append($expression); ?>";
        });
    }
}

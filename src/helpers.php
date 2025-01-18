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

use Illuminate\Container\Container;
use Illuminate\Contracts\Container\BindingResolutionException;
use Kminek\Title\Title;
use Kminek\Title\TitleManager;

if (! \function_exists('title')) {
    /**
     * @throws BindingResolutionException
     */
    function title(string $key = 'default'): Title
    {
        /** @var TitleManager $titleManager */
        $titleManager = Container::getInstance()->make(TitleManager::class);

        return $titleManager->getTitle($key);
    }
}

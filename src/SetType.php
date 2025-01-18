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

enum SetType: string
{
    case Set = 'set';
    case Append = 'append';
    case Prepend = 'prepend';
}

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

use Illuminate\Support\Collection;
use Stringable;

class TitleManager implements Stringable
{
    /**
     * @var Collection<string, Title>
     */
    protected Collection $titles;

    public function __construct()
    {
        $this->titles = new Collection;
    }

    public function getTitle(string $key): Title
    {
        if ($this->titles->has($key)) {
            return $this->titles->get($key);
        }

        $title = new Title;
        $this->titles->put($key, $title);

        return $title;
    }

    public function __toString(): string
    {
        return (string) $this->getTitle('default');
    }

    public function __call(string $method, array $parameters)
    {
        return $this->getTitle('default')->$method(...$parameters);
    }
}

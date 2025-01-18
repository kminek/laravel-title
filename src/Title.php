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

use Closure;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Config;
use InvalidArgumentException;
use Stringable;

class Title implements Stringable
{
    /**
     * @var Collection<int, string>
     */
    protected Collection $elements;

    protected string $separator = ' | ';

    protected ?string $default = null;

    protected ?string $description = null;

    /**
     * @var callable
     */
    protected $renderer;

    public function __construct()
    {
        $this->elements = new Collection;
        $this->default = Config::string('app.name');
        $this->renderer(function () {
            $isEmpty = $this->elements->isEmpty();

            if ($this->default !== null) {
                $this->append($this->default);
            }

            if ($isEmpty && ($this->description !== null)) {
                $this->append($this->description);
            }

            return $this->elements->join($this->separator);
        });
    }

    public function separator(string $separator): self
    {
        $this->separator = $separator;

        return $this;
    }

    public function default(?string $default): self
    {
        $this->default = $default;

        return $this;
    }

    public function description(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function renderer(callable $renderer): self
    {
        $this->renderer = Closure::bind($renderer, $this, static::class);

        return $this;
    }

    public function setElement(string $title, SetType $type = SetType::Append): self
    {
        switch ($type) {
            case SetType::Append:
                $this->elements->push($title);
                break;
            case SetType::Prepend:
                $this->elements->prepend($title);
                break;
            case SetType::Set:
                $this->elements = new Collection;
                $this->elements->push($title);
                break;
            default:
                throw new InvalidArgumentException;
        }

        return $this;
    }

    public function append(string $title): self
    {
        return $this->setElement($title);
    }

    public function prepend(string $title): self
    {
        return $this->setElement($title, SetType::Prepend);
    }

    public function set(string $title): self
    {
        return $this->setElement($title, SetType::Set);
    }

    public function __toString(): string
    {
        return ($this->renderer)();
    }
}

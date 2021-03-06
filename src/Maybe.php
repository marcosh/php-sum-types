<?php

declare(strict_types=1);

namespace Marcosh\SumType;

final class Maybe
{
    /**
     * @var bool
     */
    private $isJust;

    /**
     * @var mixed|null
     */
    private $value;

    /**
     * Maybe constructor.
     *
     * @param bool $isJust
     * @param mixed|null $value
     */
    private function __construct(bool $isJust, $value = null)
    {
        $this->isJust = $isJust;
        $this->value = $value;
    }

    /**
     * Just constructor
     *
     * @param mixed $a
     * @return Maybe
     */
    public static function just($a) : self
    {
        return new self(true, $a);
    }

    /**
     * Nothing constructor
     *
     * @return Maybe
     */
    public static function nothing() : self
    {
        return new self(false);
    }

    /**
     * Pattern matching function
     *
     * @param callable $just
     * @param callable $nothing
     * @return mixed
     */
    public function match(
        callable $just,
        callable $nothing
    ) {
        return $this->isJust ? $just($this->value) : $nothing();
    }

    public function isJust() : bool
    {
        return $this->isJust;
    }

    public function isNothing() : bool
    {
        return !$this->isJust;
    }

    /**
     * @return mixed
     */
    public function withDefault($default)
    {
        return $this->isJust ? $this->value : $default;
    }

    /**
     * @return mixed
     */
    public function map(callable $f)
    {
        return $this->isJust ? self::just($f($this->value)) : self::nothing();
    }

    /**
     * @param callable $f
     * @param mixed $default
     * @return $mixed
     */
    public function mapWithDefault(callable $f, $default)
    {
        return $this->isJust ? $f($this->value) : $default;
    }
}

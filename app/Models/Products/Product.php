<?php

namespace App\Models\Products;

/**
 * Курица
 */
abstract class Product
{
    protected string $name;
    protected int $count;

    public function __construct(string $name, int $count)
    {
        $this->name = $name;
        $this->count = $count;
    }

    public function getName(): string
    {
        return $this->name;
    }
    public function getCount(): int
    {
        return $this->count;
    }
}

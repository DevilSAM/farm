<?php

namespace App\Models\Products;

/**
 * Курица
 */
class Milk extends Product
{
    public function __construct(int $count)
    {
        parent::__construct('Молоко', $count);
    }
}

<?php

namespace App\Models\Products;

/**
 * Курица
 */
class Egg extends Product
{
    public function __construct(int $count)
    {
        parent::__construct('Яйцо', $count);
    }
}

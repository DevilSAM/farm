<?php

namespace App\Interfaces;

use App\Models\Product;

interface IAnimal
{
    /**
     * @return Product
     */
    public function produceProduct(): Product;
}

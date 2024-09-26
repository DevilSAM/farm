<?php

namespace App\Interfaces;

use App\Models\Products\Product;

interface IAnimal
{
    /**
     * @return Product
     */
    public function produceProduct(): Product;
}

<?php

namespace App\Interfaces;


interface IAnimal
{
    /**
     * @return array{product_type: string, product_value: int}
     */
    public function produceFood(): array;
}

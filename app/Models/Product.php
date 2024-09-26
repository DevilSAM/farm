<?php

namespace App\Models;

use App\Interfaces\IAnimal;
use App\Interfaces\ITranslator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Курица
 */
class Product
{
    private string $name;
    private int $count;

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

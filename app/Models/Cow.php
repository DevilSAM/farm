<?php

namespace App\Models;

use App\Interfaces\IAnimal;
use App\Interfaces\ITranslator;
use App\Models\Products\Milk;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Корова
 */
class Cow extends Model implements IAnimal, ITranslator
{
    use HasFactory;

    const MIN_MILK_VALUE = 8;
    const MAX_MILK_VALUE = 12;

    public function produceProduct(): Milk
    {
        return new Milk(rand(self::MIN_MILK_VALUE, self::MAX_MILK_VALUE));
    }

    public function getRusName(): string
    {
        return 'Корова';
    }
}

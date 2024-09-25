<?php

namespace App\Models;

use App\Interfaces\IAnimal;
use App\Interfaces\ITranslator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Курица
 */
class Hen extends Model implements IAnimal, ITranslator
{
    use HasFactory;

    const MIN_EGG_VALUE = 8;
    const MAX_EGG_VALUE = 12;

    public function produceFood(): array
    {
        return [
            'product_type' => 'Яйцо',
            'product_value' => rand(self::MIN_EGG_VALUE, self::MAX_EGG_VALUE)
        ];
    }
    public function getRusName(): string
    {
        return 'Курица';
    }
}

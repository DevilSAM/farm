<?php

namespace App\Models;

class Printer
{
    public static function printArray(array $array, string $title = ''): void
    {
        if ($title) {
            echo "$title \n";
        }

        foreach($array as $key => $val) {
            echo "$key: $val\n";
        }

        echo "\n";
    }
}

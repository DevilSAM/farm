<?php

namespace App\Models;

use App\Interfaces\IAnimal;

class Farm
{
    private int $animalId = 0;
    private array $animals = [];
    private array $collected_products = [];

    /**
     * Добавление животных в систему поштучно
     * @param IAnimal $animal
     * @return void
     */
    public function registerAnimal(IAnimal $animal): void
    {
        $this->animalId++;
        $this->animals[$this->animalId] = $animal;
    }

    /**
     * Вывод на экран данных по собранным продуктам
     * @return void
     */
    public function printCollectedProductsAmount(): void
    {
        Printer::printArray($this->collected_products, 'Собрано продуктов:');
    }

    /**
     * Обнуление информации о собранных продуктах
     * @return void
     */
    public function clearProductsRecords(): void
    {
        $this->collected_products = [];
    }

    /**
     * Собираем все виды продуктов у наших животных
     * @return void
     */
    public function collectAllProducts(): void
    {
        foreach ($this->animals as $id => $animal) {
            $food = $animal->produceFood();
            $this->addProduct($food['product_type'], $food['product_value']);
        }
    }

    /**
     * Сохраняем информацию о собранных продуктах на ферме в текущем периоде
     * @param string $product_type
     * @param int $product_value
     * @return void
     */
    private function addProduct(string $product_type, int $product_value): void
    {
        if (isset($this->collected_products[$product_type])) {
            $this->collected_products[$product_type] += $product_value;
        } else {
            $this->collected_products[$product_type] = $product_value;
        }
    }

    /**
     * Подсчитать всех животных по видам и вывести на экран
     * @return void
     */
    public function showAnimalsCount(): void
    {
        $counts = [];
        foreach ($this->animals as $animal) {
            $name = $animal->getRusName();
            if (!isset($counts[$name])) {
                $counts[$name] = 0;
            }
            $counts[$name]++;
        }
        Printer::printArray($counts, 'Всего животных:');
    }
}

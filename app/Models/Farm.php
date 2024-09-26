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
    private function collectAllProducts(): void
    {
        foreach ($this->animals as $animal) {
            $product = $animal->produceProduct();
            $this->addProduct($product);
        }
    }
    /**
     * Запуск сбора продуктов сразу несколько раз
     * @param int $times
     * @return void
     */
    public function multipleCollect(int $times): void
    {
        for($i = 0; $i < $times; $i++) {
            $this->collectAllProducts();
        }
    }

    /**
     * Сохраняем информацию о собранных продуктах на ферме в текущем периоде
     * @param Product $product
     * @return void
     */
    private function addProduct(Product $product): void
    {
        if (isset($this->collected_products[$product->getName()])) {
            $this->collected_products[$product->getName()] += $product->getCount();
        } else {
            $this->collected_products[$product->getName()] = $product->getCount();
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

    /**
     * Поход на рынок
     * @return void
     */
    public function goToTheMarket(): void
    {
        $hens = Hen::factory(5)->make();
        $cows = Cow::factory(1)->make();
        // приводим их на нашу ферму и всем присваиваем уникальный номер (регистрируем на ферме)
        $cows->each(fn(Cow $cow) => $this->registerAnimal($cow));
        $hens->each(fn(Hen $hen) => $this->registerAnimal($hen));
    }
}

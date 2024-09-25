<?php

namespace App\Console\Commands;

use App\Models\Cow;
use App\Models\Farm;
use App\Models\Hen;
use Illuminate\Console\Command;

class FarmLife extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'farm:life';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Begin farm`s life';

    public function handle()
    {
        // инициализация фермы
        $farm = new Farm();

        // создаем 10 коров и 20 кур
        $cows = Cow::factory(10)->make();
        $hens = Hen::factory(20)->make();

        // приводим их на нашу ферму и всем присваиваем уникальный номер (регистрируем на ферме)
        $cows->each(fn(Cow $cow) => $farm->registerAnimal($cow));
        $hens->each(fn(Hen $hen) => $farm->registerAnimal($hen));

        // - Вывести на экран информацию о количестве каждого типа животных на ферме.
        $farm->showAnimalsCount();

        // - 7 раз (неделю) произвести сбор продукции (подоить коров и собрать яйца у кур).
        $this->weeklyCollectProducts($farm);

        // - Вывести на экран общее кол-во собранной за неделю продукции каждого типа.
        $farm->printCollectedProductsAmount();
        // обнуляем записи, после того, как подвели недельные итоги
        $farm->clearProductsRecords();

        // - Добавить на ферму ещё 5 кур и 1 корову (съездили на рынок, купили животных).
        $this->goToTheMarket($farm);

        // - Снова вывести информацию о количестве каждого типа животных на ферме.
        $farm->showAnimalsCount();

        // - Снова 7 раз (неделю) производим сбор продукции и выводим результат на экран.
        $this->weeklyCollectProducts($farm);

        // и распечатаем результаты еще раз
        $farm->printCollectedProductsAmount();
    }

    private function weeklyCollectProducts($farm)
    {
        for($i=0; $i<7; $i++) {
            $farm->collectAllProducts();
        }
    }

    private function goToTheMarket($farm): void
    {
        $hens = Hen::factory(5)->make();
        $cows = Cow::factory(1)->make();
        // приводим их на нашу ферму и всем присваиваем уникальный номер (регистрируем на ферме)
        $cows->each(fn(Cow $cow) => $farm->registerAnimal($cow));
        $hens->each(fn(Hen $hen) => $farm->registerAnimal($hen));
    }

}

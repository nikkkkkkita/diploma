<?php

namespace Database\Seeders;

use App\Models\Aroma;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AromaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $aromas = [
            ['name' => 'Шоколад'],
            ['name' => 'Ваниль'],
            ['name' => 'Кофе'],
            ['name' => 'Фрукты'],
            ['name' => 'Цветочный'],
            ['name' => 'Древесный'],
            ['name' => 'Морской'],
            ['name' => 'Цитрусовый'],
            ['name' => 'Мятный'],
            ['name' => 'Пряный'],
            ['name' => 'Лаванда'],
            ['name' => 'Мед'],
            ['name' => 'Травы'],
            ['name' => 'Мускус'],
            ['name' => 'Карамель'],
            ['name' => 'Кожа'],
            ['name' => 'Малина'],
            ['name' => 'Черника'],
            ['name' => 'Апельсин'],
            ['name' => 'Лимон'],
        ];

        foreach ($aromas as $aroma) {
            Aroma::create($aroma);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\SocialType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SocialTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SocialType::create(['type' => 'vk', 'name' => 'ВКонтакте']);
        SocialType::create(['type' => 'tg', 'name' => 'Телеграм']);
    }
}

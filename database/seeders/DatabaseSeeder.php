<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\SocialLink;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        SocialLink::create(['shop_id' => 2, 'social_type_id' => 5, 'link' => 'dsafkds;fsd']);
        SocialLink::create(['shop_id' => 2, 'social_type_id' => 5, 'link' => 'dsafkds;fsd']);
        SocialLink::create(['shop_id' => 2, 'social_type_id' => 5, 'link' => 'dsafkds;fsd']);
        SocialLink::create(['shop_id' => 2, 'social_type_id' => 5, 'link' => 'dsafkds;fsd']);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}

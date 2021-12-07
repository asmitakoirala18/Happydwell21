<?php

namespace Database\Seeders;

use App\Models\ServiceType;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->call([
            SuperAdminTableSeeder::class,
            SellerTableSeeder::class,
            BuyerTableSeeder::class,
            PropertyTableSeeder::class,
            SettingTableSeeder::class,
            BlogTableSeeder::class,
            AboutTableSeeder::class,
            ServiceTypesSeeder::class,
        ]);
    }
}

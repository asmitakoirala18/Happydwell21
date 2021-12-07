<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Buyer;
use Illuminate\Support\Carbon;

class BuyerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Buyer::create([
            'name' => 'buyer',
            'username' => 'buyer',
            'email' => 'laravel3pm@gmail.com',
            'password' => bcrypt('buyer002'),
            'gender' => 'male',
            'email_verification' => Carbon::now(),
            'image' => 'buyer.png',
            'status' => 1
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Seller;
use Illuminate\Support\Carbon;

class SellerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Seller::create(
            [
                'name' => 'seller',
                'username' => 'seller',
                'email' => 'ram@gmail.com',
                'password' => bcrypt('seller002'),
                'gender' => 'male',
                'phone' => '01987987',
                'mobile' => '987987',
                'seller_verify' => 1,
                'image' => 'seller.jpg',
                'status' => 1
            ]);
    }
}

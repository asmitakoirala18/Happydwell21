<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $settingData = [
            'company_name' => 'Happy Dwell Real Estate',
            'company_email' => 'example@gmail.com',
            'company_phone' => '+12987987687',
            'company_mobile' => '+98987345433',
            'company_logo' => 'real-estate-logo.png',
            'description' => 'Welcome to Happy Dwell real estate ',
        ];

        Setting::create($settingData);
    }
}

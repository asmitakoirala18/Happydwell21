<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SuperAdmin;

class SuperAdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminData = [
            [
                'name' => 'admin',
                'username' => 'admin',
                'email' => 'laravel3pm@gmail.com',
                'password' => bcrypt('admin002'),
                'gender' => 'male',
                'user_type' => 'admin',
                'image' => 'admin.png',
                'status' => 1
            ],
            [
                'name' => 'ram',
                'username' => 'ram',
                'email' => 'ram@gmail.com',
                'password' => bcrypt('ram002'),
                'gender' => 'male',
                'image' => 'admin.png',
                'user_type' => 'admin',
                'status' => 1
            ]
        ];

        foreach ($adminData as $admin) {
            SuperAdmin::create($admin);
        }
    }
}

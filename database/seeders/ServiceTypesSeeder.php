<?php

namespace Database\Seeders;

use App\Models\ServiceType;
use Illuminate\Database\Seeder;

class ServiceTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $typesData = [
            [
                'type' => 'rennovate options',
                'slug' => 'rennovate-options',
                'description' => "Sed porttitor lectus nibh. Cras ultricies ligula sed magna dictum porta. Praesent
                sapien massa, convallis a pellentesque nec, egestas non nisi."

            ],
            [
                'type' => 'loans ideas',
                'slug' => 'loans-ideas',
                'description' => "Nulla porttitor accumsan tincidunt. Curabitur aliquet quam id dui posuere blandit.
                Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a."

            ],
            [
                'type' => 'investment on real',
                'slug' => 'investment-on-real',
                'description' => "Sed porttitor lectus nibh. Cras ultricies ligula sed magna dictum porta. Praesent
                sapien massa, convallis a pellentesque nec, egestas non nisi."

            ]
        ];

        foreach ($typesData as $types) {
            ServiceType::create($types);
        }
    }
}

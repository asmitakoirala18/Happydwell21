<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use App\Models\Property;

class PropertyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $propertyData = [
            [
                'types' => 'sale',
                'country' => 'USA',
                'state_name' => 'TX',
                'city_name' => 'Houstan',
                'zip_code' => '77018',
                'title' => 'demo house',
                'slug' => 'demo-house',
                'price' => 729000,
                'build_date' => Carbon::now(),
                'bedrooms' => 4,
                'garages' => 1,
                'bathrooms' => 3,
                'area' => 200,
                'image' => '',
                'is_slider' => 1,
                'is_verify' => 1,
                'summary' => 'Welcome to this amazing Oak Forest home! With great
                 curb appeal, there is a new carport, driveway,
 sidewalk & large front patio to enjoy w great neighbors! Spacious entryway',

                'description' => "Welcome to this amazing Oak Forest home! With great curb appeal, there is a new carport, driveway,
 sidewalk & large front patio to enjoy w great neighbors! Spacious entryway & formal dining w view of the front yard.
    Kitchen has new two toned cabinetry, undermount lighting, SS appliances, quartz countertops, walk-in pantry, breakfast
bar w lantern lighting, subway tile & accent backsplash behind the stove. Large living room leads to full bath downstairs w
fun tile & the HUGE bonus room upstairs. The primary bedroom in features high ceilings & a big walk-in closet! Primary bath has two sinks,
quartz countertops, new cabinetry with ample storage, freestanding tub & separate shower with colorful accent tile.
    Third bath in hallway has accent tile, too. Backyard has new fence, large patio partially covered w storage shed & green space for kids and/or pets!
    New windows, new plumbing, new electrical, new HVAC, new water heater, foundation work with lifetime warranty, new fence & 5 yr old roof!"
            ]
        ];

        foreach ($propertyData as $property) {
            Property::create($property);
        }


    }
}

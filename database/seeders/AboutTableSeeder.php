<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use App\Models\About;

class AboutTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $aboutData = [
            [
                'title' => 'About US',
                'slug' => 'aboutpus',
                'date' => Carbon::now(),
                'status' => 1,
                'meta_keywords' => 'property,home property',
                'meta_description' => 'hello description',
                'summary' => 'this is demo',
                'description' => "
                Welcome to this amazing Oak Forest home! With great curb appeal, there is a new carport, driveway,
 sidewalk & large front patio to enjoy w great neighbors! Spacious entryway & formal dining w view of the front yard.
    Kitchen has new two toned cabinetry, undermount lighting, SS appliances, quartz countertops, walk-in pantry, breakfast
bar w lantern lighting, subway tile & accent backsplash behind the stove. Large living room leads to full bath downstairs w
fun tile & the HUGE bonus room upstairs. The primary bedroom in features high ceilings & a big walk-in closet! Primary bath has two sinks,
quartz countertops, new cabinetry with ample storage, freestanding tub & separate shower with colorful accent tile.
    Third bath in hallway has accent tile, too. Backyard has new fence, large patio partially covered w storage shed & green space for kids and/or pets!
    New windows, new plumbing, new electrical, new HVAC, new water heater, foundation work with lifetime warranty, new fence & 5 yr old roof!"

                ,
                'image' => '',
                'posted_by' => 1

            ]
        ];

        foreach ($aboutData as $about) {
            About::create($about);
        }
    }
}

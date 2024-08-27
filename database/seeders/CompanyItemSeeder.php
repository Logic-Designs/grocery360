<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\CompanyItem;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CompanyItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $itemTypes = ['latest', 'new_launch', 'product'];

        // Get all companies
        $companies = Company::all();

        $descrption = '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non massa quis magna finibus consectetur. Suspendisse in blandit nibh, vel commodo ex. Maecenas auctor ullamcorper risus, dignissim rhoncus purus laoreet nec. Nullam iaculis, nunc vitae condimentum maximus, est metus rutrum nisl, vitae laoreet lectus leo non massa. Fusce fermentum molestie enim vehicula gravida. Nam efficitur mollis elementum. Pellentesque magna est, facilisis nec semper a, lacinia ac leo. Maecenas tristique orci vitae eros vehicula, et efficitur magna accumsan. Vestibulum felis quam, eleifend aliquet massa sed, lobortis ornare ligula. Ut purus felis, accumsan non ipsum non, gravida cursus leo. Duis congue dignissim est non molestie. In eget leo sed diam rhoncus posuere tempus lobortis lacus. Ut mattis ullamcorper aliquet. Vestibulum magna urna, rhoncus in laoreet et, sollicitudin ac tellus. Phasellus euismod erat at justo lobortis, sit amet rutrum ipsum faucibus. Etiam nec tincidunt massa.</p>';


        foreach ($companies as $company) {
            foreach ($itemTypes as $type) {
                for ($i = 1; $i <= 5; $i++) {
                    CompanyItem::create([
                        'company_id' => $company->id,
                        'type' => $type,
                        'title' => $type . ' Item ' . $i . ' for Company ' . $company->id,
                        'description' => 'Description for ' . $type . ' item ' . $i . ' of Company ' . $company->id .' ' . $descrption,
                        'image' => 'images/seeder/photo (' . rand(1, 18) . ').jpg', // Same random image logic
                    ]);
                }
            }
        }
    }
}

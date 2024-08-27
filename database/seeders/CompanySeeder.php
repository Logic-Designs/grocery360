<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\CompanyCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Get all category IDs to randomly assign to companies
        $categoryIds = CompanyCategory::pluck('id')->toArray();

        $descrption = '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non massa quis magna finibus consectetur. Suspendisse in blandit nibh, vel commodo ex. Maecenas auctor ullamcorper risus, dignissim rhoncus purus laoreet nec. Nullam iaculis, nunc vitae condimentum maximus, est metus rutrum nisl, vitae laoreet lectus leo non massa. Fusce fermentum molestie enim vehicula gravida. Nam efficitur mollis elementum. Pellentesque magna est, facilisis nec semper a, lacinia ac leo. Maecenas tristique orci vitae eros vehicula, et efficitur magna accumsan. Vestibulum felis quam, eleifend aliquet massa sed, lobortis ornare ligula. Ut purus felis, accumsan non ipsum non, gravida cursus leo. Duis congue dignissim est non molestie. In eget leo sed diam rhoncus posuere tempus lobortis lacus. Ut mattis ullamcorper aliquet. Vestibulum magna urna, rhoncus in laoreet et, sollicitudin ac tellus. Phasellus euismod erat at justo lobortis, sit amet rutrum ipsum faucibus. Etiam nec tincidunt massa.</p>';

        for ($i = 1; $i <= 40; $i++) {
            Company::create([
                'title' => 'Company ' . $i,
                'description' => 'This is a description for Company ' . $i . ' ' . $descrption,
                'category_id' => $categoryIds[array_rand($categoryIds)], // Random category
                'image' => 'images/seeder/photo (' . rand(1, 18) . ').jpg', // Random image
            ]);
        }
    }
}

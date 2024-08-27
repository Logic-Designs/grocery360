<?php

namespace Database\Seeders;

use App\Models\Supermarket;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SupermarketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Sample description text
        $description = '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non massa quis magna finibus consectetur. Suspendisse in blandit nibh, vel commodo ex. Maecenas auctor ullamcorper risus, dignissim rhoncus purus laoreet nec. Nullam iaculis, nunc vitae condimentum maximus, est metus rutrum nisl, vitae laoreet lectus leo non massa. Fusce fermentum molestie enim vehicula gravida. Nam efficitur mollis elementum. Pellentesque magna est, facilisis nec semper a, lacinia ac leo. Maecenas tristique orci vitae eros vehicula, et efficitur magna accumsan. Vestibulum felis quam, eleifend aliquet massa sed, lobortis ornare ligula. Ut purus felis, accumsan non ipsum non, gravida cursus leo. Duis congue dignissim est non molestie. In eget leo sed diam rhoncus posuere tempus lobortis lacus. Ut mattis ullamcorper aliquet. Vestibulum magna urna, rhoncus in laoreet et, sollicitudin ac tellus. Phasellus euismod erat at justo lobortis, sit amet rutrum ipsum faucibus. Etiam nec tincidunt massa.</p>';

        // Generate 30 supermarkets
        for ($i = 1; $i <= 30; $i++) {
            Supermarket::create([
                'name' => 'Supermarket ' . $i,
                'description' => $description, // Using a predefined description
                'logo' => 'images/seeder/photo (' . rand(1, 18) . ').jpg', // Random logo path
                'image' => 'images/seeder/photo (' . rand(1, 18) . ').jpg', // Random image path
                'pdf' => 'pdfs/seeder/PorshtalProposal (1).pdf', // Random PDF path
                'address' => '123 Main St, City ' . $i,
                'map' => 'https://maps.example.com/' . Str::random(10), // Random map URL
            ]);
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Podcast;

class PodcastSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Podcast::factory()->times(50)->create();
    }
}

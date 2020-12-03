<?php

use Illuminate\Database\Seeder;
use App\Models\Anime;

class AnimesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 50; $i++) {
            Anime::create([
                'user_id' => 11,
                'title' => 'おすすめアニメ' . $i,
                'text' => '私のおすすめアニメ' .$i . 'です',
                'status' => '見てる',
                'recommend' => 4,
                'anime_image'  => null,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}

<?php

use Illuminate\Database\Seeder;

class BannersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        $banners =[
            'О нас',
            'Преимущества',
            'Обратная связь',

        ];

        foreach ($banners as $item){
            $banner = \App\Models\Banner::create([
                'title' => $item,
            ]);
        }
    }
}

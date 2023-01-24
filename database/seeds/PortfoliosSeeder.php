<?php

use App\Models\Portfolio;
use Illuminate\Database\Seeder;

class PortfoliosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('ru_RU');
        for ($i = 0; $i < 10; $i++) {
            $portfolio = Portfolio::create([
                'slug' => $faker->slug,
            ]);

            //$portfolio->addMediaFromUrl($faker->imageUrl(105, 55))->toMediaCollection('portfolio');

            foreach (config('app.locales') as $locale) {
                $portfolio->translates()->create([
                    'lang' => $locale,
                    'title' => ucfirst($faker->sentence),
                    'content' => [
                        'body' => '<p>' . implode('</p><p>', $faker->sentences(rand(3, 10))) . '</p>',
                        'address' => ucfirst($faker->sentence),
                    ]
                ]);
            }

            /*$portfolio->addMediaFromUrl($faker->imageUrl(1920, 900))
                ->toMediaCollection('uploads');*/

        }
    }
}

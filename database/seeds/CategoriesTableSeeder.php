<?php

use App\Models\Category;
use Illuminate\Database\Seeder;
use Spatie\MediaLibrary\Exceptions\FileCannotBeAdded;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws FileCannotBeAdded
     */
    public function run()
    {
        $faker = Faker\Factory::create('ru_RU');

        for ($i = 0; $i < 3; $i++) {
            $category = Category::create([
                'slug' => $faker->slug
            ]);

            //$category->addMediaFromUrl($faker->imageUrl(1920, 900))->toMediaCollection('category');

            foreach (config('app.locales') as $locale) {
                $category->translates()->create([
                    'lang' => $locale,
                    'title' => ucfirst($faker->sentence),
                    'content' => [
                        'body' => '<p>'.implode('</p><p>', $faker->sentences(rand(3, 10))).'</p>'
                    ]
                ]);
            }
        }
    }

}

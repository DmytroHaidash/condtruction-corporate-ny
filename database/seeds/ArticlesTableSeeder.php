<?php

use App\Models\Article;
use Illuminate\Database\Seeder;
use Spatie\MediaLibrary\Exceptions\FileCannotBeAdded;

class ArticlesTableSeeder extends Seeder
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
        for ($i = 0; $i < 20; $i++) {
            $article = Article::create([
                'slug' => $faker->slug,
                'category_id' => rand(1, 3),
            ]);

            //$article->addMediaFromUrl($faker->imageUrl(1920, 900))->toMediaCollection('article');

            foreach (config('app.locales') as $locale) {
                $article->translates()->create([
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

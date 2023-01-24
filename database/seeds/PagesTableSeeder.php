<?php

use Illuminate\Database\Seeder;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('ru_RU');

        $page = \App\Models\Page::create(['slug' => 'about']);
        foreach (config('app.locales') as $locale) {
            $page->translates()->create([
                'lang' => $locale,
                'title' => ucfirst($faker->sentence),
                'content' => [
                    'body' => '<p>' . implode('</p><p>', $faker->sentences(rand(3, 10))) . '</p>'
                ]
            ]);
        }
    }
}

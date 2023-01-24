<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('ru_RU');

        $setting = \App\Models\Setting::create([
            'phone' => '+308 (099) 123 45 67',
            'phone_additional' => null,
            'email' => 'sensar@gmail.com',
            'facebook' => 'https://www.facebook.com/',
            'instagram' => 'https://www.instagram.com/',
            'twitter' => 'https://www.twitter.com/',
            'latitude' => '30.510974',
            'longitude' => '50.449998'

        ]);

        foreach (config('app.locales') as $locale) {
            $setting->translates()->create([
                'lang' => $locale,
                'title' => ucfirst($faker->sentence),
                'content' => [
                    'description' => ucfirst($faker->sentence),
                    'address' => 'г. Киев'
                ]
            ]);
        }
    }
}

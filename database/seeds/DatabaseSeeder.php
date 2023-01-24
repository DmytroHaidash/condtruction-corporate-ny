<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call([
             UsersTableSeeder::class,
             CategoriesTableSeeder::class,
             SettingsTableSeeder::class,
             ArticlesTableSeeder::class,
             PagesTableSeeder::class,
             BannersTableSeeder::class,
             PortfoliosSeeder::class,
         ]);
    }
}

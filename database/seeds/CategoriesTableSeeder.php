<?php

use App\Category;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $now = Carbon::now()->toDateTimeString();

        Category::insert([
            ['name' => 'Women', 'slug' => 'women', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Men', 'slug' => 'men', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Accessory', 'slug' => 'accessory', 'created_at' => $now, 'updated_at' => $now],
        ]);

    }
}

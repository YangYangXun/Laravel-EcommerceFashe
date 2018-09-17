<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        // Items 1 - 9
        // for ($i = 1; $i <= 9; $i++) {
        //     Product::create([
        //         'name' => 'Item ' . $i,
        //         'slug' => 'item-0' . $i,
        //         'details' => 'Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat',
        //         'price' => rand(149999, 249999),
        //         'description' => 'Lorem ' . $i . ' ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
        //     ]);
        // }

        // Items 10 - 12
        // for ($i = 10; $i <= 12; $i++) {
        //     Product::create([
        //         'name' => 'Item ' . $i,
        //         'slug' => 'item-' . $i,
        //         'details' => 'Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat',
        //         'price' => rand(149999, 249999),
        //         'description' => 'Lorem ' . $i . ' ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
        //     ]);
        // }

        // Women Item 1 - 9
        for ($i = 1; $i <= 9; $i++) {
            Product::create([
                'name' => 'Women Item ' . $i,
                'slug' => 'women-0' . $i,
                'details' => 'Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat',
                'price' => rand(149999, 249999),
                'description' => 'Lorem ' . $i . ' ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
            ])->categories()->attach(1);
        }

        // Men Item 1 - 2
        for ($i = 1; $i <= 2; $i++) {
            Product::create([
                'name' => 'Men Item ' . $i,
                'slug' => 'men-0' . $i,
                'details' => 'Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat',
                'price' => rand(149999, 249999),
                'description' => 'Lorem ' . $i . ' ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
            ])->categories()->attach(2);
        }

        // Accessories Item 1 - 5
        for ($i = 1; $i <= 5; $i++) {
            Product::create([
                'name' => 'Accessory Item ' . $i,
                'slug' => 'accessory-0' . $i,
                'details' => 'Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat',
                'price' => rand(149999, 249999),
                'description' => 'Lorem ' . $i . ' ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
            ])->categories()->attach(3);
        }

    }
}

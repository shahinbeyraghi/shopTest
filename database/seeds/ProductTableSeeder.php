<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Products::class, 20)->create()->each(function ($product) {
        $price = factory(App\ProductsPrice::class, 5)->make();
        $product->price()->saveMany($price);
    });
    }
}

<?php

use Illuminate\Database\Seeder;
use App\ProductModel;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ProductModel::class, 10)->create();
    }
}

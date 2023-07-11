<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->delete();

        /*
         *  TODO: Need to create Factory
         *  Database\Factories\ProductFactory
         * */
//        Product::factory(10)->create();

        Product::create(
            array(
                'name' => 'Samsung Ultra',
                'category' => 'Phone',
                'quantity' => '23',
                'borrowed' => '5',
            )
        );

    }
}

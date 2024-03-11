<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                'name' => 'Laptop',
                'description' => 'Powerful laptop with high-performance specifications.',
                'price' => '1200',
                'quantity' => '50',
            ],
            [
                'name' => 'Smartphone',
                'description' => 'Feature-rich smartphone with advanced technology.',
                'price' => '800',
                'quantity' => '100',
            ],
            [
                'name' => 'Ultrabook',
                'description' => 'Thin and lightweight ultrabook for on-the-go productivity.',
                'price' => '1300',
                'quantity' => '20',
            ],
            // Add more products here
        ];

        // Use a loop to add 12 more sets of data
        for ($i = 4; $i <= 15; $i++) {
            $products[] = [
                'name' => 'Product ' . $i,
                'description' => 'Description for Product ' . $i,
                'price' => rand(500, 2000), // Random price between 500 and 2000
                'quantity' => rand(10, 100), // Random quantity between 10 and 100
            ];
        }

        // Insert all products into the database
        DB::table('products')->insert($products);
    }
}

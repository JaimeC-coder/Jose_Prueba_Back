<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Laptop',
                'precio' => 999.99,
                'cantidad' => 50,
            ],
            [
                'name' => 'Smartphone',
                'precio' => 599.99,
                'cantidad' => 100,
            ],
            [
                'name' => 'Headphones',
                'precio' => 99.99,
                'cantidad' => 200,
            ],
            [
                'name' => 'Tablet',
                'precio' => 299.99,
                'cantidad' => 75,
            ],
            [
                'name' => 'Smart Watch',
                'precio' => 199.99,
                'cantidad' => 150,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}

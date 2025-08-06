<?php

namespace Database\Seeders;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create(
            [
                'name' => 'laptop',
                'price' => '18000',
                'image_path' => 'img/laptop.jpg'
            ]
        );
        Product::create(
            [
                'name' => 'Camera Canon 7500D',
                'price' => '8000',
                'image_path' => 'img/canon.jpeg'
            ]
        );
        Product::create(
            [
                'name' => 'iPhone 13',
                'price' => '12000',
                'image_path' => 'img/mobile.jpg'
            ]
        );
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Créer quelques catégories factices
        $category1 = Category::firstOrCreate(['name' => 'Electronics', 'slug' => 'electronics']);
        $category2 = Category::firstOrCreate(['name' => 'Fashion', 'slug' => 'fashion']);

        // Créer des produits factices
        Product::create([
            'category_id' => $category1->id,
            'name' => 'Smartphone X',
            'slug' => 'smartphone-x',
            'description' => 'Un smartphone haut de gamme avec un écran OLED.',
            'price' => 499.99,
            'stock' => 10,
            'image' => 'products/01.png', // mets l’image dans storage/app/public/products/
        ]);

        Product::create([
            'category_id' => $category2->id,
            'name' => 'Chaussures Sport',
            'slug' => 'chaussures-sport',
            'description' => 'Chaussures confortables pour le sport et les loisirs.',
            'price' => 89.99,
            'stock' => 20,
            'image' => 'products/02.png',
        ]);

        Product::create([
            'category_id' => $category1->id,
            'name' => 'Casque Audio',
            'slug' => 'casque-audio',
            'description' => 'Casque avec réduction de bruit active et son cristallin.',
            'price' => 129.99,
            'stock' => 15,
            'image' => 'products/03.png',
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'name' => 'Rallonge connectée',
                'price' => 25000,
                'category_id' => 1,
                'description' => "Le Smart 4 Plug Extension Lead est une multiprise connectable qui vous permet de contrôler vos appareils à distance via une application mobile et une connexion internet.",
                'slug' => Str::slug('Rallonge connectée'),
                'image' => 'articles/maison1.jpeg',
            ],
            [
                'name' => 'Power bank',
                'price' => 12500,
                'category_id' => 1,
                'description' => "L’ACADAPTER est une batterie rechargeable conçue pour alimenter les routeurs ou caméras en cas d’absence de courant.",
                'slug' => Str::slug('Power bank'),
                'image' => 'articles/maison2.jpeg',
            ],
            [
                'name' => 'Prises connectées',
                'price' => 14900,
                'category_id' => 1,
                'description' => "Le Smart Plug est une prise connectée permettant de contrôler vos appareils à distance via une application.",
                'slug' => Str::slug('Prises connectées'),
                'image' => 'articles/maison3.jpeg',
            ],
            [
                'name' => 'Interrupteurs connectés',
                'price' => 18900,
                'category_id' => 1,
                'description' => "Le Smart Module est un interrupteur intelligent permettant de gérer vos lumières depuis votre téléphone.",
                'slug' => Str::slug('Interrupteurs connectés'),
                'image' => 'articles/maison4.jpeg',
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}

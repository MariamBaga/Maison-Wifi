<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Rallonge connectée',
                'price' => 25000,
                'category_id' => 1, // Assure-toi que la catégorie Smart a l'id 1
                'description' => "Le Smart 4 Plug Extension. Lead est une multiprise connectable qui vous permet de contrôler vos appareils électroniques à la maison ou au bureau à distance avec votre téléphone ou tablette et une bonne connexion internet. Il dispose également d’une fonction commande vocale et le contrôle de vos consommations en énergie.",
                'slug' => Str::slug('Rallonge connectée'),
                'image' => 'products/maison1.jpeg',
            ],
            [
                'name' => 'Power bank',
                'price' => 12500,
                'category_id' => 1,
                'description' => "L’ACADAPTER, encore appelé batterie de secours pour routeur est une batterie elle-même rechargeable, conçue pour alimenter les routeurs ou caméras de vidéosurveillance en cas d’absence de courant.",
                'slug' => Str::slug('Power bank'),
                'image' => 'products/maison2.jpeg',
            ],
            [
                'name' => 'Prises connectées',
                'price' => 14900,
                'category_id' => 1,
                'description' => "Le Smart Plug est une prise unique connectable qui vous permet de contrôler vos appareils électroniques à la maison ou au bureau à distance avec votre téléphone ou tablette et une bonne connexion internet.",
                'slug' => Str::slug('Prises connectées'),
                'image' => 'products/maison3.jpeg',
            ],
            [
                'name' => 'Interrupteurs connectés',
                'price' => 18900,
                'category_id' => 1,
                'description' => "Le Smart Module est un interrupteur intelligent connectable, compacte qui se connecte facilement à presque tous les tableaux électriques. Il vous permet d’allumer et éteindre n’importe quelle lumière ou appareil électronique avec votre téléphone.",
                'slug' => Str::slug('Interrupteurs connectés'),
                'image' => 'products/maison4.jpeg',
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}

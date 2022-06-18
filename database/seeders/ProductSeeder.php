<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Product::truncate();
        Schema::enableForeignKeyConstraints();

        $products = [
            [

                'name' => 'Hamburger',
                'description' => 'Sauce ketchup-moutarde, oignons, cornichons et steak haché.',
                'poster_url' => 'hamburger.png',
                'price' => 7.95,
                'category_id' => 1,
                'status' => 1,
                'allergene' => 'Lait, Oeufs, Gluten (blé) ',


            ],
            [

                'name' => 'Cheeseburger ',
                'description' => 'Sauce ketchup-moutarde, oignons, cornichons, steak haché et cheddar.',
                'poster_url' => 'Cheeseburger.jpg',
                'price' => 7.95,
                'category_id' => 1,
                'status' => 1,
                'allergene' => 'Lait, Oeufs,moutarde, Gluten (blé) ',

            ],
            [

                'name' => 'Double cheese  ',
                'description' => 'Sauce ketchup-moutarde, oignons, double steak haché et double cheddar.',
                'poster_url' => 'Double_cheese.jpg',
                'price' => 7.95,
                'category_id' => 1,
                'status' => 1,
                'allergene' => 'Lait, Oeufs, Gluten (blé) ',
                
            ],
            [

                'name' => 'Chicken burger  ',
                'description' => 'Sauce ketchup-moutarde, oignons, cornichons, double steak haché et double cheddar.',
                'poster_url' => 'Chicken burger.jpg',
                'price' => 7.95,
                'category_id' => 1,
                'status' => 1,
                'allergene' => 'Lait, Oeufs, Gluten (blé) ',

            ],
            [

                'name' => 'Fish burger  ',
                'description' => 'Sauce mayonnaise, salade, tomate et steak de poulet.',
                'poster_url' => 'Fish burger.jpg',
                'price' => 7.95,
                'category_id' => 1,
                'status' => 1,
                'allergene' => 'Lait, Oeufs, Gluten (blé) ',

            ],
            [

                'name' => 'Suprême ',
                'description' => 'Burger cheddar, laitue, tomate et saucemayonnaise.',
                'poster_url' => 'supreme.png',
                'price' => 8.95,
                'category_id' => 1,
                'status' => 1,
                'allergene' => 'Lait, Oeufs, Gluten (blé) ',

            ],

            //MENU BURGER

            [

                'name' => 'Menu classique ',
                'description' => "Burger classique, tomate et sauce, une boisson avec frites de patates douces ou salade d'accompagnement.",
                'poster_url' => 'menu_burger1.jpg',
                'price' => 12.95,
                'category_id' => 1,
                'status' => 1,
                'allergene' => 'Lait, Oeufs, Gluten (blé) ',

            ],
            [

                'name' => 'Menu Mexicain',
                'description' => "Burger avec nachos,cheddar, laitue, sauce tomate et salsa, une boisson avec frites de patates douces.",
                'poster_url' => 'menu_burger2.jpg',
                'price' => 12.95,
                'category_id' => 1,
                'status' => 1,
                'allergene' => 'Lait, Oeufs, Gluten (blé) ',

            ],
            [

                'name' => 'Menu Suprême ',
                'description' => "Burger avec rondelles d'oignon frites, cheddar, tomate et sauce, une boisson avec des pommes de terre.",
                'poster_url' => 'menu_burger3.jpg',
                'price' => 13.95,
                'category_id' => 1,
                'status' => 1,
                'allergene' => 'Lait, Oeufs, Gluten (blé) ',

            ],
            [

                'name' => 'Menu Oeufs Frits ',
                'description' => "Burger avec œuf au plat, cheddar, bacon (de dinde), laitue, tomate, une boisson avec des pommes de terre.",
                'poster_url' => 'menu_burger5.png',
                'price' => 13.95,
                'category_id' => 1,
                'status' => 1,
                'allergene' => 'Lait, Oeufs, Gluten (blé) ',

            ],
            [

                'name' => 'Menu cool ',
                'description' => "Burger avec rondelles d'oignon frites, cheddar, tomate et sauce, une boisson avec frites de patates douces.",
                'poster_url' => 'menu_burger3.jpg',
                'price' => 13.95,
                'category_id' => 1,
                'status' => 1,
                'allergene' => 'Lait, Oeufs, Gluten (blé) ',

            ],
            [

                'name' => 'Menu jutsu ',
                'description' => "Burger avec rondelles d'oignon frites, cheddar, tomate et sauce, une boisson avec  des pommes de terre.",
                'poster_url' => 'menu_burger3.jpg',
                'price' => 13.95,
                'category_id' => 1,
                'status' => 1,
                'allergene' => 'Lait, Oeufs, Gluten (blé) ',

            ],

            // Pizza
            [

                'name' => 'pizza American  ',
                'description' => 'Sauce tomate, mozzarella & pepperoni.',
                'poster_url' => 'american.jpg',
                'price' => 8.95,
                'category_id' => 2,
                'status' => 1,
                'allergene' => 'Lait, Oeufs, Gluten (blé) ',

            ],  [

                'name' => 'pizza Margherita ',
                'description' => 'Sauce tomate, mozzarella, extra mozzarella & origan.',
                'poster_url' => 'margherita.jpg',
                'price' => 8.95,
                'category_id' => 2,
                'status' => 1,
                'allergene' => 'Lait, Oeufs, Gluten (blé) ',

            ],  [

                'name' => 'pizza Hot & Spicy ',
                'description' => 'Sauce tomate, mozzarella & pepperoni, poulet, oignon, poivron, p...',
                'poster_url' => 'spicy.jpg',
                'price' => 8.95,
                'category_id' => 2,
                'status' => 1,
                'allergene' => 'Lait, Oeufs, Gluten (blé) ',

            ],  [

                'name' => 'Pizza BBQ Chicken & Bacon ',
                'description' => 'BBQ sauce, mozzarella, poulet grillé et bacon.',
                'poster_url' => 'bacon.jpg',
                'price' => 8.95,
                'category_id' => 2,
                'status' => 1,
                'allergene' => 'Lait, Oeufs, Gluten (blé) ',

            ],  [

                'name' => 'Pizza 4 Stagioni ',
                'description' => 'Sauce tomate, mozzarella, pepperoni, jambon, poivrons & champignons.',
                'poster_url' => 'stagioni.jpg',
                'price' => 8.95,
                'category_id' => 2,
                'status' => 1,
                'allergene' => 'Lait, Oeufs, Gluten (blé) ',

            ],

            // WRAPS

            [

                'name' => 'Wrap Poulet Croustillant   ',
                'description' => 'Wrap avec poitrine de poulet croustillante, laitue, tomate et mayonnaise.',
                'poster_url' => 'wrap1.png',
                'price' => 6.95,
                'category_id' => 3,
                'status' => 1,
                'allergene' => 'Lait, Oeufs, Gluten (blé) ',

            ],  [

                'name' => 'Wrap Poulet Croustillant BBQ',
                'description' => 'Wrap avec poitrine de poulet croustillante, laitue, tomate et sauce BBQ.',
                'poster_url' => 'wrap2.jpg',
                'price' => 6.95,
                'category_id' => 3,
                'status' => 1,
                'allergene' => 'Lait, Oeufs, Gluten (blé) ',

            ],  [

                'name' => 'Wrap Moutarde',
                'description' => 'Wrap avec poitrine de poulet croustillante, laitue, tomate et sauce moutarde.',
                'poster_url' => 'wrap3.jpg',
                'price' => 6.95,
                'category_id' => 3,
                'status' => 1,
                'allergene' => 'Lait, Oeufs, Gluten (blé) ',

            ],  [

                'name' => 'Wrap Poulet PIRI PIRI',
                'description' => 'Wrap avec poitrine de poulet croustillante, laitue, tomate et sauce PIRI PIRI.',
                'poster_url' => 'wrap5.jpg',
                'price' => 6.95,
                'category_id' => 3,
                'status' => 1,
                'allergene' => 'Lait, Oeufs, Gluten (blé) ',

            ],

            [
                'name' => 'Wrap Veggie',
                'description' => "Envelopper avec un hamburger végétarien tranché avec de la laitue, de la tomate, de l'oignon rouge et de la sauce Johnny's.",
                'poster_url' => 'wrap4.jpg',
                'price' => 6.95,
                'category_id' => 3,
                'status' => 1,
                'allergene' => 'Lait, Oeufs, Gluten (blé) ',

            ],

            // Kids Menu

            [

                'name' => 'Menu enfant classique ',
                'description' => 'Petit burger classique de 60 grammes avec laitue et tomate, une portion de frites, une boisson et une surprise.',
                'poster_url' => 'kid1.png',
                'price' => 7.95,
                'category_id' => 4,
                'status' => 1,
                'allergene' => 'Lait, Oeufs, Gluten (blé) ',

            ], 
            [

                'name' => 'Menu enfant délice ',
                'description' => 'Petit burger classique de 60 grammes avec laitue et tomate, une portion de frites, une boisson et une surprise.',
                'poster_url' => 'kid1.png',
                'price' => 7.95,
                'category_id' => 4,
                'status' => 1,
                'allergene' => 'Lait, Oeufs, Gluten (blé) ',

            ],
             [

                'name' => 'Menu enfant classique au fromage ',
                'description' => 'Petit cheese burger classique de 60 grammes avec cheddar, laitue et tomate, une portion de frites, une boisson et une surprise. ',
                'poster_url' => 'kid2.png',
                'price' => 7.95,
                'category_id' => 4,
                'status' => 1,
                'allergene' => 'Lait, Oeufs, Gluten (blé) ',

            ],  [

                'name' => 'Menu pour enfants Doigts de poulet ',
                'description' => '3 tendres doigts de poulet avec une portion de frites , une boisson et une surprise dans une box enfant. ',
                'poster_url' => 'kid3.png',
                'price' => 7.95,
                'category_id' => 4,
                'status' => 1,
                'allergene' => 'Lait, Oeufs, Gluten (blé) ',

            ],
            [

                'name' => 'Menu pour enfants ailes de poulet ',
                'description' => '3 tendres doigts de poulet avec une portion de frites , une boisson et une surprise dans une box enfant. ',
                'poster_url' => 'kid3.png',
                'price' => 7.95,
                'category_id' => 4,
                'status' => 1,
                'allergene' => 'Lait, Oeufs, Gluten (blé) ',

            ],
            [

                'name' => 'Menu pour enfants cuisse de poulet ',
                'description' => '3 tendres doigts de poulet avec une portion de frites , une boisson et une surprise dans une box enfant. ',
                'poster_url' => 'kid3.png',
                'price' => 7.95,
                'category_id' => 4,
                'status' => 1,
                'allergene' => 'Lait, Oeufs, Gluten (blé) ',

            ],


            // Wings

            [

                'name' => 'Ailes de poulet 4',
                'description' => '4 ailes de poulet croustillantes avec sauce au choix. ',
                'poster_url' => 'wings1.jpg',
                'price' => 3.95,
                'category_id' => 5,
                'status' => 1,
                'allergene' => 'Lait, Oeufs, Gluten (blé) ',

            ],  [

                'name' => 'Ailes de poulet 8 pièces ',
                'description' => '8 Ailes de Poulet croustillantes avec sauce au choix.',
                'poster_url' => 'wings2.jpg',
                'price' => 3.95,
                'category_id' => 5,
                'status' => 1,
                'allergene' => 'Lait, Oeufs, Gluten (blé) ',

            ],  [

                'name' => 'Filets de poulet 4 pièces ',
                'description' => '8 Chicken Tenders, tendres morceaux de poulet désossé avec une sauce au choix. ',
                'poster_url' => 'wings3.jpg',
                'price' => 3.95,
                'category_id' => 5,
                'status' => 1,
                'allergene' => 'Lait, Oeufs, Gluten (blé) ',

            ],

            [

                'name' => 'Filets de poulet 8 pièces ',
                'description' => '8 Chicken Tenders, tendres morceaux de poulet désossé avec une sauce au choix. ',
                'poster_url' => 'wings4.jpg',
                'price' => 3.95,
                'category_id' => 5,
                'status' => 1,
                'allergene' => 'Lait, Oeufs, Gluten (blé) ',

            ],


            [
                'name' => 'frite',
                'description' => "(400 grammes) Frites  avec une couche savoureuse",
                'poster_url' => 'frites1.jpg',
                'price' => 3.95,
                'category_id' => 5,
                'status' => 1,
                'allergene' => 'Lait, Oeufs, Gluten (blé) ',

            ],
            [
                'name' => 'Frites de patates douces ',
                'description' => "(400 grammes) Frites de patates douces avec une couche savoureuse",
                'poster_url' => 'potato1.jpg',
                'price' => 3.95,
                'category_id' => 5,
                'status' => 1,
                'allergene' => 'Lait, Oeufs, Gluten (blé) ',

            ],
            [
                'name' => 'Frites de patates douces ',
                'description' => "(400 grammes) Frites de patates douces avec une couche savoureuse",
                'poster_url' => 'potato1.jpg',
                'price' => 3.95,
                'category_id' => 5,
                'status' => 1,
                'allergene' => 'Lait, Oeufs, Gluten (blé) ',

            ],
            [
                'name' => 'Frites de patates douces ',
                'description' => "(400 grammes) Frites de patates douces avec une couche savoureuse",
                'poster_url' => 'potato1.jpg',
                'price' => 3.95,
                'category_id' => 5,
                'status' => 1,
                'allergene' => 'Lait, Oeufs, Gluten (blé) ',

            ],
            [
                'name' => 'coca',
                'description' => "",
                'poster_url' => 'coca.jpg',
                'price' => 2.95,
                'category_id' => 5,
                'status' => 1,
                'allergene' => 'Lait, Oeufs, Gluten (blé) ',

            ],
            [
                'name' => 'fanta',
                'description' => "",
                'poster_url' => 'fanta.jpg',
                'price' => 2.95,
                'category_id' => 5,
                'allergene' => 'Lait, Oeufs, Gluten (blé) ',

                'status' => 1,
            ],
            [
                'name' => 'ice tea',
                'description' => "",
                'poster_url' => 'iceTea.jpg',
                'price' => 2.95,
                'category_id' => 5,
                'status' => 1,
                'allergene' => 'Lait, Oeufs, Gluten (blé) ',

            ],
            [
                'name' => 'redBull',
                'description' => "",
                'poster_url' => 'redBull.jpg',
                'price' => 2.95,
                'category_id' => 5,
                'status' => 1,
                'allergene' => 'Lait, Oeufs, Gluten (blé) ',

            ],
            [
                'name' => 'mojito',
                'description' => "",
                'poster_url' => 'mojito.jpg',
                'price' => 2.95,
                'category_id' => 5,
                'status' => 1,
                'allergene' => 'Lait, Oeufs, Gluten (blé) ',

            ],
            [
                'name' => 'mayonnaise',
                'description' => "",
                'poster_url' => 'mayo.jpg',
                'price' => 0.85,
                'category_id' => 5,
                'status' => 1,
                'allergene' => 'Lait, Oeufs, Gluten (blé) ',

            ],
            [
                'name' => 'ketchup',
                'description' => "",
                'poster_url' => 'ketchup.jpg',
                'price' => 0.85,
                'allergene' => 'Lait, Oeufs, Gluten (blé) ',

                'category_id' => 5,
                'status' => 1,
            ],
            [
                'name' => 'barbecue',
                'description' => "",
                'poster_url' => 'barbecue.jpg',
                'price' => 0.85,
                'category_id' => 5,
                'status' => 1,
                'allergene' => 'Lait, Oeufs, Gluten (blé) ',

            ],
            [
                'name' => 'piri piri',
                'description' => "",
                'poster_url' => 'piripiri.jpg',
                'price' => 0.85,
                'category_id' => 5,
                'status' => 1,
                'allergene' => 'Lait, Oeufs, Gluten (blé) ',

            ],
            [
                'name' => 'moutarde',
                'description' => "",
                'poster_url' => 'moutarde.jpg',
                'price' => 0.85,
                'category_id' => 5,
                'status' => 1,
                'allergene' => 'Lait, Oeufs, Gluten (blé) ',

            ],
        ];

        //Prepare the data
        foreach ($products as &$data) {
            $category = Category::firstWhere('id', $data['category_id']);
            DB::table('products')->insert([
                'name' => $data['name'],
                'description' => $data['description'],
                'poster_url' => $data['poster_url'],
                'price' => $data['price'],
                'allergene' => $data['allergene'],
                'category_id' => $category->id ?? null,

            ]);
        }
    }
}

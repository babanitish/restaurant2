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
                'poster_url' => 'hamburger.jpg',
                'price' => 3.90,
                'category_id' => 1,
                'status' => 1,

            ],
            [

                'name' => 'Cheeseburger ', 
                'description' => 'Sauce ketchup-moutarde, oignons, cornichons, steak haché et cheddar.',
                'poster_url' => 'Cheeseburger.jpg',
                'price' => 3.80,
                'category_id' => 1,
                'status' => 1,
            ],
            [

                'name' => 'Double cheese  ', 
                'description' => 'Sauce ketchup-moutarde, oignons, cornichons, double steak haché et double cheddar.',
                'poster_url' => 'Double cheese.jpg',
                'price' => 3.80,
                'category_id' => 1,
                'status' => 1,
            ],
            [

                'name' => 'Chicken burger  ', 
                'description' => 'Sauce ketchup-moutarde, oignons, cornichons, double steak haché et double cheddar.',
                'poster_url' => 'Chicken burger.jpg',
                'price' => 3.90,
                'category_id' => 1,
                'status' => 1,
            ],
            [

                'name' => 'Fish burger  ', 
                'description' => 'Sauce mayonnaise, salade, tomate et steak de poulet.',
                'poster_url' => 'Fish burger.jpg',
                'price' => 3.90,
                'category_id' => 1,
                'status' => 1,
            ],

            // Pizza
            [

                'name' => 'pizza American  ', 
                'description' => 'Sauce tomate, mozzarella & pepperoni.',
                'poster_url' => 'american.jpg',
                'price' => 8.90,
                'category_id' => 2,
                'status' => 1,
            ],  [

                'name' => 'pizza Margherita ', 
                'description' => 'Sauce tomate, mozzarella, extra mozzarella & origan.',
                'poster_url' => 'margherita.jpg',
                'price' => 8.90,
                'category_id' => 2,
                'status' => 1,
            ],  [

                'name' => 'pizza Hot & Spicy ', 
                'description' => 'Sauce tomate, mozzarella & pepperoni, poulet, oignon, poivron, p...',
                'poster_url' => 'spicy.jpg',
                'price' => 8.90,
                'category_id' => 2,
                'status' => 1,
            ],  [

                'name' => 'Pizza BBQ Chicken & Bacon ', 
                'description' => 'BBQ sauce, mozzarella, poulet grillé et bacon.',
                'poster_url' => 'bacon.jpg',
                'price' => 8.90,
                'category_id' => 2,
                'status' => 1,
            ],  [

                'name' => 'Pizza 4 Stagioni ', 
                'description' => 'Sauce tomate, mozzarella, pepperoni, jambon, poivrons & champignons.',
                'poster_url' => 'stagioni.jpg',
                'price' => 8.90,
                'category_id' => 2,
                'status' => 1,
            ],
        ];

        //Prepare the data
        foreach ($products as &$data) {
            $category = Category::firstWhere('id',$data['category_id']);
            DB::table('products')->insert([
                'name' => $data['name'],
                'description' => $data['description'],
                'poster_url' => $data['poster_url'],
                'price' => $data['price'],
                'category_id' => $category->id ?? null,

            ]);
        }
    }
}

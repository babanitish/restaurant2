<?php

namespace Database\Seeders;

use App\Models\extra;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
class ExtraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        extra::truncate();
        Schema::enableForeignKeyConstraints();

        $extras = [
            [

                'name' => 'frites',
                'price' => 3.90,
                'product_id' => 1,

            ],
             [

                'name' => 'nugget',
                'price' => 3.90,
                'product_id' => 2,
             ],
            // [

            //     'name' => 'Double cheese  ', 
            //     'description' => 'Sauce ketchup-moutarde, oignons, cornichons, double steak haché et double cheddar.',
            //     'poster_url' => 'Double cheese.jpg',
            //     'price' => 3.80,
            //     'category_id' => 1,
            //     'status' => 1,
            // ],
            // [

            //     'name' => 'Chicken burger  ', 
            //     'description' => 'Sauce ketchup-moutarde, oignons, cornichons, double steak haché et double cheddar.',
            //     'poster_url' => 'Chicken burger.jpg',
            //     'price' => 3.90,
            //     'category_id' => 1,
            //     'status' => 1,
            // ],
            // [

            //     'name' => 'Fish burger  ', 
            //     'description' => 'Sauce mayonnaise, salade, tomate et steak de poulet.',
            //     'poster_url' => 'Fish burger.jpg',
            //     'price' => 3.90,
            //     'category_id' => 1,
            //     'status' => 1,
            // ],

            // // Pizza
            // [

            //     'name' => 'pizza American  ', 
            //     'description' => 'Sauce tomate, mozzarella & pepperoni.',
            //     'poster_url' => 'american.jpg',
            //     'price' => 8.90,
            //     'category_id' => 2,
            //     'status' => 1,
            // ],  [

            //     'name' => 'pizza Margherita ', 
            //     'description' => 'Sauce tomate, mozzarella, extra mozzarella & origan.',
            //     'poster_url' => 'margherita.jpg',
            //     'price' => 8.90,
            //     'category_id' => 2,
            //     'status' => 1,
            // ],  [

            //     'name' => 'pizza Hot & Spicy ', 
            //     'description' => 'Sauce tomate, mozzarella & pepperoni, poulet, oignon, poivron, p...',
            //     'poster_url' => 'spicy.jpg',
            //     'price' => 8.90,
            //     'category_id' => 2,
            //     'status' => 1,
            // ],  [

            //     'name' => 'Pizza BBQ Chicken & Bacon ', 
            //     'description' => 'BBQ sauce, mozzarella, poulet grillé et bacon.',
            //     'poster_url' => 'bacon.jpg',
            //     'price' => 8.90,
            //     'category_id' => 2,
            //     'status' => 1,
            // ],  [

            //     'name' => 'Pizza 4 Stagioni ', 
            //     'description' => 'Sauce tomate, mozzarella, pepperoni, jambon, poivrons & champignons.',
            //     'poster_url' => 'stagioni.jpg',
            //     'price' => 8.90,
            //     'category_id' => 2,
            //     'status' => 1,
            // ],
        ];

        //Prepare the data
        foreach ($extras as &$data) {
            $product = Product::firstWhere('id',$data['product_id']);
            DB::table('extras')->insert([
                'name' => $data['name'],
                'price' => $data['price'],
                'product_id' => $product->id ?? null,

            ]);
        }
    }
}

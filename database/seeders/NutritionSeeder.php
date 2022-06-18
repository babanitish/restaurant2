<?php

namespace Database\Seeders;

use App\Models\Nutrition;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

use function Ramsey\Uuid\v1;

class NutritionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Nutrition::truncate();
        Schema::enableForeignKeyConstraints();

        $nutritions = [
            [
                'energy' => 283.3,
                'fat' => 18.7,
                'proteines' => 17.8,
                'glucides' => 12.5,
                'sel' => 1.51,
                'product_id' => 1
            ],
            [
                'energy' => 221.3,
                'fat' => 12.3,
                'proteines' => 9.8,
                'glucides' => 17.5,
                'sel' => 0.7,
                'product_id' => 2

            ],
            [
                'energy' => 295.3,
                'fat' => 20.2,
                'proteines' => 17.2,
                'glucides' => 11.52,
                'sel' => 1.3,
                'product_id' => 3

            ],
            [
                'energy' => 295.3,
                'fat' => 20.2,
                'proteines' => 17.2,
                'glucides' => 11.52,
                'sel' => 1.3,
                'product_id' => 4

            ],
            [
                'energy' => 295.3,
                'fat' => 20.2,
                'proteines' => 17.2,
                'glucides' => 11.52,
                'sel' => 1.3,
                'product_id' => 5

            ],
            [
                'energy' => 295.3,
                'fat' => 20.2,
                'proteines' => 17.2,
                'glucides' => 11.52,
                'sel' => 1.3,
                'product_id' => 6

            ],
            [
                'energy' => 295.3,
                'fat' => 20.2,
                'proteines' => 17.2,
                'glucides' => 11.52,
                'sel' => 1.3,
                'product_id' => 7

            ],
            [
                'energy' => 295.3,
                'fat' => 20.2,
                'proteines' => 17.2,
                'glucides' => 11.52,
                'sel' => 1.3,
                'product_id' => 8

            ],
            [
                'energy' => 295.3,
                'fat' => 20.2,
                'proteines' => 17.2,
                'glucides' => 11.52,
                'sel' => 1.3,
                'product_id' => 9

            ],
            [
                'energy' => 295.3,
                'fat' => 20.2,
                'proteines' => 17.2,
                'glucides' => 11.52,
                'sel' => 1.3,
                'product_id' => 10

            ],
            [
                'energy' => 295.3,
                'fat' => 20.2,
                'proteines' => 17.2,
                'glucides' => 11.52,
                'sel' => 1.3,
                'product_id' => 11

            ],
            [
                'energy' => 295.3,
                'fat' => 20.2,
                'proteines' => 17.2,
                'glucides' => 11.52,
                'sel' => 1.3,
                'product_id' => 12

            ],
            [
                'energy' => 295.3,
                'fat' => 20.2,
                'proteines' => 17.2,
                'glucides' => 11.52,
                'sel' => 1.3,
                'product_id' => 13

            ],
            [
                'energy' => 283.3,
                'fat' => 18.7,
                'proteines' => 17.8,
                'glucides' => 12.5,
                'sel' => 1.51,
                'product_id' => 14
            ],
            [
                'energy' => 221.3,
                'fat' => 12.3,
                'proteines' => 9.8,
                'glucides' => 17.5,
                'sel' => 0.7,
                'product_id' => 15

            ],
            [
                'energy' => 295.3,
                'fat' => 20.2,
                'proteines' => 17.2,
                'glucides' => 11.52,
                'sel' => 1.3,
                'product_id' => 16

            ],
            [
                'energy' => 295.3,
                'fat' => 20.2,
                'proteines' => 17.2,
                'glucides' => 11.52,
                'sel' => 1.3,
                'product_id' => 17

            ],
            [
                'energy' => 295.3,
                'fat' => 20.2,
                'proteines' => 17.2,
                'glucides' => 11.52,
                'sel' => 1.3,
                'product_id' => 18

            ],
            [
                'energy' => 295.3,
                'fat' => 20.2,
                'proteines' => 17.2,
                'glucides' => 11.52,
                'sel' => 1.3,
                'product_id' => 19

            ],
            [
                'energy' => 295.3,
                'fat' => 20.2,
                'proteines' => 17.2,
                'glucides' => 11.52,
                'sel' => 1.3,
                'product_id' => 20

            ],
            [
                'energy' => 295.3,
                'fat' => 20.2,
                'proteines' => 17.2,
                'glucides' => 11.52,
                'sel' => 1.3,
                'product_id' => 21

            ],
            [
                'energy' => 295.3,
                'fat' => 20.2,
                'proteines' => 17.2,
                'glucides' => 11.52,
                'sel' => 1.3,
                'product_id' => 22

            ],
            [
                'energy' => 295.3,
                'fat' => 20.2,
                'proteines' => 17.2,
                'glucides' => 11.52,
                'sel' => 1.3,
                'product_id' => 23

            ],
            [
                'energy' => 295.3,
                'fat' => 20.2,
                'proteines' => 17.2,
                'glucides' => 11.52,
                'sel' => 1.3,
                'product_id' => 24

            ],
            [
                'energy' => 295.3,
                'fat' => 20.2,
                'proteines' => 17.2,
                'glucides' => 11.52,
                'sel' => 1.3,
                'product_id' => 25

            ],
            [
                'energy' => 295.3,
                'fat' => 20.2,
                'proteines' => 17.2,
                'glucides' => 11.52,
                'sel' => 1.3,
                'product_id' => 26

            ],
            [
                'energy' => 283.3,
                'fat' => 18.7,
                'proteines' => 17.8,
                'glucides' => 12.5,
                'sel' => 1.51,
                'product_id' => 27
            ],
            [
                'energy' => 221.3,
                'fat' => 12.3,
                'proteines' => 9.8,
                'glucides' => 17.5,
                'sel' => 0.7,
                'product_id' => 28

            ],
            [
                'energy' => 295.3,
                'fat' => 20.2,
                'proteines' => 17.2,
                'glucides' => 11.52,
                'sel' => 1.3,
                'product_id' => 29

            ],
            [
                'energy' => 295.3,
                'fat' => 20.2,
                'proteines' => 17.2,
                'glucides' => 11.52,
                'sel' => 1.3,
                'product_id' => 30

            ],
            [
                'energy' => 295.3,
                'fat' => 20.2,
                'proteines' => 17.2,
                'glucides' => 11.52,
                'sel' => 1.3,
                'product_id' => 31

            ],
            [
                'energy' => 295.3,
                'fat' => 20.2,
                'proteines' => 17.2,
                'glucides' => 11.52,
                'sel' => 1.3,
                'product_id' => 32

            ],
            [
                'energy' => 295.3,
                'fat' => 20.2,
                'proteines' => 17.2,
                'glucides' => 11.52,
                'sel' => 1.3,
                'product_id' => 33

            ],
            [
                'energy' => 295.3,
                'fat' => 20.2,
                'proteines' => 17.2,
                'glucides' => 11.52,
                'sel' => 1.3,
                'product_id' => 34

            ],
            [
                'energy' => 295.3,
                'fat' => 20.2,
                'proteines' => 17.2,
                'glucides' => 11.52,
                'sel' => 1.3,
                'product_id' => 35

            ],
            [
                'energy' => 295.3,
                'fat' => 20.2,
                'proteines' => 17.2,
                'glucides' => 11.52,
                'sel' => 1.3,
                'product_id' => 36

            ],
            [
                'energy' => 295.3,
                'fat' => 20.2,
                'proteines' => 17.2,
                'glucides' => 11.52,
                'sel' => 1.3,
                'product_id' => 37

            ],
            [
                'energy' => 295.3,
                'fat' => 20.2,
                'proteines' => 17.2,
                'glucides' => 11.52,
                'sel' => 1.3,
                'product_id' => 38

            ],
            [
                'energy' => 295.3,
                'fat' => 20.2,
                'proteines' => 17.2,
                'glucides' => 11.52,
                'sel' => 1.3,
                'product_id' => 39

            ],
            [
                'energy' => 295.3,
                'fat' => 20.2,
                'proteines' => 17.2,
                'glucides' => 11.52,
                'sel' => 1.3,
                'product_id' => 40

            ],
            [
                'energy' => 295.3,
                'fat' => 20.2,
                'proteines' => 17.2,
                'glucides' => 11.52,
                'sel' => 1.3,
                'product_id' => 41

            ],
            [
                'energy' => 295.3,
                'fat' => 20.2,
                'proteines' => 17.2,
                'glucides' => 11.52,
                'sel' => 1.3,
                'product_id' => 42

            ],
            [
                'energy' => 295.3,
                'fat' => 20.2,
                'proteines' => 17.2,
                'glucides' => 11.52,
                'sel' => 1.3,
                'product_id' => 43

            ],
            [
                'energy' => 295.3,
                'fat' => 20.2,
                'proteines' => 17.2,
                'glucides' => 11.52,
                'sel' => 1.3,
                'product_id' => 44

            ],
            [
                'energy' => 295.3,
                'fat' => 20.2,
                'proteines' => 17.2,
                'glucides' => 11.52,
                'sel' => 1.3,
                'product_id' => 45

            ],
            [
                'energy' => 295.3,
                'fat' => 20.2,
                'proteines' => 17.2,
                'glucides' => 11.52,
                'sel' => 1.3,
                'product_id' => 46

            ],

        ];
        foreach ($nutritions as &$data) {
            $prod = Product::firstWhere('id', $data['product_id']);
            DB::table('nutritions')->insert([
                'energy' => $data['energy'],
                'fat' => $data['fat'],
                'proteines' => $data['proteines'],
                'glucides' => $data['glucides'],
                'sel' => $data['sel'],
                'product_id' => $prod->id ?? null,

            ]);
        }
    }
}

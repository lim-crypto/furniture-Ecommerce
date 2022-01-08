<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'name' => 'Executive Chair',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae nesciunt laborum doloribus pariatur inventore iste!',
                'price' => '5999',
                'image' => 'chair.jpg',
                'category_id' => '1',
                'quantity' => '1',
                'is_featured' => '0',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Gang Chair',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae nesciunt laborum doloribus pariatur inventore iste!',
                'price' => '7799',
                'image' => 'gangchair.jpg',
                'category_id' => '1',
                'quantity' => '1',
                'is_featured' => '0',

                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Coffee Table',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae nesciunt laborum doloribus pariatur inventore iste!',
                'price' => '3999',
                'image' => 'coffeetable.jpg',
                'category_id' => '2',
                'quantity' => '1',
                'is_featured' => '0',

                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Dining Table',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae nesciunt laborum doloribus pariatur inventore iste!',
                'price' => '5999',
                'image' => 'diningtable.jpg',
                'category_id' => '2',
                'quantity' => '1',
                'is_featured' => '1',

                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Standard Bed',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae nesciunt laborum doloribus pariatur inventore iste!',
                'price' => '9999',
                'image' => 'standardbed.jpg',
                'category_id' => '4',
                'quantity' => '1',
                'is_featured' => '1',

                'created_at' => now(),
                'updated_at' => now()
            ]

        ]);
    }
}

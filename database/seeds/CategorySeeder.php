<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('categories')->insert([
            [
                'name' => 'Chair',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Table',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name'=>'Sofa',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name'=>'Bed',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name'=>'Cabinet',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}

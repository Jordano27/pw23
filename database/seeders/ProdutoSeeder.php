<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call(ProdutoSeeder::class);
        DB::table('Produtos')->insert([
        [   'name' => 'Camiseta',
            'price' => 59.9,
            'quantily' => 20,
        ],
        [
            'name' => 'Bone',
            'price' => 25,
            'quantily' => 42,
        ]
    ]);
    }
}

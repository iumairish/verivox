<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tarrif;

class TarrifSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Tarrif::factory(10)->create();
    
        $data = [
            [
                "name"              =>  "Product A",
                "type"              =>  1,
                "baseCost"          =>  5,
                "includedKwh"       =>  0,
                "additionalKwhCost" =>  22
            ],
            [
                "name"              =>  "Product B",
                "type"              =>  2,
                "baseCost"          =>  800,
                "includedKwh"       =>  4000,
                "additionalKwhCost" =>  30
            ],
        ];

        foreach($data as $item) {
            Tarrif::factory()->create( $item );
        }
    }
}

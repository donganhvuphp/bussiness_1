<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class StoreHouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('storehouse')->truncate();
        Schema::enableForeignKeyConstraints();

        DB::table('storehouse')->insert($this->fakeData());
    }

    private function fakeData()
    {
        for ($productId = 1; $productId < 10; $productId ++) {
            for ($size = 37; $size < 44; $size++) {
                $data[] = [
                    'product_id' => $productId,
                    'name' => $size,
                    'quantity' => rand(50, 100)
                ];
            }
        }

        return $data;
    }
}

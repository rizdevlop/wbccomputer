<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Facades\Schema;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Category::truncate();
        Schema::enableForeignKeyConstraints();

        $data = [
            'ADAPTOR LAPTOP',
            'LCD LAPTOP',
            'KEYBOARD LAPTOP',
            'BATERAI LAPTOP',
            'FLEXIBLE LAPTOP',
            'CASE LAPTOP',
            'MAINBOARD LAPTOP',
            'RAM LAPTOP',
            'SSD M2 NVME',
            'SSD M2 SATA',
            'SSD SATA',
            'HARDISK LAPTOP',
            'HARDISK KOMPUTER',
            'RAM KOMPUTER',
            'PSU KOMPUTER',
            'MONITOR PC',
            'CASING PC',
            'VGA CARD PC',
            'ACCESORIESS PC',
            'SPAREPART PRINTER',
            'TINTA PRINTER',
            'CATRIDGE PRINTER'
        ];

        foreach ($data as $value) {
            Category::insert([
                'name' => $value
            ]);
        }
    }
}

<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = now();

        // ambil beberapa category id yang sudah ada
        $categoryIds = DB::table('categories')
            ->limit(3)
            ->pluck('id')
            ->toArray();

        if (count($categoryIds) === 0) {
            throw new \Exception('Categories belum ada. Jalankan CategorySeeder dulu.');
        }

        $products = [
            [
                'id' => (string) Str::ulid(),
                'category_id' => $categoryIds[0],
                'sku' => 'PRD-STEEL-001',
                'name' => 'Steel Bracket Heavy Duty',
                'unit' => 'pcs',
                'selling_price' => 75000,
                'cost_price' => 50000,
                'minimum_stock' => 100,
                'is_active' => true,
                'deleted_at' => null,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => (string) Str::ulid(),
                'category_id' => $categoryIds[0],
                'sku' => 'PRD-STEEL-002',
                'name' => 'Custom Metal Frame 40x40',
                'unit' => 'pcs',
                'selling_price' => 125000,
                'cost_price' => 85000,
                'minimum_stock' => 50,
                'is_active' => true,
                'deleted_at' => null,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => (string) Str::ulid(),
                'category_id' => $categoryIds[1] ?? $categoryIds[0],
                'sku' => 'PRD-ASSY-001',
                'name' => 'Hydraulic Pump Assembly',
                'unit' => 'unit',
                'selling_price' => 2500000,
                'cost_price' => 1800000,
                'minimum_stock' => 10,
                'is_active' => true,
                'deleted_at' => null,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => (string) Str::ulid(),
                'category_id' => $categoryIds[1] ?? $categoryIds[0],
                'sku' => 'PRD-ASSY-002',
                'name' => 'Gearbox Transmission Type-A',
                'unit' => 'unit',
                'selling_price' => 3200000,
                'cost_price' => 2400000,
                'minimum_stock' => 8,
                'is_active' => true,
                'deleted_at' => null,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => (string) Str::ulid(),
                'category_id' => $categoryIds[2] ?? $categoryIds[0],
                'sku' => 'PRD-COMP-001',
                'name' => 'Precision Shaft 25mm',
                'unit' => 'pcs',
                'selling_price' => 185000,
                'cost_price' => 120000,
                'minimum_stock' => 75,
                'is_active' => true,
                'deleted_at' => null,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => (string) Str::ulid(),
                'category_id' => $categoryIds[2] ?? $categoryIds[0],
                'sku' => 'PRD-COMP-002',
                'name' => 'Aluminium Casing Type-B',
                'unit' => 'pcs',
                'selling_price' => 95000,
                'cost_price' => 65000,
                'minimum_stock' => 120,
                'is_active' => true,
                'deleted_at' => null,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => (string) Str::ulid(),
                'category_id' => $categoryIds[0],
                'sku' => 'PRD-FAB-001',
                'name' => 'Fabricated Steel Plate 10mm',
                'unit' => 'pcs',
                'selling_price' => 210000,
                'cost_price' => 150000,
                'minimum_stock' => 60,
                'is_active' => true,
                'deleted_at' => null,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => (string) Str::ulid(),
                'category_id' => $categoryIds[1] ?? $categoryIds[0],
                'sku' => 'PRD-MECH-001',
                'name' => 'Industrial Roller 100mm',
                'unit' => 'pcs',
                'selling_price' => 145000,
                'cost_price' => 100000,
                'minimum_stock' => 90,
                'is_active' => true,
                'deleted_at' => null,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => (string) Str::ulid(),
                'category_id' => $categoryIds[2] ?? $categoryIds[0],
                'sku' => 'PRD-ELEC-001',
                'name' => 'Control Panel Box IP65',
                'unit' => 'unit',
                'selling_price' => 1750000,
                'cost_price' => 1300000,
                'minimum_stock' => 15,
                'is_active' => true,
                'deleted_at' => null,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => (string) Str::ulid(),
                'category_id' => $categoryIds[0],
                'sku' => 'PRD-WELD-001',
                'name' => 'Welded Frame Structure Type-X',
                'unit' => 'unit',
                'selling_price' => 4500000,
                'cost_price' => 3200000,
                'minimum_stock' => 5,
                'is_active' => true,
                'deleted_at' => null,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        DB::table('products')->insert($products);
    }
}

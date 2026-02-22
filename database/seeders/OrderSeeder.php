<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = now();

        $customers = DB::table('customers')->limit(5)->get();
        $products  = DB::table('products')->get();
        $user      = DB::table('users')->first();

        if (!$user) {
            throw new \Exception('User belum ada. Buat user dulu.');
        }

        $salesOrders = [];
        $salesOrderItems = [];

        foreach ($customers as $index => $customer) {

            $soId = (string) Str::ulid();
            $orderNumber = 'SO-2026-' . str_pad($index + 1, 4, '0', STR_PAD_LEFT);

            // Ambil 2 produk berbeda
            $productA = $products[$index % count($products)];
            $productB = $products[($index + 1) % count($products)];

            $qtyA = rand(5, 20);
            $qtyB = rand(2, 10);

            $totalA = $qtyA * $productA->selling_price;
            $totalB = $qtyB * $productB->selling_price;

            $subtotal = $totalA + $totalB;
            $tax = (int) round($subtotal * 0.11);
            $total = $subtotal + $tax;

            // SALES ORDER
            $salesOrders[] = [
                'id' => $soId,
                'order_num' => $orderNumber,
                'customer_id' => $customer->id,
                'status' => 'confirmed',
                'payment_status' => 'unpaid',
                'subtotal' => $subtotal,
                'tax_amount' => $tax,
                'total_amount' => $total,
                'note' => 'Generated dummy sales order',
                'created_by' => $user->id,
                'created_at' => $now,
                'updated_at' => $now,
            ];

            // ITEM A
            $salesOrderItems[] = [
                'id' => (string) Str::ulid(),
                'sales_order_id' => $soId,
                'product_id' => $productA->id,
                'quantity' => $qtyA,
                'unit_price' => $productA->selling_price,
                'total_price' => $totalA,
                'created_at' => $now,
                'updated_at' => $now,
            ];

            // ITEM B
            $salesOrderItems[] = [
                'id' => (string) Str::ulid(),
                'sales_order_id' => $soId,
                'product_id' => $productB->id,
                'quantity' => $qtyB,
                'unit_price' => $productB->selling_price,
                'total_price' => $totalB,
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        DB::table('sales_orders')->insert($salesOrders);
        DB::table('sales_order_items')->insert($salesOrderItems);
    }
}

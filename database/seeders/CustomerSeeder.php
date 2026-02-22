<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = now();

        $customers = [
            [
                'id' => (string) Str::uuid(),
                'name' => 'PT Maju Jaya Abadi',
                'email' => 'purchasing@majujaya.co.id',
                'msisdn' => '081298765401',
                'address' => 'Jl. Raya Bekasi KM 23 No.88',
                'city' => 'Bekasi',
                'credit_limit' => 500000000,
                'payment_terms' => '30 Days',
                'is_active' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => (string) Str::uuid(),
                'name' => 'PT Sinar Teknik Industri',
                'email' => 'procurement@sinarteknik.co.id',
                'msisdn' => '081377665544',
                'address' => 'Jl. Industri Selatan Blok C2',
                'city' => 'Karawang',
                'credit_limit' => 750000000,
                'payment_terms' => '45 Days',
                'is_active' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => (string) Str::uuid(),
                'name' => 'PT Global Karya Mandiri',
                'email' => 'admin@globalkarya.id',
                'msisdn' => '082112223334',
                'address' => 'Jl. Gatot Subroto No.15',
                'city' => 'Jakarta',
                'credit_limit' => 300000000,
                'payment_terms' => '30 Days',
                'is_active' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => (string) Str::uuid(),
                'name' => 'PT Andalan Prima Sejahtera',
                'email' => 'purchasing@andalaprima.co.id',
                'msisdn' => '081290001122',
                'address' => 'Jl. Raya Serpong KM 12',
                'city' => 'Tangerang',
                'credit_limit' => 600000000,
                'payment_terms' => '60 Days',
                'is_active' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => (string) Str::uuid(),
                'name' => 'PT Nusantara Metalworks',
                'email' => 'order@nusantarametal.co.id',
                'msisdn' => '081355667788',
                'address' => 'Jl. Pahlawan No.77',
                'city' => 'Surabaya',
                'credit_limit' => 900000000,
                'payment_terms' => '45 Days',
                'is_active' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => (string) Str::uuid(),
                'name' => 'PT Cipta Karya Engineering',
                'email' => 'procurement@ckeng.id',
                'msisdn' => '082233445566',
                'address' => 'Jl. Soekarno Hatta No.10',
                'city' => 'Bandung',
                'credit_limit' => 400000000,
                'payment_terms' => '30 Days',
                'is_active' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => (string) Str::uuid(),
                'name' => 'PT Indo Precision Parts',
                'email' => 'sales@indoprecision.co.id',
                'msisdn' => '081144556677',
                'address' => 'Jl. Industri Barat Kav 5',
                'city' => 'Cikarang',
                'credit_limit' => 650000000,
                'payment_terms' => '45 Days',
                'is_active' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => (string) Str::uuid(),
                'name' => 'PT Sentra Baja Utama',
                'email' => 'purchasing@sentrajaya.id',
                'msisdn' => '081377889900',
                'address' => 'Jl. Raya Rungkut Industri',
                'city' => 'Surabaya',
                'credit_limit' => 550000000,
                'payment_terms' => '30 Days',
                'is_active' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => (string) Str::uuid(),
                'name' => 'PT Teknologi Mesin Nusantara',
                'email' => 'admin@tmn.co.id',
                'msisdn' => '082100334455',
                'address' => 'Jl. Ahmad Yani No.120',
                'city' => 'Semarang',
                'credit_limit' => 700000000,
                'payment_terms' => '60 Days',
                'is_active' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => (string) Str::uuid(),
                'name' => 'PT Delta Fabrikasi Indonesia',
                'email' => 'order@deltafabrikasi.id',
                'msisdn' => '081298771122',
                'address' => 'Jl. Raya Cileungsi KM 5',
                'city' => 'Bogor',
                'credit_limit' => 800000000,
                'payment_terms' => '45 Days',
                'is_active' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        DB::table('customers')->insert($customers);
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Supplier;
use App\Models\Material;
use App\Models\PurchaseOrder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Seed users
        User::factory()->create([
            'nama' => 'Test User',
            'alamat' => 'Jl. Contoh No. 1',
            'email' => 'test@example.com',
            'nomor_handphone' => '08123456789',
        ]);

        // Seed suppliers
        Supplier::factory()->create([
            'nama' => 'Supplier A',
            'alamat' => 'Jl. Supplier A No. 1',
            'email' => 'supplierA@example.com',
            'nomor_handphone' => '08234567890',
        ]);

        // Seed materials
        Material::factory()->create([
            'nama_material' => 'Material A',
            'unit' => 'Kg',
            'harga' => 10000,
            'brand' => 'Brand A',
            'part_number' => 'PN-001',
            'deskripsi' => 'Deskripsi material A',
        ]);

        // Seed purchase orders
        PurchaseOrder::factory()->create([
            'nama_pembelian' => 'Pembelian Material A',
            'jumlah_pembelian' => 100,
            'tanggal' => now(),
            'material_id' => 1,
            'supplier_id' => 1,
            'deskripsi' => 'Deskripsi pembelian',
        ]);
    }
}

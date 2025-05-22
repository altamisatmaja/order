<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Order::factory()->count(10)->create([
        //     'reference_number' => 'ORD-' . strtoupper(uniqid()),
        //     'status' => 'pending',
        // ]);

        $data = [
            [
                'reference_number' => 'ORD-123456',
                'status' => 0,
            ],
            [
                'reference_number' => 'ORD-654321',
                'status' => 1,
            ],
            [
                'reference_number' => 'ORD-789012',
                'status' => 1,
            ],
            [
                'reference_number' => 'ORD-689014',
                'status' => 1,
            ],
        ];

        foreach ($data as $item) {
            Order::create([
                'reference_number' => $item['reference_number'],
                'status' => $item['status'],
            ]);
        }
    }
}

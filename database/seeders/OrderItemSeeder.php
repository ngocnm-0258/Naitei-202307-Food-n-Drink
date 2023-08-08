<?php

namespace Database\Seeders;

use App\Models\OrderItem;
use Illuminate\Database\Seeder;

class OrderItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 5; ++$i) {
            OrderItem::create([
                'quantity' => rand(1, 50),
                'payment_method' => 'Thanh toán khi nhận hàng',
                'payment_status' => false,
                'status' => '1',
                'product_id' => rand(1, 10),
                'order_id' => rand(1, 5),
            ]);
        }
    }
}

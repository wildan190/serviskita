<?php

namespace App\Repositories\Order;

use App\Models\Order;

class OrderRepository implements OrderRepositoryInterface
{
    public function createOrder(array $data)
    {
        return Order::create($data);
    }
}

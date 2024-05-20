<?php

namespace App\Repositories\Order;

interface OrderRepositoryInterface
{
    public function createOrder(array $data);
}

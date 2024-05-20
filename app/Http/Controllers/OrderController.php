<?php

namespace App\Http\Controllers;

use App\Repositories\Order\OrderRepositoryInterface;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $orderRepository;

    public function __construct(OrderRepositoryInterface $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function store(Request $request)
    {
        $address = $request->input('province') . ', ' .
            $request->input('city') . ', ' .
            $request->input('subdistrict') . ', ' .
            $request->input('village') . ', ' .
            $request->input('address') . ', ' .
            $request->input('postal_code');

        $orderData = [
            'OrderTicker' => 'ORD-' . uniqid(),
            'user_id' => $request->input('user_id'),
            'product_services_id' => $request->input('product_services_id'),
            'category_id' => $request->input('category_id'),
            'address' => $address,
            'phoneNumber' => $request->input('phoneNumber'),
            'total_price' => $request->input('total_price'),
            'status' => $request->input('status', 'Pending'),
        ];

        $order = $this->orderRepository->createOrder($orderData);

        // Return response or redirect as needed
    }
}

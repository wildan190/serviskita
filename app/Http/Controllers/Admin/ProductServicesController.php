<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\ProductServices\ProductServicesRepositoryInterface;

class ProductServicesController extends Controller
{
    protected $productServicesRepository;

    public function __construct(ProductServicesRepositoryInterface $productServicesRepository)
    {
        $this->productServicesRepository = $productServicesRepository;
    }

    public function index()
    {
        $productServices = $this->productServicesRepository->all();
        return view('admin.product_services.index', compact('productServices'));
    }

}

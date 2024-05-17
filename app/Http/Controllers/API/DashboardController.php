<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Repositories\ProductServices\ProductServicesRepositoryInterface;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    protected $productServicesRepository;

    public function __construct(ProductServicesRepositoryInterface $productServicesRepository)
    {
        $this->productServicesRepository = $productServicesRepository;
    }

    public function index(Request $request)
    {
        // Mengambil data ProductServices untuk user yang sudah terautentikasi
        $productServices = $this->productServicesRepository->all();

        return response()->json($productServices);
    }
}

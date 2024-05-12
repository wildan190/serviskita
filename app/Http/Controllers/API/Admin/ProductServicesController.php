<?php

namespace App\Http\Controllers\API\Admin;

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
        return response()->json($productServices);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'ServiceName' => 'required|string',
            'Category_id' => 'required|exists:categories,id',
            'ServicePrice' => 'required|numeric',
            'User_id' => 'required|exists:users,id',
        ]);

        $productService = $this->productServicesRepository->create($validatedData);

        return response()->json($productService, 201);
    }

    public function show($id)
    {
        $productService = $this->productServicesRepository->find($id);
        return response()->json($productService);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'ServiceName' => 'string',
            'Category_id' => 'exists:categories,id',
            'ServicePrice' => 'numeric',
            'User_id' => 'exists:users,id',
        ]);

        $productService = $this->productServicesRepository->update($id, $validatedData);

        return response()->json($productService, 200);
    }

    public function destroy($id)
    {
        $this->productServicesRepository->delete($id);
        return response()->json(['message' => 'Product service deleted successfully'], 200);
    }
}

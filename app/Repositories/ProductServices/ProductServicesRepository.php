<?php

namespace App\Repositories\ProductServices;

use App\Models\ProductServices;

class ProductServicesRepository implements ProductServicesRepositoryInterface
{
    protected $model;

    public function __construct(ProductServices $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        $username = auth()->user()->username;

        return $this->model->whereHas('user', function ($query) use ($username) {
            $query->where('username', $username);
        })->get();
    }

    public function find($id)
    {
        return $this->model->findOrFail($id);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update($id, array $data)
    {
        $productService = $this->find($id);
        $productService->update($data);
        return $productService;
    }

    public function delete($id)
    {
        $productService = $this->find($id);
        $productService->delete();
        return $productService;
    }
}

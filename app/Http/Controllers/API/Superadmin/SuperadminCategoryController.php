<?php

namespace App\Http\Controllers\API\Superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Category\CategoryRepositoryInterface;
use Illuminate\Http\Response;

class SuperadminCategoryController extends Controller
{
    protected $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        $categories = $this->categoryRepository->all();
        return response()->json($categories);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'CategoryName' => 'required',
            'CategoryDescription' => 'nullable',
        ]);

        $category = $this->categoryRepository->create($validatedData);

        return response()->json($category, Response::HTTP_CREATED);
    }

    public function show($id)
    {
        $category = $this->categoryRepository->find($id);
        return response()->json($category);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'CategoryName' => 'required',
            'CategoryDescription' => 'nullable',
        ]);

        $category = $this->categoryRepository->update($id, $validatedData);

        return response()->json($category, Response::HTTP_OK);
    }

    public function destroy($id)
    {
        $this->categoryRepository->delete($id);

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}

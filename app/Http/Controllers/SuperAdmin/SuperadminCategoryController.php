<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Category\CategoryRepositoryInterface;
use RealRashid\SweetAlert\Facades\Alert;

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
        return view('superadmin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('superadmin.categories.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'CategoryName' => 'required',
            'CategoryDescription' => 'nullable',
        ]);

        $this->categoryRepository->create($validatedData);

        Alert::success('Success', 'Category created successfully!');

        return redirect()->route('categories.index');
    }

    public function edit($id)
    {
        $category = $this->categoryRepository->find($id);
        return view('superadmin.categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'CategoryName' => 'required',
            'CategoryDescription' => 'nullable',
        ]);

        $this->categoryRepository->update($id, $validatedData);

        Alert::success('Success', 'Category updated successfully!');

        return redirect()->route('categories.index');
    }

    public function destroy($id)
    {
        $this->categoryRepository->delete($id);

        Alert::success('Success', 'Category deleted successfully!');

        return redirect()->route('categories.index');
    }
}

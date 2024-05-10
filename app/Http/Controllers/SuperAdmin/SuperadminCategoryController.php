<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Repositories\Category\CategoryRepositoryInterface;

class SuperadminCategoryController extends Controller
{
    protected $categoryRepository;

    /**
     * Constructor for the class.
     *
     * @param CategoryRepositoryInterface $categoryRepository The category repository interface
     */
    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Retrieves all categories from the category repository and returns them to the view 'superadmin.categories.index'.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $categories = $this->categoryRepository->all();
        return view('superadmin.categories.index', compact('categories'));
    }
}

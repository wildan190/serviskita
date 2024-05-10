<?php

namespace App\Http\Controllers\API\Superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Category\CategoryRepositoryInterface;
use Illuminate\Http\Response;

class SuperadminCategoryController extends Controller
{
    protected $categoryRepository;

    /**
     * Constructor for SuperadminCategoryController.
     *
     * @param CategoryRepositoryInterface $categoryRepository The category repository interface
     */
    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Retrieves all categories from the category repository and returns them as a JSON response.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $categories = $this->categoryRepository->all();
        return response()->json($categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request The HTTP request object
     * @throws Some_Exception_Class If the validation fails
     * @return \Illuminate\Http\JsonResponse The JSON response containing the created category
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'CategoryName' => 'required',
            'CategoryDescription' => 'nullable',
        ]);

        $category = $this->categoryRepository->create($validatedData);

        return response()->json($category, Response::HTTP_CREATED);
    }

    /**
     * Retrieves a category by its ID and returns it as a JSON response.
     *
     * @param int $id The ID of the category to retrieve.
     * @return \Illuminate\Http\JsonResponse The JSON response containing the category.
     */
    public function show($id)
    {
        $category = $this->categoryRepository->find($id);
        return response()->json($category);
    }

    /**
     * Updates a category with the given ID using the provided data from the request.
     *
     * @param Request $request The HTTP request containing the updated category data.
     * @param int $id The ID of the category to update.
     * @return \Illuminate\Http\JsonResponse The updated category as a JSON response.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'CategoryName' => 'required',
            'CategoryDescription' => 'nullable',
        ]);

        $category = $this->categoryRepository->update($id, $validatedData);

        return response()->json($category, Response::HTTP_OK);
    }

    /**
     * Deletes a category by its ID.
     *
     * @param int $id The ID of the category to be deleted.
     * @throws \Exception If the category cannot be deleted.
     * @return \Illuminate\Http\JsonResponse A JSON response with no content on success.
     */
    public function destroy($id)
    {
        $this->categoryRepository->delete($id);

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}

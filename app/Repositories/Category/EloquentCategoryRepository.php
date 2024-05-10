<?php

namespace App\Repositories\Category;

use App\Models\Category;

/**
 * Provides methods for interacting with categories.
 */
class EloquentCategoryRepository implements CategoryRepositoryInterface
{
    /**
     * Retrieves all categories.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return Category::all();
    }

    /**
     * Creates a new category.
     *
     * @param array $data The data to create the category with.
     * @return \App\Models\Category The created category.
     */
    public function create(array $data)
    {
        return Category::create($data);
    }

    /**
     * Retrieves a category by its ID.
     *
     * @param int $id The ID of the category to retrieve.
     * @return \App\Models\Category The retrieved category.
     */
    public function find($id)
    {
        return Category::findOrFail($id);
    }

    /**
     * Updates a category with the given ID using the provided data.
     *
     * @param int $id The ID of the category to update.
     * @param array $data The data to update the category with.
     * @return \App\Models\Category The updated category.
     */
    public function update($id, array $data)
    {
        $category = Category::findOrFail($id);
        $category->update($data);
        return $category;
    }

    /**
     * Deletes a category by its ID.
     *
     * @param int $id The ID of the category to delete.
     * @return void
     */
    public function delete($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
    }
}


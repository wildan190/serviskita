<?php

namespace App\Repositories\Category;

interface CategoryRepositoryInterface
{
    /**
     * Retrieves all categories.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all();

    /**
     * Creates a new category.
     *
     * @param array $data The data to create the category with.
     * @return \App\Models\Category The created category.
     */
    public function create(array $data);

    /**
     * Retrieves a category by its ID.
     *
     * @param int $id The ID of the category to retrieve.
     * @return \App\Models\Category The retrieved category.
     */
    public function find($id);

    /**
     * Updates a category with the given ID using the provided data.
     *
     * @param int $id The ID of the category to update.
     * @param array $data The data to update the category with.
     * @return \App\Models\Category The updated category.
     */
    public function update($id, array $data);

    /**
     * Deletes a category by its ID.
     *
     * @param int $id The ID of the category to delete.
     * @return void
     */
    public function delete($id);
}


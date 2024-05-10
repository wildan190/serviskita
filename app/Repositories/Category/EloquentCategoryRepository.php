<?php

namespace App\Repositories\Category;

use App\Models\Category;

class EloquentCategoryRepository implements CategoryRepositoryInterface
{
    public function all()
    {
        return Category::all();
    }

    public function create(array $data)
    {
        return Category::create($data);
    }

    public function find($id)
    {
        return Category::findOrFail($id);
    }

    public function update($id, array $data)
    {
        $category = Category::findOrFail($id);
        $category->update($data);
        return $category;
    }

    public function delete($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
    }
}

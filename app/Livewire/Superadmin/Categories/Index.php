<?php

namespace App\Livewire\Superadmin\Categories;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Cache;

class Index extends Component
{
    use WithPagination;

    public $CategoryName;
    public $CategoryDescription;
    public $selectedItemId;

    protected $rules = [
        'CategoryName' => 'required',
        'CategoryDescription' => 'nullable',
    ];

    /**
     * Renders the view for the Livewire component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        $categories = Cache::rememberForever('categories', function () {
            return Category::latest()->paginate(10);
        });
        return view('livewire.superadmin.categories.index', compact('categories'));
    }

    /**
     * Store a new category.
     *
     * This function validates the input data using the defined rules, creates a new category
     * using the validated data, resets the input fields, invalidates the cache for the categories,
     * and flashes a success message.
     *
     * @return void
     */
    public function store()
    {
        $validatedData = $this->validate($this->rules);
        Category::create($validatedData);
        $this->resetInputFields();
        Cache::forget('categories');
        session()->flash('message', 'Category created successfully.');
    }

    /**
     * Edit a category by its ID.
     *
     * @param int $id The ID of the category to edit.
     * @throws Illuminate\Database\Eloquent\ModelNotFoundException If the category with the given ID is not found.
     * @return void
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $this->selectedItemId = $id;
        $this->CategoryName = $category->CategoryName;
        $this->CategoryDescription = $category->CategoryDescription;
    }

    /**
     * Updates a category with validated data.
     *
     * @return void
     */
    public function update()
    {
        $validatedData = $this->validate($this->rules);
        $category = Category::find($this->selectedItemId);
        $category->update($validatedData);
        $this->resetInputFields();
        Cache::forget('categories');
        session()->flash('message', 'Category updated successfully.');
    }

    /**
     * Deletes a category by ID.
     *
     * @param int $id The ID of the category to delete.
     * @throws Exception If the category cannot be found.
     * @return void
     */
    public function delete($id)
    {
        Category::find($id)->delete();
        Cache::forget('categories');
        session()->flash('message', 'Category deleted successfully.');
    }

    /**
     * Resets the input fields for the CategoryName and CategoryDescription properties.
     *
     * This function sets the values of the CategoryName and CategoryDescription properties to empty strings.
     * It is typically used to clear the input fields after a form submission or when resetting the form.
     *
     * @return void
     */
    private function resetInputFields()
    {
        $this->CategoryName = '';
        $this->CategoryDescription = '';
    }
}

<?php

namespace App\Livewire\Superadmin\Categories;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;

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

    public function render()
    {
        $categories = Category::paginate(10);
        return view('livewire.superadmin.categories.index', compact('categories'));
    }

    public function store()
    {
        $validatedData = $this->validate($this->rules);

        Category::create($validatedData);

        $this->resetInputFields();

        session()->flash('message', 'Category created successfully.');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $this->selectedItemId = $id;
        $this->CategoryName = $category->CategoryName;
        $this->CategoryDescription = $category->CategoryDescription;
    }

    public function update()
    {
        $validatedData = $this->validate($this->rules);

        $category = Category::find($this->selectedItemId);
        $category->update($validatedData);

        $this->resetInputFields();

        session()->flash('message', 'Category updated successfully.');
    }

    public function delete($id)
    {
        Category::find($id)->delete();
        session()->flash('message', 'Category deleted successfully.');
    }

    private function resetInputFields()
    {
        $this->CategoryName = '';
        $this->CategoryDescription = '';
    }
}

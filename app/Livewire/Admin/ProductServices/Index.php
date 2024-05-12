<?php

namespace App\Livewire\Admin\ProductServices;

use Livewire\Component;
use App\Models\ProductServices;
use App\Models\Category;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $serviceName, $category_id, $servicePrice, $User_id;
    public $selectedId, $updateMode = false;
    public $modalVisibility = false;

    protected $rules = [
        'serviceName' => 'required|string',
        'category_id' => 'required|exists:categories,id',
        'servicePrice' => 'required|numeric',
    ];

    public function render()
    {
        $categories = Category::all();
        $productServices = ProductServices::whereHas('user', function ($query) {
            $query->where('username', auth()->user()->username);
        })->paginate(10);
        return view('livewire.admin.product-services.index', compact('productServices', 'categories'));
    }


    public function showCreateForm()
    {
        $this->reset();
        $this->User_id = auth()->user()->id;
        $this->updateMode = false;
        $this->openModal();
    }

    public function showEditForm($id)
    {
        $this->resetValidation();
        $this->updateMode = true;
        $productService = ProductServices::findOrFail($id);
        $this->selectedId = $id;
        $this->serviceName = $productService->ServiceName;
        $this->category_id = $productService->Category_id;
        $this->servicePrice = $productService->ServicePrice;
        $this->User_id = $productService->User_id;
        $this->openModal();
    }

    public function store()
    {
        $this->validate();

        ProductServices::create([
            'ServiceName' => $this->serviceName,
            'Category_id' => $this->category_id,
            'ServicePrice' => $this->servicePrice,
            'User_id' => $this->User_id,
        ]);

        session()->flash('message', 'Category Stored successfully.');

        $this->reset();
        $this->modalVisibility = false;
    }

    public function update()
    {
        $this->validate();

        $productService = ProductServices::findOrFail($this->selectedId);

        $productService->update([
            'ServiceName' => $this->serviceName,
            'Category_id' => $this->category_id,
            'ServicePrice' => $this->servicePrice,
            'User_id' => $this->User_id,
        ]);

        session()->flash('message', 'Category updated successfully.');

        $this->reset();
        $this->updateMode = false;
        $this->modalVisibility = false;
    }

    public function delete($id)
    {
        session()->flash('message', 'Category updated successfully.');
        ProductServices::findOrFail($id)->delete();
    }

    public function openModal()
    {
        $this->modalVisibility = true;
    }

    public function closeModal()
    {
        $this->modalVisibility = false;
        $this->reset();
    }
}



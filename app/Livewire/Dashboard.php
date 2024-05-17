<?php

namespace App\Livewire;

use Livewire\Component;
use App\Repositories\ProductServices\ProductServicesRepositoryInterface;

class Dashboard extends Component
{
    public $productServices;

    protected $productServicesRepository;

    public function mount(ProductServicesRepositoryInterface $productServicesRepository)
    {
        $this->productServicesRepository = $productServicesRepository;
        $this->productServices = $this->productServicesRepository->all();
    }

    public function render()
    {
        return view('livewire.dashboard');
    }
}

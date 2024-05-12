<div class="container mx-auto px-1">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl">Product Services</h1>
        </div>
        <div>
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" wire:click="showCreateForm">
                Create Product Service
            </button>
        </div>
    </div>

    <div>
        @if($modalVisibility)
        @include('livewire.admin.product-services.create')
        @endif
    </div>

    @if (session()->has('message'))
    <div class="p-4 my-3 bg-green-100 text-green-700 rounded" role="alert">
        {{ session('message') }}
    </div>
    @endif

    {{-- Tabel Product Services --}}
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        No.
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Service Name
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Category ID
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Service Price
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        User ID
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($productServices as $productService)
                <tr class="min-w-full">
                    <td class="px-6 py-4 whitespace-nowrap">{{ $loop->iteration }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $productService->ServiceName }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $productService->category->CategoryName }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $productService->ServicePrice }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $productService->user->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <button class="text-blue-500 hover:text-blue-700" wire:click="showEditForm({{ $productService->id }})">Edit</button>
                        <button class="text-red-500 hover:text-red-700" wire:click="delete({{ $productService->id }})">Delete</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Pagination Links --}}
    <div class="mt-4">
        {{ $productServices->links() }}
    </div>
</div>

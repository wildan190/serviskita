<div class="container mx-auto px-1">
    <div class="space-y-4">
        <div class="bg-white shadow rounded-md overflow-hidden">
            <div class="p-4 sm:p-6">
                <h3 class="text-lg font-medium leading-6 text-gray-900">
                    {{ $selectedItemId ? 'Edit' : 'Add New' }} Category
                </h3>
            </div>
            <div class="border-t border-gray-200 p-4 sm:p-6">
                {{-- Form for adding or editing category --}}
                <form wire:submit.prevent="{{ $selectedItemId ? 'update' : 'store' }}">
                    <div class="space-y-4">
                        <div>
                            <label for="CategoryName" class="block text-sm font-medium text-gray-700">Name:</label>
                            <div class="mt-1">
                                <input type="text" wire:model.defer="CategoryName" id="CategoryName" class="block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Category Name" required>
                                @error('name') <span class="error text-red-500 text-xs mt-2">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div>
                            <label for="CategoryDescription" class="block text-sm font-medium text-gray-700">Description:</label>
                            <div class="mt-1">
                                <textarea wire:model.defer="CategoryDescription" id="CategoryDescription" class="block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Category Description" required></textarea>
                                @error('description') <span class="error text-red-500 text-xs mt-2">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div>
                            <button type="submit" class="w-full inline-flex justify-center px-6 py-3 border border-transparent rounded-full font-semibold text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                {{ $selectedItemId ? 'Update' : 'Add New' }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="bg-white shadow rounded-md overflow-hidden">
            @if (session()->has('message'))
            <div class="p-4 my-3 bg-green-100 text-green-700 rounded" role="alert">
                {{ session('message') }}
            </div>
            @endif
            <div class="p-4 sm:p-6">
                <h3 class="text-lg font-medium leading-6 text-gray-900">
                    Categories
                </h3>
            </div>
            <div class="border-t border-gray-200 p-4 sm:p-6">
                {{-- Table to display categories --}}
                <div class="overflow-x-auto">
                    <table class="w-full whitespace-nowrap">
                        <thead>
                            <tr class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                                <th class="px-6 py-3">No.</th>
                                <th class="px-6 py-3">Name</th>
                                <th class="px-6 py-3">Description</th>
                                <th class="px-6 py-3">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($categories as $category)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $loop->iteration }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $category->CategoryName }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $category->CategoryDescription }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <button type="button" wire:click="edit({{ $category->id }})" class="inline-flex items-center p-2 border border-gray-300 rounded-full shadow-sm bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                        </svg>
                                        <span class="ml-2">Edit</span>
                                    </button>
                                    <button type="button" wire:click="delete({{ $category->id }})" class="inline-flex items-center p-2 border border-gray-300 rounded-full shadow-sm bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                        <span class="ml-2">Delete</span>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- Pagination Links --}}
                {{ $categories->links() }}
            </div>
        </div>
    </div>
</div>

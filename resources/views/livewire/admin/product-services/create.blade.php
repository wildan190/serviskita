<div class="fixed inset-0 z-10 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
    
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
    
        <div class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6">
            <div>
                <form wire:submit.prevent="{{ $updateMode ? 'update' : 'store' }}">
                    <div class="mt-3 text-center sm:mt-5">
                        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                            {{ $updateMode ? 'Update' : 'Create' }} Product Services
                        </h3>
                    </div>
            
                    <div class="mt-5">
                        <div>
                            <label for="serviceName">Service Name:</label>
                            <input type="text" wire:model.defer="serviceName" placeholder="Service Name" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md">
                            @error('serviceName') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label for="category_id">Category:</label>
                            <select wire:model.defer="category_id" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md">
                                <option value="">Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->CategoryName }}</option>
                                @endforeach
                            </select>
                            @error('category_id') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label for="servicePrice">Service Price:</label>
                            <input type="text" wire:model.defer="servicePrice" placeholder="Service Price" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md">
                            @error('servicePrice') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>
                        
                    </div>
            
                    <div class="mt-5 sm:mt-6">
                        <button type="submit" class="inline-flex justify-center w-full rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:text-sm">
                            {{ $updateMode ? 'Update' : 'Create' }}
                        </button>
                        <button type="button" wire:click="closeModal" class="inline-flex justify-center w-full rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:col-start-1 sm:text-sm">
                            Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


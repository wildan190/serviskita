<div class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true" wire:ignore.self style="display: block !important;">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

        <!-- This element is to trick the browser into centering the modal contents. -->
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" style="max-height: 80vh; overflow-y: auto;">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                    <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-blue-100 sm:mx-0 sm:h-10 sm:w-10">
                        <!-- Heroicon name: outline/exclamation -->
                        <svg class="h-6 w-6 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                    </div>
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                            {{ $editId ? 'Edit User Detail' : 'Create New User Detail' }}
                        </h3>
                        <div class="mt-2">
                            <p class="text-sm text-gray-500">
                                Please fill out the form below to {{ $editId ? 'edit' : 'create' }} a user detail.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <form wire:submit.prevent="{{ $editId ? 'update' : 'store' }}" class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="">


                    @if ($errors->any())
                    <div class="bg-red-200 text-red-800 p-3 rounded mb-4">
                        Terdapat beberapa kesalahan dalam pengisian formulir:
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <div class="mb-4">
                        <label for="UserBirthDate" class="block text-sm font-medium text-gray-700">User Birth Date <span class="text-red-500">*</span></label>
                        <input type="date" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md" id="UserBirthDate" wire:model="UserBirthDate" required placeholder="YYYY-MM-DD">
                        @error('UserBirthDate') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>
                    <div class="mb-4">
                        <label for="UserPhoneNumber" class="block text-sm font-medium text-gray-700">User Phone Number <span class="text-red-500">*</span></label>
                        <input type="text" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md" id="UserPhoneNumber" wire:model="UserPhoneNumber" required placeholder="+6281234567890">
                        @error('UserPhoneNumber') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>
                    <div class="mb-4">
                        <label for="UserCountry" class="block text-sm font-medium text-gray-700">User Country <span class="text-red-500">*</span></label>
                        <input type="text" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md" id="UserCountry" wire:model="UserCountry" required placeholder="Indonesia">
                        @error('UserCountry') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>
                    <div class="mb-4">
                        <label for="UserProvince" class="block text-sm font-medium text-gray-700">User Province <span class="text-red-500">*</span></label>
                        <input type="text" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md" id="UserProvince" wire:model="UserProvince" required placeholder="Jawa Barat">
                        @error('UserProvince') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>
                    <div class="mb-4">
                        <label for="UserRegency" class="block text-sm font-medium text-gray-700">User Regency <span class="text-red-500">*</span></label>
                        <input type="text" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md" id="UserRegency" wire:model="UserRegency" required placeholder="Kab. Bandung">
                        @error('UserRegency') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>
                    <div class="mb-4">
                        <label for="UserSubdistrict" class="block text-sm font-medium text-gray-700">User Subdistrict <span class="text-red-500">*</span></label>
                        <input type="text" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md" id="UserSubdistrict" wire:model="UserSubdistrict" required placeholder="Kec. Bandung Kulon">
                        @error('UserSubdistrict') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>
                    <div class="mb-4">
                        <label for="UserVillage" class="block text-sm font-medium text-gray-700">User Village <span class="text-red-500">*</span></label>
                        <input type="text" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md" id="UserVillage" wire:model="UserVillage" required placeholder="Kelurahan Kertasari">
                        @error('UserVillage') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>
                    <div class="mb-4">
                        <label for="UserAddress" class="block text-sm font-medium text-gray-700">User Address <span class="text-red-500">*</span></label>
                        <input type="text" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md" id="UserAddress" wire:model="UserAddress" required placeholder="Jalan Raya Kertasari No. 123">
                        @error('UserAddress') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>
                    <div class="mb-4">
                        <label for="PostalCode" class="block text-sm font-medium text-gray-700">Postal Code <span class="text-red-500">*</span></label>
                        <input type="text" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md" id="PostalCode" wire:model="PostalCode" required placeholder="40361">
                        @error('PostalCode') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm" wire:click="closeModal">
                        Cancel
                    </button>
                    <button type="submit" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
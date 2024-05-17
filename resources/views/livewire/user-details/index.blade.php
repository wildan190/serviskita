<div class="bg-gradient-to-br from-white to-gray-300">
    <div class="container mx-auto px-4 py-16">
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h2 class="text-2xl font-bold text-gray-700">Profile Saya</h2>
                </div>
                <div>
                    <button wire:click="create" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Lengkapi</button>
                </div>
            </div>

            @if (session()->has('message'))
            <div class="p-4 my-3 bg-green-100 text-green-700 rounded" role="alert">
                {{ session('message') }}
            </div>
            @endif

            @if($isOpen)
            @include('livewire.user-details.create')
            @endif

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-20">
                @forelse($userDetails as $userDetail)
                <div class="bg-white rounded-md shadow-md">
                    <div class="relative h-64 bg-cover bg-center" style="background-image: url('{{ $userDetail->user->profile_photo_path ?? 'https://ui-avatars.com/api/?name=' . urlencode($userDetail->user->name) . '&color=7F9CF5&background=EBF4FF' }}')">
                        <div class="absolute inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center">
                            <div class="text-center">
                                <h2 class="text-2xl font-semibold text-white">{{ $userDetail->user->name }}</h2>
                                <p class="text-lg font-medium text-white">{{ '@' . $userDetail->user->username }}</p>
                                <p class="text-lg font-medium text-white">{{ $userDetail->user->email }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="p-6 border-t border-gray-200">
                        <div class="flex items-center">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-400 mr-4">
                                <path d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                            <h3 class="text-lg font-semibold">Telepon</h3>
                        </div>
                        <p class="mt-4 text-gray-600">{{ $userDetail->UserPhoneNumber }}</p>
                    </div>
                    <div class="p-6 border-t border-gray-200">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-gray-400 mr-4" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                            </svg>
                            <h3 class="text-lg font-semibold">Birth Date</h3>
                        </div>
                        <p class="mt-4 text-gray-600">{{ $userDetail->UserBirthDate }}</p>
                    </div>
                    <div class="p-6 border-t border-gray-200">
                        <div class="flex items-center mb-4">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-400 mr-4">
                                <path d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <h3 class="text-lg font-semibold">Alamat</h3>
                        </div>
                        <p class="text-gray-600">{{ $userDetail->UserAddress }}</p>
                        <p class="text-gray-600">{{ $userDetail->UserAddressDetails }}</p>
                        <p class="text-gray-600">{{ $userDetail->UserSubdistrict }}, {{ $userDetail->UserRegency }}, {{ $userDetail->UserProvince }}, {{ $userDetail->UserCountry }}</p>
                        <p class="text-gray-600">{{ $userDetail->PostalCode }}</p>
                        <div class="mt-4 flex justify-end">
                            <button wire:click="edit({{ $userDetail->id }})" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</button>
                            <button wire:click="delete({{ $userDetail->id }})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded ml-2">Delete</button>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-md shadow-md p-6">
                    <h2 class="text-2xl font-bold mb-4">Keamanan Akun Anda</h2>
                    <p class="text-base leading-relaxed text-gray-700 mb-4">Menjaga keamanan akun Anda sangat penting untuk melindungi informasi pribadi dan data sensitif Anda. Berikut adalah beberapa tips yang dapat membantu meningkatkan keamanan akun Anda:</p>
                    <ul class="mb-4 text-base leading-relaxed text-gray-700">
                        <li class="flex items-start mb-2">
                            <svg class="w-5 h-5 text-blue-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Gunakan kata sandi yang kuat dan unik untuk setiap akun.</span>
                        </li>
                        <li class="flex items-start mb-2">
                            <svg class="w-5 h-5 text-blue-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Aktifkan verifikasi dua langkah (2FA) jika tersedia.</span>
                        </li>
                        <li class="flex items-start mb-2">
                            <svg class="w-5 h-5 text-blue-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Jangan pernah berbagi kata sandi Anda dengan orang lain.</span>
                        </li>
                        <li class="flex items-start mb-2">
                            <svg class="w-5 h-5 text-blue-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Perbarui kata sandi Anda secara berkala.</span>
                        </li>
                        <li class="flex items-start mb-2">
                            <svg class="w-5 h-5 text-blue-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Waspadai email dan pesan yang mencurigakan yang meminta informasi pribadi Anda.</span>
                        </li>
                    </ul>
                    <a href="{{route('profile.show')}}" class="inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition duration-300 flex items-center">
                        <svg class="w-5 h-5 text-white mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                        Konfigurasi Akun
                    </a>
                </div>
                @empty
                <div class="bg-white rounded-lg shadow-md p-6 col-span-3">
                    <div class="flex justify-center items-center">
                        <h3 class="text-base font-semibold text-gray-600">Belum ada data Profile</h3>
                    </div>
                </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
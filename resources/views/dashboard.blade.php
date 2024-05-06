<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @if(Auth::user()->role === 'superadmin')
                <p>Selamat datang, Superadmin!</p>
                <!-- Tambahkan tampilan yang spesifik untuk superadmin di sini -->
                @elseif(Auth::user()->role === 'admin')
                <p>Selamat datang, Admin!</p>
                <!-- Tambahkan tampilan yang spesifik untuk admin di sini -->
                @else
                <p>Selamat datang, User!</p>
                <!-- Tambahkan tampilan yang spesifik untuk user di sini -->
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
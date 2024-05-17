<div class="p-6">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach($productServices as $productService)
        <div class="bg-white rounded-lg shadow-md p-4">
            <p class="text-gray-600 text-sm">ID: {{ $loop->iteration }}</p>
            <p class="text-gray-800 font-semibold text-lg mb-2">{{ $productService->ServiceName }}</p>
            <p class="text-gray-700">Category: {{ $productService->category->CategoryName }}</p>
            <p class="text-gray-700">Price: Rp. {{ number_format($productService->ServicePrice, 2, ',', '.') }}</p>
            <p class="text-gray-700">Vendor: {{ $productService->user->name }}</p>
            <!-- Add Order button -->
            <form method="post">
                @csrf
                <input type="hidden" name="product_service_id" value="{{ $productService->id }}">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-2">Order</button>
            </form>
        </div>
        @endforeach
    </div>
</div>

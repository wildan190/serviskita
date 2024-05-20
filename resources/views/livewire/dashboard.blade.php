<div class="p-6">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach($productServices as $productService)
        <div class="bg-white rounded-lg shadow-md p-4">
            <p class="text-gray-600 text-sm">ID: {{ $loop->iteration }}</p>
            <p class="text-gray-800 font-semibold text-lg mb-2">{{ $productService->ServiceName }}</p>
            <p class="text-gray-700">Category: {{ $productService->category->CategoryName }}</p>
            <p class="text-gray-700">Price: Rp. {{ number_format($productService->ServicePrice, 2, ',', '.') }}</p>
            <p class="text-gray-700">Vendor: {{ $productService->user->name }}</p>

            <!-- Button untuk memunculkan modal -->
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-2" onclick="openModal('{{ $productService->id }}')">Order</button>

            <!-- Modal -->
            <div id="myModal_{{ $productService->id }}" class="modal fixed z-10 inset-0 overflow-y-auto hidden">
                <div class="flex items-center justify-center min-h-screen">
                    <div class="modal-content bg-white w-full max-w-lg p-6 rounded-lg shadow-lg">
                        <div class="flex justify-end">
                            <button class="text-gray-600 hover:text-gray-800 focus:outline-none" onclick="closeModal('{{ $productService->id }}')">&times;</button>
                        </div>
                        <form id="orderForm_{{ $productService->id }}" action="{{ route('orders.store') }}" method="post">
                            @csrf
                            <input type="hidden" name="product_services_id" value="{{ $productService->id }}">
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            <input type="hidden" name="category_id" value="{{ $productService->category->id }}">

                            <div class="mb-4">
                                <label for="province_{{ $productService->id }}" class="block text-gray-700">Provinsi</label>
                                <input type="text" id="province_{{ $productService->id }}" name="province" placeholder="Enter your province" required class="block w-full mt-2 border-gray-300 rounded-md shadow-sm focus:border-blue-400 focus:ring focus:ring-blue-400 focus:ring-opacity-50">
                            </div>

                            <div class="mb-4">
                                <label for="city_{{ $productService->id }}" class="block text-gray-700">Kota/Kabupaten</label>
                                <input type="text" id="city_{{ $productService->id }}" name="city" placeholder="Enter your city" required class="block w-full mt-2 border-gray-300 rounded-md shadow-sm focus:border-blue-400 focus:ring focus:ring-blue-400 focus:ring-opacity-50">
                            </div>

                            <div class="mb-4">
                                <label for="subdistrict_{{ $productService->id }}" class="block text-gray-700">Kecamatan</label>
                                <input type="text" id="subdistrict_{{ $productService->id }}" name="subdistrict" placeholder="Enter your subdistrict" required class="block w-full mt-2 border-gray-300 rounded-md shadow-sm focus:border-blue-400 focus:ring focus:ring-blue-400 focus:ring-opacity-50">
                            </div>

                            <div class="mb-4">
                                <label for="village_{{ $productService->id }}" class="block text-gray-700">Kelurahan</label>
                                <input type="text" id="village_{{ $productService->id }}" name="village" placeholder="Enter your village" required class="block w-full mt-2 border-gray-300 rounded-md shadow-sm focus:border-blue-400 focus:ring focus:ring-blue-400 focus:ring-opacity-50">
                            </div>

                            <div class="mb-4">
                                <label for="address_{{ $productService->id }}" class="block text-gray-700">Alamat</label>
                                <input type="text" id="address_{{ $productService->id }}" name="address" placeholder="Enter your address" required class="block w-full mt-2 border-gray-300 rounded-md shadow-sm focus:border-blue-400 focus:ring focus:ring-blue-400 focus:ring-opacity-50">
                            </div>

                            <div class="mb-4">
                                <label for="postal_code_{{ $productService->id }}" class="block text-gray-700">Kode Pos</label>
                                <input type="text" id="postal_code_{{ $productService->id }}" name="postal_code" placeholder="Enter your postal code" required class="block w-full mt-2 border-gray-300 rounded-md shadow-sm focus:border-blue-400 focus:ring focus:ring-blue-400 focus:ring-opacity-50">
                            </div>

                            <div class="mb-4">
                                <label for="phoneNumber_{{ $productService->id }}" class="block text-gray-700">Nomor Telepon</label>
                                <input type="text" id="phoneNumber_{{ $productService->id }}" name="phoneNumber" placeholder="Enter your phone number" required class="block w-full mt-2 border-gray-300 rounded-md shadow-sm focus:border-blue-400 focus:ring focus:ring-blue-400 focus:ring-opacity-50">
                            </div>

                            <input type="hidden" name="total_price" value="{{ $productService->ServicePrice }}">
                            <input type="hidden" name="status" value="Pending">

                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4">Confirm Order</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<script>
    // Fungsi untuk membuka modal
    function openModal(productId) {
        var modal = document.getElementById("myModal_" + productId);
        modal.classList.remove("hidden");
        modal.classList.add("flex");
    }

    // Fungsi untuk menutup modal
    function closeModal(productId) {
        var modal = document.getElementById("myModal_" + productId);
        modal.classList.remove("flex");
        modal.classList.add("hidden");
    }
</script>
<x-layouts.app :title="__('Dashboard')">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-700 dark:text-white">Detail Produk</h2>
        <a class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-lg shadow-md transition duration-300 ease-in-out" href="{{ route('products.index') }}"> Kembali</a>
    </div>

    <div class="space-y-4">
        <div class="p-4 border-b">
            <strong class="text-gray-600 dark:text-white font-medium">Nama Produk:</strong>
            <p class="text-gray-800 dark:text-white text-lg">{{ $product->name }}</p>
        </div>
        <div class="p-4 border-b">
            <strong class="text-gray-600 dark:text-white font-medium">Deskripsi:</strong>
            <p class="text-gray-800 dark:text-white text-lg">{{ $product->description }}</p>
        </div>
        <div class="p-4">
            <strong class="text-gray-600 dark:text-white font-medium">Harga:</strong>
            <p class="text-gray-800 dark:text-white text-lg">Rp {{ number_format($product->price, 2, ',', '.') }}</p>
        </div>
    </div>
</x-layouts.app>
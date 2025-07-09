<x-layouts.app :title="__('Dashboard')">
    <div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold text-gray-700 dark:text-white">Edit Produk</h2>
    <a class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-lg shadow-md transition duration-300 ease-in-out" href="{{ route('products.index') }}"> Kembali</a>
</div>

@if ($errors->any())
    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-md shadow" role="alert">
        <strong>Ups!</strong> Ada masalah dengan input Anda.<br><br>
        <ul class="list-disc ml-5">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('products.update', $product->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="space-y-4">
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-white">Nama Produk</label>
            <input type="text" name="name" id="name" class="mt-1 block w-full px-3 py-2 bg-white dark:bg-zinc-800 border border-gray-300 rounded-md shadow-sm placeholder-gray-600 text-black dark:text-white focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ $product->name }}">
        </div>

        <div>
            <label for="description" class="block text-sm font-medium text-gray-700 dark:text-white">Deskripsi</label>
            <textarea name="description" id="description" rows="4" class="mt-1 block w-full px-3 py-2 bg-white dark:bg-zinc-800 border border-gray-300 rounded-md shadow-sm placeholder-gray-600 text-black dark:text-white focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">{{ $product->description }}</textarea>
        </div>

        <div>
            <label for="price" class="block text-sm font-medium text-gray-700 dark:text-white">Harga</label>
            <div class="mt-1 relative rounded-md shadow-sm">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <span class="text-gray-500 dark:text-white sm:text-sm">Rp</span>
                </div>
                <input type="number" name="price" id="price" class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ $product->price }}">
            </div>
        </div>

        <div class="text-right">
            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-300">
                Perbarui
            </button>
        </div>
    </div>
</form>
</x-layouts.app>
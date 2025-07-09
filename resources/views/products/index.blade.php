<x-layouts.app :title="__('Dashboard')">
    <div class="flex justify-between items-center mb-6">
        <div class="w-full">
            <h2 class="text-2xl font-bold text-gray-700 dark:text-white">CRUD Produk Sederhana dengan Tailwind</h2>
        </div>
        <div class="w-full text-right">
            <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg shadow-md transition duration-300 ease-in-out" href="{{ route('products.create') }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                Buat Produk Baru
            </a>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-md shadow" role="alert">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="overflow-x-auto bg-white dark:bg-zinc-800 rounded-lg shadow">
        <table class="min-w-full leading-normal">
            <thead>
                <tr class="border-b-2 border-gray-200 bg-gray-50 dark:bg-zinc-700 text-left text-xs font-semibold text-gray-600 dark:text-white uppercase tracking-wider">
                    <th class="px-5 py-3">No</th>
                    <th class="px-5 py-3">Nama</th>
                    <th class="px-5 py-3">Deskripsi</th>
                    <th class="px-5 py-3">Harga</th>
                    <th class="px-5 py-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php $i = ($products->currentPage() - 1) * $products->perPage(); @endphp
                @foreach ($products as $product)
                <tr class="border-b border-gray-200 hover:bg-gray-50 dark:hover:bg-zinc-700">
                    <td class="px-5 py-4 text-sm">{{ ++$i }}</td>
                    <td class="px-5 py-4 text-sm">{{ $product->name }}</td>
                    <td class="px-5 py-4 text-sm">{{ Str::limit($product->description, 50) }}</td>
                    <td class="px-5 py-4 text-sm">Rp {{ number_format($product->price, 2, ',', '.') }}</td>
                    <td class="px-5 py-4 text-sm text-center">
                        <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                            <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-3 rounded-full text-xs shadow transition duration-300" href="{{ route('products.show', $product->id) }}">Lihat</a>
                            <a class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-3 rounded-full text-xs shadow transition duration-300" href="{{ route('products.edit',$product->id) }}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded-full text-xs shadow transition duration-300" onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {!! $products->links() !!}
    </div>
</x-layouts.app>
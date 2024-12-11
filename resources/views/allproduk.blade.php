<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-900">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" rel="stylesheet" />
    <title>SigmaGem Consign</title>
</head>

<body class="h-full">
    <x-navbar></x-navbar>

    <div class="h-full max-w-7xl mx-auto py-6 mt-20">
        <!-- Hapus akses $category, tampilkan judul All Products -->
        <h1 class="text-3xl font-bold text-white mb-6">All Products</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach ($products as $product)
                <a href="{{ route('product.detail', $product->id) }}"
                    class="bg-gray-800 shadow-md border border-transparent hover:border-purple-600 rounded-lg overflow-hidden block">
                    <img src="{{ asset('storage/' . $product->sisi_depan) }}" alt="{{ $product->nama_produk }}"
                        class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h2 class="text-white font-semibold text-lg">{{ $product->nama_produk }}</h2>
                        <p class="text-gray-300 font-bold">Rp{{ number_format($product->harga, 0, ',', '.') }}</p>
                        <span
                            class="bg-green-600 text-white text-xs font-semibold px-2 py-1 mt-2 inline-block">{{ $product->kondisi_barang }}</span>
                        <p class="text-sm text-gray-400 mt-2">{{ $product->created_at->diffForHumans() }}</p>
                    </div>
                </a>
            @endforeach
        </div>
    </div>

    <x-footer></x-footer>
    @vite('resources/js/app.js')

</body>

</html>
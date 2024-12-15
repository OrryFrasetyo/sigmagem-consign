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
        <h1 class="text-3xl font-bold text-white mb-6">All Products</h1>

        <!-- Menampilkan pesan jika produk tidak ditemukan -->
        @if ($products->isEmpty())
            <p class="text-center text-lg text-gray-400">Maaf, tidak ada produk yang ditemukan. Silakan coba pencarian
                lainnya.</p>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach ($products as $product)
                    <div
                        class="bg-gray-800 shadow-md border border-transparent rounded-lg overflow-hidden block relative">
                        @if ($product->stok == 0)
                            <span
                                class="absolute top-2 left-2 bg-red-600 text-white text-xs font-semibold px-2 py-1 z-10">Produk
                                Habis</span>
                        @endif

                        <a href="{{ $product->stok == 0 ? '#' : route('product.detail', $product->id) }}"
                            class="block @if ($product->stok == 0) pointer-events-none cursor-not-allowed @endif">
                            <div class="@if ($product->stok == 0) opacity-50 @endif">
                                <img src="{{ asset('storage/' . $product->sisi_depan) }}"
                                    alt="{{ $product->nama_produk }}" class="w-full h-48 object-cover">
                                <div class="p-4">
                                    <h2 class="text-white font-semibold text-lg">{{ $product->nama_produk }}</h2>
                                    <p class="text-gray-300 font-bold">
                                        Rp{{ number_format($product->harga, 0, ',', '.') }}</p>
                                    <span
                                        class="bg-green-600 text-white text-xs font-semibold px-2 py-1 mt-2 inline-block">{{ $product->kondisi_barang }}</span>
                                    <p class="text-sm text-gray-400 mt-2">{{ $product->created_at->diffForHumans() }}
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        @endif
    </div>


    <x-footer></x-footer>
    @vite('resources/js/app.js')

</body>

</html>

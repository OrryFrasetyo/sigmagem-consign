    <!DOCTYPE html>
    <html lang="en" class="h-full bg-gray-900">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        @vite('resources/css/app.css')
        @vite('resources/js/app.js')
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
        <!-- Ganti skrip Font Awesome dengan CDN alternatif -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.2/dist/sweetalert2.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&amp;display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
        <title>rojeconsign</title>

    </head>

    <body class="h-full">

        <!-- Navbar -->
        <x-navbar class="x-navbar"></x-navbar>


        <div class="container mx-auto px-4 py-8 mt-28">
            <h1 class="text-2xl font-bold text-white mb-6">Riwayat Penjualan</h1>
            @if ($transactions->isEmpty())
                <div class="bg-gray-800 rounded-lg shadow-md p-6 text-center">
                    <h2 class="text-white text-lg font-semibold">Belum ada penjualan yang tercatat.</h2>
                </div>
            @else
                @foreach ($transactions as $transaction)
                    @php
                        $customer = $transaction->product->customer ?? null;
                        $product = $transaction->product ?? null;
                    @endphp
                    <div class="bg-gray-800 rounded-lg shadow-md p-4 relative mb-6">
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center">
                                <div class="text-white font-semibold">
                                    {{ $customer->full_name ?? 'Customer tidak ditemukan' }}
                                </div>
                            </div>
                            <div class="text-purple-600 font-semibold">
                                {{ $transaction->status_produk }}
                            </div>
                        </div>
                        <div class="flex mb-4">
                            @if ($product)
                                <img alt="Product Image" class="w-20 h-20 object-cover rounded mr-4"
                                    src="{{ asset('storage/' . $product->sisi_depan) }}" height="100"
                                    width="100" />
                                <div class="flex-1">
                                    <div class="text-white font-semibold">
                                        {{ $product->nama_produk }}
                                    </div>
                                    <div class="text-gray-400 text-sm">
                                        {{ $product->kondisi_barang }}
                                    </div>
                                    <div class="text-gray-400 text-sm">
                                        x{{ $transaction->quantity }}
                                    </div>
                                </div>
                            @else
                                <div class="text-gray-400 text-sm">
                                    Produk tidak ditemukan.
                                </div>
                            @endif
                        </div>
                        <div class="absolute bottom-4 right-4 text-right">
                            @if ($product)
                                <div class="text-purple-600 font-semibold">
                                    Rp{{ number_format($product->harga, 0, ',', '.') }}
                                </div>
                                <div class="text-white font-semibold">
                                    Total {{ $transaction->quantity }} produk :
                                    Rp{{ number_format($transaction->total_harga - 30000, 0, ',', '.') }}
                                </div>
                                <div class="text-gray-400 text-sm">
                                    Pembeli: {{ $transaction->customer->full_name ?? 'Nama tidak tersedia' }}
                                </div>
                            @else
                                <div class="text-gray-400 font-semibold">
                                    Total harga tidak tersedia.
                                </div>
                            @endif
                        </div>

                    </div>
                @endforeach
            @endif
        </div>


        <x-footer />
        @vite('resources/js/app.js')

    </html>

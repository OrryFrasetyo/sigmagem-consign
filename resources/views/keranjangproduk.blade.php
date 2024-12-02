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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>SigmaGem Consign</title>
</head>

<!-- keranjangproduk.blade.php -->

<body class="h-full">
    <x-navbar class="x-navbar"></x-navbar>
    <div class="max-w-6xl mx-auto p-4">
        <!-- Header -->
        <div class="flex items-center justify-between mb-4 mt-20 text-white">
            <h1 class="text-2xl font-semibold">Cart</h1>
            <a href="/wishlist">
                <i class="far fa-heart text-2xl"></i>
            </a>
        </div>

        <!-- Cart Items -->
        <div class="space-y-4">
            @if ($cartItems->isEmpty())
                <p class="text-center text-white font-semibold">No products in your cart.</p>
            @else
                @foreach ($cartItems as $cartItem)
                    <div class="bg-gray-900 text-white shadow-md rounded-lg p-4 ml-4 relative">
                        <div class="flex items-start space-x-4">
                            <input type="checkbox" class="mt-1" data-product-id="{{ $cartItem['product_id'] }}" />

                            <!-- Menampilkan nama customer -->
                            @if (isset($cartItem['product']['customer']))
                                <p class="font-semibold">{{ $cartItem['product']['customer']['full_name'] }}</p>
                            @else
                                <p class="font-semibold">Customer Tidak Ditemukan</p>
                            @endif
                        </div>

                        <div class="mt-4">
                            <div class="flex items-start space-x-4 mt-2 ml-4">
                                <input class="mt-1" type="checkbox" data-product-id="{{ $cartItem['product_id'] }}" />

                                <!-- Menampilkan informasi produk -->
                                @if (isset($cartItem['product']))
                                    <img alt="{{ $cartItem['product']['nama_produk'] }}" class="w-32 h-32 object-cover"
                                        src="{{ asset('storage/' . $cartItem['product']['sisi_depan']) }}"
                                        width="128" height="128" />
                                    <div>
                                        <p>{{ $cartItem['product']['nama_produk'] }}</p>
                                        <p class="font-semibold">Rp
                                            {{ number_format($cartItem['product']['harga'], 0, ',', '.') }}</p>
                                        <p class="text-gray-500">Stok: {{ $cartItem['product']['stok'] }}</p>
                                        <i class="far fa-heart mt-2"></i>
                                    </div>
                                @else
                                    <p>Produk Tidak Ditemukan</p>
                                @endif
                            </div>
                        </div>

                        <!-- Menambahkan pengurangan dan penambahan quantity -->
                        <div class="absolute bottom-4 right-4 flex items-center space-x-2">
                            <div class="flex items-center space-x-2">
                                <button type="button" class="p-2 bg-gray-700 text-white rounded decrease"
                                    data-id="{{ $cartItem['id'] }}" {{ $cartItem['quantity'] <= 1 ? 'disabled' : '' }}>
                                    -
                                </button>
                                <span id="quantity-{{ $cartItem['id'] }}">{{ $cartItem['quantity'] }}</span>
                                <button type="button" class="p-2 bg-gray-700 text-white rounded increase"
                                    data-id="{{ $cartItem['id'] }}"
                                    {{ $cartItem['quantity'] >= $cartItem['product']['stok'] ? 'disabled' : '' }}>
                                    +
                                </button>

                                <!-- Tombol untuk menghapus produk dari keranjang -->
                                <form action="{{ route('cart.remove', $cartItem['id']) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-2 bg-gray-700 text-white rounded">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="border-t border-gray-200"></div>
                @endforeach
            @endif
        </div>


        <!-- Footer -->
        <div class="bg-gray-900 text-white shadow-md rounded-lg p-4 mt-4 flex items-center justify-between ml-4">
            <div class="flex items-center space-x-2">
                <input type="checkbox" id="select-all" />
                <span>Pilih Semua</span>
            </div>
            <div class="flex items-center space-x-4">
                <div id="cart-total">
                    Total: Rp
                    {{ number_format($cartItems->sum(function ($item) {return $item->product->harga * $item->quantity;}),0,',','.') }}
                </div>
                <button class="px-4 py-2 bg-purple-600 text-white rounded">
                    Beli
                </button>
            </div>
        </div>
    </div>

    <x-footer />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Fungsi untuk menangani pengurangan jumlah produk
        $('.decrease').click(function(event) {
            event.preventDefault();
            var cartItemId = $(this).data('id');
            var url = '/cart/' + cartItemId + '/decrease';

            // Mengambil nilai quantity yang ditampilkan di UI sebelum mengirim data ke server
            var currentQuantity = parseInt($('#quantity-' + cartItemId).text()); // Ambil jumlah yang ditampilkan
            var data = {
                _token: '{{ csrf_token() }}',
                quantity: currentQuantity - 1 // Kurangi 1 untuk pengurangan
            };

            $.ajax({
                type: 'PATCH',
                url: url,
                data: data, // Kirim data yang sudah diperbarui
                success: function(response) {
                    // Update jumlah produk di UI
                    $('#quantity-' + cartItemId).text(response.quantity);

                    // Update tombol disable/enable setelah pengurangan
                    if (response.quantity <= 1) {
                        $('.decrease[data-id="' + cartItemId + '"]').prop('disabled', true);
                    } else {
                        $('.decrease[data-id="' + cartItemId + '"]').prop('disabled', false);
                    }

                    // Update tombol disable/enable untuk penambahan
                    if (response.quantity >= response.product_stok) {
                        $('.increase[data-id="' + cartItemId + '"]').prop('disabled', true);
                    } else {
                        $('.increase[data-id="' + cartItemId + '"]').prop('disabled', false);
                    }

                    // Update total harga
                    $('#cart-total').text('Total: Rp ' + response.total.toLocaleString());
                },
                error: function(xhr, status, error) {
                    console.error("AJAX Error: " + status + ": " + error);
                }
            });
        });

        // Fungsi untuk menangani penambahan jumlah produk
        $('.increase').click(function(event) {
            event.preventDefault();
            var cartItemId = $(this).data('id');
            var url = '/cart/' + cartItemId + '/increase';

            // Mengambil nilai quantity yang ditampilkan di UI sebelum mengirim data ke server
            var currentQuantity = parseInt($('#quantity-' + cartItemId).text()); // Ambil jumlah yang ditampilkan
            var data = {
                _token: '{{ csrf_token() }}',
                quantity: currentQuantity + 1 // Tambahkan 1 untuk penambahan
            };

            $.ajax({
                type: 'PATCH',
                url: url,
                data: data, // Kirim data yang sudah diperbarui
                success: function(response) {
                    // Update jumlah produk di UI
                    $('#quantity-' + cartItemId).text(response.quantity);

                    // Update tombol disable/enable setelah penambahan
                    if (response.quantity >= response.product_stok) {
                        $('.increase[data-id="' + cartItemId + '"]').prop('disabled', true);
                    } else {
                        $('.increase[data-id="' + cartItemId + '"]').prop('disabled', false);
                    }

                    // Update tombol disable/enable untuk pengurangan
                    if (response.quantity <= 1) {
                        $('.decrease[data-id="' + cartItemId + '"]').prop('disabled', true);
                    } else {
                        $('.decrease[data-id="' + cartItemId + '"]').prop('disabled', false);
                    }

                    // Update total harga
                    $('#cart-total').text('Total: Rp ' + response.total.toLocaleString());
                },
                error: function(xhr, status, error) {
                    console.error("AJAX Error: " + status + ": " + error);
                }
            });
        });
    </script>
</body>

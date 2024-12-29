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
    <title>rojeconsign</title>
</head>

<!-- keranjangproduk.blade.php -->

<body class="h-full">
    <x-navbar class="x-navbar"></x-navbar>
    <div class="max-w-6xl mx-auto p-4">
        <!-- Header -->
        <div class="flex items-center justify-between mb-4 mt-20 text-white">
            <h1 class="text-2xl font-semibold">Cart</h1>
            <a href="/wishlist">
                <i class="far fa-heart text-2xl hover:text-white hover:bg-red-600 p-1 rounded-full overflow-hidden"></i>
            </a>
        </div>

        <!-- Cart Items -->
        <div class="space-y-4">
            @if ($cartItems->isEmpty())
                <p class="text-center text-white font-semibold">No products in your cart.</p>
            @else
                @php
                    // Mengelompokkan item berdasarkan nama pengupload
                    $groupedCartItems = $cartItems->groupBy(
                        fn($item) => $item['product']['customer']['full_name'] ?? 'Unknown',
                    );
                @endphp

                @foreach ($groupedCartItems as $customerName => $items)
                    <div class="bg-gray-800 text-white shadow-md rounded-lg p-4 ml-4 relative">
                        <h2 class="font-semibold text-lg mb-4">{{ $customerName }}</h2>

                        @foreach ($items as $cartItem)
                            <div class="relative p-4 rounded-lg mt-4">
                                <div class="flex items-start space-x-4">
                                    <input type="checkbox" class="product-checkbox" data-id="{{ $cartItem['id'] }}"
                                        data-price="{{ $cartItem['product']['harga'] }}"
                                        data-name="{{ $cartItem['product']['nama_produk'] }}"
                                        data-quantity="{{ $cartItem['quantity'] }}" />

                                    @if (isset($cartItem['product']))
                                        <!-- Membuat produk menjadi link ke detail produk -->
                                        <a href="{{ route('product.detail', $cartItem['product']['id']) }}"
                                            class="flex items-center space-x-4">
                                            <img alt="{{ $cartItem['product']['nama_produk'] }}"
                                                class="w-32 h-32 object-cover"
                                                src="{{ asset('storage/' . $cartItem['product']['sisi_depan']) }}"
                                                width="128" height="128" />
                                            <div class="flex flex-col">
                                                <!-- Menambahkan ukuran font agar lebih besar -->
                                                <p class="text-md font-medium">{{ $cartItem['product']['nama_produk'] }}
                                                </p>
                                                <p class="font-semibold text-md">Rp
                                                    {{ number_format($cartItem['product']['harga'], 0, ',', '.') }}</p>
                                                <p class="text-gray-500 text-sm">Stok:
                                                    {{ $cartItem['product']['stok'] }}</p>
                                            </div>
                                        </a>
                                    @else
                                        <p>Produk Tidak Ditemukan</p>
                                    @endif
                                </div>

                                <div class="absolute bottom-4 right-4 flex items-center space-x-2">
                                    <button type="button" class="p-2 bg-gray-700 text-white rounded decrease"
                                        data-id="{{ $cartItem['id'] }}"
                                        {{ $cartItem['quantity'] <= 1 ? 'disabled' : '' }}>
                                        -
                                    </button>
                                    <span id="quantity-{{ $cartItem['id'] }}">{{ $cartItem['quantity'] }}</span>
                                    <button type="button" class="p-2 bg-gray-700 text-white rounded increase"
                                        data-id="{{ $cartItem['id'] }}"
                                        {{ $cartItem['quantity'] >= $cartItem['product']['stok'] ? 'disabled' : '' }}>
                                        +
                                    </button>

                                    <form action="{{ route('cart.remove', $cartItem['id']) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2 bg-gray-700 text-white rounded">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="border-t border-gray-200"></div>
                @endforeach
            @endif
        </div>


        <!-- Footer -->
        <div class="bg-gray-900 text-white shadow-md rounded-lg p-4 mt-4 flex justify-between items-center ml-4">
            <div class="flex-1">
                <!-- Konten kiri bisa diisi jika diperlukan -->
            </div>

            <div class="flex items-center space-x-4">
                <div id="cart-total" class="font-semibold">
                    Total: Rp 0
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
        // Fungsi untuk menghitung total harga hanya untuk produk yang dicentang
        function updateTotalPrice() {
            let total = 0;

            // Iterasi semua checkbox yang dicentang
            $('.product-checkbox:checked').each(function() {
                let cartItemId = $(this).data('id');
                let price = $(this).data('price');
                let quantity = parseInt($('#quantity-' + cartItemId)
                    .text()); // Ambil jumlah produk yang ditampilkan

                // Menambahkan harga * quantity ke total
                total += price * quantity;
            });

            // Update total harga di UI
            $('#cart-total').text('Total: Rp ' + total.toLocaleString());
        }

        // Fungsi untuk menangani perubahan checkbox
        $(document).on('change', '.product-checkbox', function() {
            // Jika checkbox dicentang
            if ($(this).is(':checked')) {
                // Nonaktifkan semua checkbox lainnya
                $('.product-checkbox').not(this).prop('checked', false);

                // Update total harga hanya untuk checkbox yang aktif
                updateTotalPrice();
            } else {
                // Jika semua checkbox tidak dicentang, set total harga menjadi 0
                updateTotalPrice();
            }
        });

        // Fungsi untuk memastikan hanya satu produk dapat dicentang
        $(document).on('click', '.product-checkbox', function(event) {
            // Jika sudah ada checkbox yang dicentang
            if ($('.product-checkbox:checked').length > 0 && !$(this).is(':checked')) {
                alert('Hanya satu produk yang dapat dipilih.');
            }
        });

        // Fungsi untuk menangani pengurangan atau penambahan jumlah produk
        $(document).on('click', '.increase, .decrease', function(event) {
            event.preventDefault();
            let cartItemId = $(this).data('id');
            let action = $(this).hasClass('increase') ? 'increase' : 'decrease';
            let currentQuantity = parseInt($('#quantity-' + cartItemId).text());

            // Tentukan URL berdasarkan tindakan
            let url = '/cart/' + cartItemId + '/' + action;

            // Kirim AJAX ke server
            $.ajax({
                type: 'PATCH',
                url: url,
                data: {
                    _token: '{{ csrf_token() }}',
                    quantity: action === 'increase' ? currentQuantity + 1 : currentQuantity - 1,
                },
                success: function(response) {
                    // Update jumlah produk di UI
                    $('#quantity-' + cartItemId).text(response.quantity);

                    // Atur tombol disable/enable berdasarkan stok dan quantity
                    $('.decrease[data-id="' + cartItemId + '"]').prop('disabled', response.quantity <=
                        1);
                    $('.increase[data-id="' + cartItemId + '"]').prop('disabled', response.quantity >=
                        response.product_stok);

                    // Update total harga hanya untuk produk yang dicentang
                    updateTotalPrice();
                },
                error: function(xhr, status, error) {
                    console.error("AJAX Error: " + status + ": " + error);
                }
            });
        });

        // Panggil fungsi ini untuk menghitung total harga awal
        updateTotalPrice();
    </script>

</body>

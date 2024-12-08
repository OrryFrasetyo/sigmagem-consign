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
    <!-- Link ke Animate.css CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">


    <title>SigmaGem Consign</title>
</head>

<body class="h-full">

    <!-- Navbar -->
    <x-navbar class="x-navbar"></x-navbar>

    <div x-data="{ currentImage: '{{ asset('storage/' . $product->sisi_depan) }}' }" class="max-w-8xl mx-auto p-6 bg-gray-800 rounded-lg shadow-md mt-20 text-white">
        <div class="flex">
            <!-- Left Section: Gambar -->
            <div class="w-1/2">
                <!-- Gambar Preview Besar -->
                <div class="relative">
                    <img :src="currentImage" alt="Preview Gambar" class="w-full h-full rounded-lg object-cover">
                </div>

                <!-- Gambar Kecil di Bawah -->
                <div class="flex mt-4 space-x-4">
                    <!-- Sisi Depan -->
                    <img @click="currentImage = '{{ asset('storage/' . $product->sisi_depan) }}'"
                        src="{{ asset('storage/' . $product->sisi_depan) }}" alt="Sisi Depan"
                        class="w-20 h-20 rounded-lg border-2 border-gray-500 cursor-pointer hover:border-purple-600 object-cover">

                    <!-- Sisi Kanan -->
                    <img @click="currentImage = '{{ asset('storage/' . $product->sisi_kanan) }}'"
                        src="{{ asset('storage/' . $product->sisi_kanan) }}" alt="Sisi Kanan"
                        class="w-20 h-20 rounded-lg border-2 border-gray-500 cursor-pointer hover:border-purple-600 object-cover">

                    <!-- Sisi Atas -->
                    <img @click="currentImage = '{{ asset('storage/' . $product->sisi_atas) }}'"
                        src="{{ asset('storage/' . $product->sisi_atas) }}" alt="Sisi Atas"
                        class="w-20 h-20 rounded-lg border-2 border-gray-500 cursor-pointer hover:border-purple-600 object-cover">

                    <!-- Lainnya -->
                    <img @click="currentImage = '{{ asset('storage/' . $product->lainnya) }}'"
                        src="{{ asset('storage/' . $product->lainnya) }}" alt="Lainnya"
                        class="w-20 h-20 rounded-lg border-2 border-gray-500 cursor-pointer hover:border-purple-600 object-cover">
                </div>
            </div>


            <!-- Right Section: Product Details -->
            <div class="w-1/2 pl-10">
                <h1 class="text-2xl font-bold">
                    {{ $product->nama_produk }}
                </h1>
                <p class="text-gray-300 mt-2">
                    Dilihat {{ $product->views }} kali
                </p>
                {{-- <div class="flex items-center mt-4"> --}}
                <p class="text-3xl font-bold">
                    Rp{{ number_format($product->harga, 0, ',', '.') }}
                </p>
                <span
                    class="bg-green-600 text-white text-xs font-semibold px-2 py-1 mt-2 inline-block">{{ $product->kondisi_barang }}</span>
                {{-- </div> --}}

                <div class="mt-6">
                    <div class="flex items-center mt-2">
                        <img alt="Profile Picture" class="w-12 h-12 rounded-full" height="100"
                            src="https://storage.googleapis.com/a1aa/image/OlwfXutxW6VOTCsn0u1MLegsy3KRQ2OGWs0E2gffcudOL7QPB.jpg"
                            width="100" />
                        <div class="ml-4">
                            <p class="font-semibold">
                                {{ $product->customer->full_name ?? '-' }}
                            </p>

                            <p class="text-gray-300">
                                Kota
                            </p>
                        </div>
                    </div>
                </div>
                <div class="mt-6">
                    <h2 class="text-lg font-semibold">
                        Detail Produk
                    </h2>
                    <ul class="list-disc list-inside text-gray-300 mt-2">
                        <li>
                            Garansi: {{ $product->garansi ?? 'Tidak ada informasi' }}
                        </li>
                        <li>
                            Stok: {{ $product->stok }} unit
                        </li>
                        <li>
                            Berat: {{ number_format($product->berat) }} gram
                        </li>
                    </ul>
                </div>

                <div class="mt-2">
                    <table class="w-full text-left text-gray-300">
                        <tbody>
                            <tr class="border-b border-gray-600">
                                <td class="py-2">
                                    Tanggal Publish
                                </td>
                                <td class="py-2">
                                    {{ \Carbon\Carbon::parse($product->created_at)->translatedFormat('d F Y') }}
                                </td>
                            </tr>
                            <tr class="border-b border-gray-600">
                                <td class="py-2">
                                    Kategori
                                </td>
                                <td class="py-2">
                                    <a href="{{ route('products.by-category', $product->category->id) }}"
                                        class="text-gray-300 hover:text-purple-600 transition-colors duration-300">
                                        {{ $product->category->nama_kategori ?? 'Tidak ada kategori' }}
                                    </a>
                                </td>

                            </tr>
                        </tbody>

                    </table>
                </div>
                <div class="mt-6">
                    <h2 class="text-lg font-semibold">
                        Produk Description
                    </h2>
                    <ul class="list-disc list-inside text-gray-300 mt-2">
                        <li>
                            Lama Pemakaian: {{ $product->lama_pemakaian ?? '-' }}
                        </li>
                        <li>
                            Tangan ke: {{ $product->tangan_ke ?? '-' }}
                        </li>
                        <li>
                            Waktu Pembelian: {{ $product->waktu_pembelian ?? '-' }}
                        </li>
                        <li>
                            Kelengkapan: {{ $product->kelengkapan ?? '-' }}
                        </li>
                        <li>
                            Minus: {{ $product->minus ?? '-' }}
                        </li>
                        <li>
                            Konektivitas: {{ $product->wireless ?? '-' }}
                        </li>
                        <li>
                            Suara Aman: {{ $product->suara_aman ?? '-' }}
                        </li>
                    </ul>
                </div>

                <div class="mt-6 flex items-center space-x-4">
                    <form action="{{ route('cart.add', $product->id) }}" method="POST">
                        @csrf

                        <!-- Tombol Add to Cart -->
                        <button type="submit"
                            class="px-6 py-2 bg-blue-600 text-white rounded-lg transition-all hover:scale-105">
                            Add to Cart
                        </button>
                    </form>

                    <button class="px-6 py-2 bg-gray-600 text-white rounded-lg transition-all hover:scale-105 hover:bg-green-600">
                        Buy Now
                    </button>

                    <!-- Tombol Wishlist -->
                    <button id="wishlist-toggle"
                        class="px-6 py-2 rounded-lg flex items-center transition-all
        {{ $isInWishlist ? 'bg-red-500 text-white' : 'bg-yellow-500 text-white' }}
        hover:scale-105"
                        data-id="{{ $product->id }}">
                        <i class="fas fa-heart mr-2"></i>
                        <span>
                            {{ $isInWishlist ? 'Remove from Wishlist' : 'Add to Wishlist' }}
                        </span>
                    </button>






                </div>
            </div>
        </div>
    </div>


    <x-footer />
    @vite('resources/js/app.js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.2/dist/sweetalert2.min.js"></script>
    <script>
        document.querySelectorAll('#wishlist-toggle').forEach(button => {
            button.addEventListener('click', function() {
                const productId = this.dataset.id;
                const isInWishlist = this.classList.contains('bg-red-500'); // Cek status wishlist

                fetch(isInWishlist ? "{{ route('wishlist.remove', '') }}/" + productId :
                        "{{ route('wishlist.add') }}", {
                            method: isInWishlist ? 'DELETE' : 'POST',
                            headers: {
                                "Content-Type": "application/json",
                                "X-CSRF-TOKEN": "{{ csrf_token() }}"
                            },
                            body: JSON.stringify({
                                id: productId
                            })
                        })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Update tombol dan kelas warna berdasarkan status
                            this.classList.toggle('bg-red-500');
                            this.classList.toggle('bg-yellow-500');
                            this.querySelector('span').textContent = isInWishlist ? 'Add to Wishlist' :
                                'Remove from Wishlist';

                            // Tampilkan SweetAlert dengan pesan sukses dan animasi
                            Swal.fire({
                                title: data.message,
                                icon: 'success',
                                showClass: {
                                    popup: 'animate__animated animate__fadeInUp animate__faster'
                                },
                                hideClass: {
                                    popup: 'animate__animated animate__fadeOutDown animate__faster'
                                },
                                background: '#1a202c',
                                color: '#fff',
                                showConfirmButton: false,
                                timer: 1500
                            });
                        } else {
                            // Tampilkan SweetAlert dengan pesan error dan animasi
                            Swal.fire({
                                title: data.message,
                                icon: 'error',
                                showClass: {
                                    popup: 'animate__animated animate__fadeInUp animate__faster'
                                },
                                hideClass: {
                                    popup: 'animate__animated animate__fadeOutDown animate__faster'
                                },
                                background: '#1a202c',
                                color: '#fff',
                                showConfirmButton: false,
                                timer: 1500
                            });
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        Swal.fire({
                            title: 'Gagal memproses permintaan.',
                            icon: 'error',
                            background: '#1a202c',
                            color: '#fff',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    });
            });
        });
    </script>


</body>

</html>

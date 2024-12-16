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
    <title>SigmaGem Consign</title>
</head>

<body class="h-full">

    <!-- Navbar -->
    <x-navbar class="x-navbar"></x-navbar>

    <!-- Swiper Carousel -->
    <div class="w-full relative progress-slide-carousel">
        <div class="swiper swiper-container relative">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="img/slider1.png" alt="Slide 1" class="w-full h-full object-cover">
                </div>
                <div class="swiper-slide">
                    <img src="img/slider2.png" alt="Slide 2" class="w-full h-full object-cover">
                </div>
                <div class="swiper-slide">
                    <img src="img/slider3.png" alt="Slide 3" class="w-full h-full object-cover">
                </div>
            </div>
            <div class="swiper-pagination !bottom-10 !top-auto !w-[500px] right-0 mx-auto bg-gray-100"></div>
        </div>
    </div>

    <div class="ml-12 text-white font-sans">
        <h1 class="text-2xl font-bold">Hai {{ auth()->user()->full_name }}!</h1>
        <p class="text-gray-400">Selamat datang di SigmaGem Consign.</p>
    </div>

    <div class="mt-6 bg-gray-800 p-6 rounded-xl mx-12 flex justify-around space-x-4 mb-3">
        <div class="flex flex-col items-center">
            <a href="/upload-produk"
                class="border-2 border-dashed border-gray-500 p-4 rounded-lg flex items-center w-96 justify-center group hover:border-purple-600">
                <i class="fas fa-upload text-2xl text-gray-300 group-hover:text-purple-600"></i>
                <span class="ml-2 text-sm text-gray-300 group-hover:text-purple-600">Upload Produk</span>
            </a>
        </div>

        <a href="status-produk" class="flex flex-col items-center group hover:text-purple-600">
            <i class="fas fa-exchange-alt text-2xl text-gray-300 group-hover:text-purple-600"></i>
            <span class="mt-2 text-sm text-gray-300 group-hover:text-purple-600">Status Produk</span>
        </a>

        <a href="pembelian" class="flex flex-col items-center group hover:text-purple-600">
            <i class="fas fa-shopping-bag text-2xl text-gray-300 group-hover:text-purple-600"></i>
            <span class="mt-2 text-sm text-gray-300 group-hover:text-purple-600">Pembelian</span>
        </a>

        <a href="penjualan" class="flex flex-col items-center group hover:text-purple-600">
            <i class="fas fa-shopping-cart text-2xl text-gray-300 group-hover:text-purple-600"></i>
            <span class="mt-2 text-sm text-gray-300 group-hover:text-purple-600">penjualan</span>
        </a>

    </div>

    <!-- ListKategori dan Kategor -->
    <div x-data="{ selectedCategory: 'Gaming' }" class="mx-auto p-4">
        <!-- Tombol ListKategori -->
        <div class="flex overflow-hidden ml-4">
            @foreach ($listcategories as $listcategory)
                <button @click="selectedCategory = '{{ $listcategory->list_kategori }}'"
                    :class="selectedCategory === '{{ $listcategory->list_kategori }}' ? 'bg-gray-700 text-white scale-100' : ''"
                    class="text-base font-semibold text-gray-200 px-4 py-2 rounded-xl transition duration-200 ease-in-out transform hover:scale-100 hover:bg-gray-700 hover:text-white focus:bg-gray-700 focus:text-white mr-2 hover:rounded-xl">
                    {{ $listcategory->list_kategori }}
                </button>
            @endforeach
        </div>

        <!-- Section untuk menampilkan kategori yang dipilih dalam bentuk card -->
        <div class="ml-8 mr-8 mt-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach ($listcategories as $listcategory)
                @foreach ($listcategory->categories as $category)
                    <a href="{{ route('products.by-category', $category->id) }}"
                        x-show="selectedCategory === '{{ $listcategory->list_kategori }}'" x-cloak class="block">
                        <div
                            class="relative border-transparent rounded-lg overflow-hidden shadow-md transform hover:scale-105 transition duration-200 w-full">

                            <!-- Gambar Kategori -->
                            <img src="{{ Storage::url($category->gambar) }}" alt="{{ $category->nama_kategori }}"
                                class="w-full h-48 border-transparent object-cover">

                            <!-- Overlay vignette gelap di bagian bawah -->
                            <div class="absolute inset-x-0 bottom-0 h-16 bg-gradient-to-t from-black/80 to-transparent">
                            </div>

                            <!-- Overlay teks di bagian bawah kanan -->
                            <div class="absolute bottom-0 right-0 text-white text-sm font-semibold px-2 py-1 m-2">
                                {{ $category->nama_kategori }}
                            </div>
                        </div>
                    </a>
                @endforeach
            @endforeach
        </div>

    </div>

    <x-footer />
    @vite('resources/js/app.js')

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- Inisialisasi Swiper -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var swiper = new Swiper(".swiper-container", {
                loop: true,
                autoplay: {
                    delay: 3000, // Jeda antara tiap slide (3 detik)
                    disableOnInteraction: false, // Memastikan autoplay tidak berhenti jika ada interaksi
                },
                pagination: {
                    el: ".swiper-pagination",
                    type: "progressbar",
                },
                speed: 750, // Durasi transisi antar slide dalam milidetik (1000ms = 1 detik)
            });
        });
    </script>

</body>

</html>

<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-900">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />

    <title>SigmaGem Consign</title>
</head>

<body class="h-full">

    <x-navbar></x-navbar>

    <div class="mt-16">
        <div x-data="{ selectedCategory: 'Gaming' }" class="mx-auto p-4">
            <!-- Tombol Kategori -->
            <div class="flex overflow-hidden ml-4">
                @foreach ($listcategories as $listcategory)
                    <button @click="selectedCategory = '{{ $listcategory->list_kategori }}'"
                        :class="selectedCategory === '{{ $listcategory->list_kategori }}' ? 'bg-gray-700 text-white scale-100' :
                            ''"
                        class="text-base font-semibold text-gray-200 px-4 py-2 rounded-xl transition duration-200 ease-in-out transform hover:scale-100 hover:bg-gray-700 hover:text-white focus:bg-gray-700 focus:text-white mr-2 hover:rounded-xl">
                        <!-- Tambahkan 'hover:rounded' -->
                        {{ $listcategory->list_kategori }}
                    </button>
                @endforeach
            </div>

            <!-- Section untuk menampilkan kategori yang dipilih dalam bentuk card -->
            <div class="ml-8 mr-8 mt-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach ($listcategories as $listcategory)
                    @foreach ($listcategory->categories as $category)
                        <div x-show="selectedCategory === '{{ $listcategory->list_kategori }}'"
                            class="relative bg-white rounded-lg overflow-hidden shadow-md transform hover:scale-105 transition duration-200 w-full">

                            <!-- Gambar Kategori -->
                            <img src="{{ asset($category->gambar) }}" alt="{{ $category->nama_kategori }}"
                                class="w-full h-48 object-cover">

                            <!-- Overlay vignette gelap di bagian bawah -->
                            <div class="absolute inset-x-0 bottom-0 h-16 bg-gradient-to-t from-black/80 to-transparent">
                            </div>

                            <!-- Overlay teks di bagian bawah kanan -->
                            <div class="absolute bottom-0 right-0 text-white text-sm font-semibold px-2 py-1 m-2">
                                {{ $category->nama_kategori }}
                            </div>
                        </div>
                    @endforeach
                @endforeach
            </div>
        </div>
    </div>




<x-footer />
@vite('resources/js/app.js')
</body>

</html>

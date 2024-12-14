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
                        <img alt="Profile Picture" class="w-12 h-12 rounded-full"
                            src="{{ $product->customer && $product->customer->foto_profile ? asset('storage/' . $product->customer->foto_profile) : asset('profiles/default_profile.jpg') }}"
                            width="100" height="100" />
                        <div class="ml-4">
                            <p class="font-semibold">
                                {{ $product->customer->full_name ?? '-' }}
                            </p>

                            <p class="text-gray-300">
                                {{ $product->customer->kota ?? '-' }}
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

                    <!-- Tombol Buy Now -->
                    <button id="buyNowButton"
                        class="px-6 py-2 bg-gray-600 text-white rounded-lg transition-all hover:scale-105 hover:bg-green-600">
                        Buy Now
                    </button>

                    <!-- Modal Popup -->
                    <div id="checkoutModal"
                        class="fixed inset-0 p-6 bg-black bg-opacity-50 flex items-center justify-center hidden mt-20">
                        <div class="bg-gray-900 p-6 rounded-lg shadow-lg text-white relative w-full max-w-3xl">
                            <button id="closeModalButton" class="absolute top-2 right-2 text-gray-400 hover:text-white">
                                &times;
                            </button>
                            <h2 class="text-2xl font-bold mb-4">Checkout</h2>
                            <form>
                                <div class="mb-4">
                                    <label class="block text-white font-bold mb-2">Alamat Pengiriman</label>
                                    <div class="relative">
                                        <!-- Tombol Dropdown -->
                                        <button id="dropdownButton" type="button"
                                            class="w-full bg-gray-800 text-white border border-gray-700 p-3 rounded-lg text-left leading-snug">
                                            <span id="dropdownPlaceholder">Pilih Alamat</span>
                                        </button>

                                        <!-- Dropdown Menu -->
                                        <div id="dropdownMenu"
                                            class="hidden absolute w-full bg-gray-800 border border-gray-700 rounded-lg mt-1 z-10 max-h-48 overflow-y-auto">
                                            @if ($alamats->isEmpty())
                                                <div class="p-3 text-gray-400 italic">Alamat belum ditambahkan.</div>
                                            @else
                                                @foreach ($alamats as $item)
                                                    <div class="p-3 hover:bg-gray-700 cursor-pointer select-address"
                                                        data-id="{{ $item->id }}"
                                                        data-nama="{{ $item->nama_penerima }}"
                                                        data-telp="{{ $item->no_telp }}"
                                                        data-alamat="{{ $item->alamat }}"
                                                        data-detail="{{ $item->detail }}"
                                                        data-kecamatan="{{ strtoupper($item->kecamatan) }}"
                                                        data-kota="{{ strtoupper($item->kota) }}"
                                                        data-provinsi="{{ strtoupper($item->provinsi) }}"
                                                        data-kodepos="{{ $item->kode_pos }}">
                                                        <h3 class="font-bold">{{ $item->nama_penerima }} |
                                                            {{ $item->no_telp }}</h3>
                                                        <p>{{ $item->alamat }} {{ $item->detail }}</p>
                                                        <p>{{ strtoupper($item->kecamatan) }},
                                                            {{ strtoupper($item->kota) }},
                                                            {{ strtoupper($item->provinsi) }}, ID
                                                            {{ $item->kode_pos }}</p>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <script>
                                    document.addEventListener('DOMContentLoaded', function() {
                                        const dropdownButton = document.getElementById('dropdownButton');
                                        const dropdownMenu = document.getElementById('dropdownMenu');
                                        const dropdownPlaceholder = document.getElementById('dropdownPlaceholder');
                                        const addressOptions = document.querySelectorAll('.select-address');

                                        // Toggle dropdown menu
                                        dropdownButton.addEventListener('click', () => {
                                            dropdownMenu.classList.toggle('hidden');
                                        });

                                        // Pilih alamat
                                        addressOptions.forEach(option => {
                                            option.addEventListener('click', () => {
                                                const nama = option.getAttribute('data-nama');
                                                const telp = option.getAttribute('data-telp');
                                                const alamat = option.getAttribute('data-alamat');
                                                const detail = option.getAttribute('data-detail');
                                                const kecamatan = option.getAttribute('data-kecamatan');
                                                const kota = option.getAttribute('data-kota');
                                                const provinsi = option.getAttribute('data-provinsi');
                                                const kodepos = option.getAttribute('data-kodepos');

                                                // Format alamat yang terpilih
                                                const selectedAddress = `
                    <h3 class="font-bold">${nama} | ${telp}</h3>
                    <p>${alamat} ${detail}</p>
                    <p>${kecamatan}, ${kota}, ${provinsi}, ID ${kodepos}</p>
                `;

                                                // Update tombol dropdown
                                                dropdownPlaceholder.innerHTML = selectedAddress;

                                                // Tutup dropdown
                                                dropdownMenu.classList.add('hidden');
                                            });
                                        });

                                        // Tutup dropdown jika klik di luar
                                        document.addEventListener('click', (e) => {
                                            if (!dropdownButton.contains(e.target) && !dropdownMenu.contains(e.target)) {
                                                dropdownMenu.classList.add('hidden');
                                            }
                                        });
                                    });
                                </script>

                                <div class="mb-4">
                                    <label class="block font-bold mb-2">Produk</label>
                                    <div class="flex items-start bg-gray-800 p-4 rounded-lg shadow-md relative">
                                        <img alt="Gambar produk dengan deskripsi detail"
                                            class="w-24 h-24 object-cover rounded-lg mr-4" height="100"
                                            src="{{ Storage::url($product->sisi_depan) }}" width="100" />
                                        <div class="flex-1">
                                            <h4 class="text-lg font-bold text-white">{{ $product->nama_produk }}</h4>
                                            <p class="text-gray-300">{{ $product->kondisi_barang }}</p>
                                        </div>
                                        <div class="absolute bottom-4 right-4 text-sm">
                                            <label class="block text-white mb-1">Jumlah</label>
                                            <input type="text" pattern="\d*" min="1" value="1"
                                                class="bg-gray-700 text-center text-white rounded-lg p-1 w-12 text-sm" />
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <h3 class="font-bold">Rincian Harga</h3>
                                    <div class="flex justify-between items-center text-sm">
                                        <span class="text-gray-300">Harga Barang</span>
                                        <span class="text-gray-300" id="hargaBarang"
                                            data-harga="{{ $product->harga }}"></span>
                                    </div>
                                    <div class="flex justify-between items-center text-sm">
                                        <span class="text-gray-300">Ongkos Kirim</span>
                                        <span class="text-gray-300" id="ongkir" data-ongkir="30000"></span>
                                    </div>
                                    <div class="flex justify-between items-center font-bold text-lg mt-2">
                                        <span>Total Harga</span>
                                        <span id="totalHarga"></span>
                                    </div>
                                </div>
                                <div class="mb-6">
                                    <h3 class="block mb-2 font-bold text-white" for="file_input">Upload Bukti
                                        Pembayaran</h3>
                                    <input
                                        class="block w-full text-sm text-white  rounded-lg cursor-pointer border border-gray-800 bg-gray-900 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                        id="file_input" type="file">
                                </div>
                                <button
                                    class="w-full bg-green-500 text-white py-2 rounded-lg font-bold hover:bg-green-700 transition duration-300"
                                    type="submit">
                                    Bayar Sekarang
                                </button>
                                @if (session('error'))
                                    <div class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                @endif

                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                            </form>
                        </div>
                    </div>

                    <!-- JavaScript -->
                    <script>
                        // Element references
                        const buyNowButton = document.getElementById('buyNowButton');
                        const checkoutModal = document.getElementById('checkoutModal');
                        const closeModalButton = document.getElementById('closeModalButton');

                        // Show modal on button click
                        buyNowButton.addEventListener('click', () => {
                            checkoutModal.classList.remove('hidden');
                        });

                        // Close modal on close button click
                        closeModalButton.addEventListener('click', () => {
                            checkoutModal.classList.add('hidden');
                        });

                        // Close modal when clicking outside the modal content
                        window.addEventListener('click', (e) => {
                            if (e.target === checkoutModal) {
                                checkoutModal.classList.add('hidden');
                            }
                        });
                    </script>

                    <script>
                        // Helper untuk memformat angka ke format Rupiah
                        function formatRupiah(angka) {
                            return 'Rp ' + angka.toLocaleString('id-ID', {
                                minimumFractionDigits: 2,
                                maximumFractionDigits: 2
                            });
                        }

                        // Ambil harga barang dan ongkos kirim dari atribut data-harga
                        const hargaBarangEl = document.getElementById('hargaBarang');
                        const ongkirEl = document.getElementById('ongkir');
                        const totalHargaEl = document.getElementById('totalHarga');

                        const hargaBarang = parseFloat(hargaBarangEl.dataset.harga); // Ambil data harga
                        const ongkir = parseFloat(ongkirEl.dataset.ongkir); // Ambil data ongkir

                        // Hitung total harga
                        const totalHarga = hargaBarang + ongkir;

                        // Tampilkan hasil dengan format Rupiah
                        hargaBarangEl.textContent = formatRupiah(hargaBarang);
                        ongkirEl.textContent = formatRupiah(ongkir);
                        totalHargaEl.textContent = formatRupiah(totalHarga);
                    </script>



                    <form action="{{ route('cart.add', $product->id) }}" method="POST">
                        @csrf

                        <!-- Tombol Add to Cart -->
                        <button type="submit"
                            class="px-6 py-2 bg-blue-600 text-white rounded-lg transition-all hover:scale-105">
                            Add to Cart
                        </button>
                    </form>

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

    <div class="max-w-8xl mx-auto bg-gray-800 shadow-md rounded-lg mt-6 text-white">
        <div class="p-4 border-b border-gray-700">
            <div class="flex items-center">
                <i class="fas fa-arrow-left text-xl"></i>
                <h1 class="ml-4 text-xl font-semibold">Diskusi</h1>
            </div>
        </div>
        <div class="p-4">
            <div class="space-y-4">
                @if ($product->discussions->isEmpty())
                    <p class="text-gray-400">Belum ada diskusi.</p>
                @else
                    @foreach ($product->discussions as $discussion)
                        @if ($discussion->customer->id === auth()->user()->id)
                            {{-- If logged-in customer is the one who posted --}}
                            <div class="flex items-start space-x-3 justify-end">
                                <div>
                                    <div class="flex items-center space-x-2 justify-end">
                                        <span class="text-gray-400 text-sm">
                                            {{ $discussion->created_at->format('d M Y | H:i') }}
                                        </span>
                                        <span class="font-semibold">
                                            {{ $discussion->customer->full_name ?? 'Tidak diketahui' }}
                                            @if ($discussion->customer->id === $product->customer_id)
                                                <span class="text-green-500 text-sm">(Seller)</span>
                                            @endif
                                        </span>
                                    </div>
                                    <p class="text-right">{{ $discussion->message }}</p>
                                </div>
                                <img alt="Customer profile picture" class="w-10 h-10 rounded-full"
                                    src="{{ $discussion->customer && $discussion->customer->foto_profile
                                        ? asset('storage/' . $discussion->customer->foto_profile)
                                        : asset('profiles/default_profile.jpg') }}"
                                    width="40" height="40" />

                            </div>
                        @else
                            {{-- If the message is from another user (e.g., Seller) --}}
                            <div class="flex items-start space-x-3">
                                <img alt="Customer profile picture" class="w-10 h-10 rounded-full"
                                    src="{{ $discussion->customer && $discussion->customer->foto_profile
                                        ? asset('storage/' . $discussion->customer->foto_profile)
                                        : asset('profiles/default_profile.jpg') }}"
                                    width="40" height="40" />
                                <div>
                                    <div class="flex items-center space-x-2">
                                        <span class="font-semibold">
                                            {{ $discussion->customer->full_name ?? 'Tidak diketahui' }}
                                            @if ($discussion->customer->id === $product->customer_id)
                                                <span class="text-green-500 text-sm">(Seller)</span>
                                            @endif
                                        </span>

                                        <span class="text-gray-400 text-sm">
                                            {{ $discussion->created_at->format('d M Y | H:i') }}
                                        </span>
                                    </div>
                                    <p>{{ $discussion->message }}</p>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endif
            </div>
        </div>
        <div class="p-4 border-t border-gray-700">
            <!-- Form Diskusi -->
            <form action="{{ route('discussion.store', $product->id) }}" method="POST"
                class="flex items-center space-x-2">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <input class="flex-1 rounded-full px-4 py-2 focus:outline-none bg-gray-700 text-white"
                    placeholder="Tulis diskusi disini" type="text" name="message" required />
                <button type="submit" class="text-gray-400">
                    <i class="fas fa-paper-plane"></i>
                </button>
            </form>
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

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

    <style>
        /* Animasi untuk modal muncul */
        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: scale(0.9);
            }

            100% {
                opacity: 1;
                transform: scale(1);
            }
        }

        /* Animasi untuk modal menghilang */
        @keyframes fadeOut {
            0% {
                opacity: 1;
                transform: scale(1);
            }

            100% {
                opacity: 0;
                transform: scale(0.9);
            }
        }

        /* Apply animation pada modal */
        .modal-enter {
            animation: fadeIn 0.3s ease-out forwards;
        }

        .modal-exit {
            animation: fadeOut 0.3s ease-out forwards;
        }
    </style>
</head>

<body class="h-full">

    <!-- Navbar -->
    <x-navbar class="x-navbar"></x-navbar>


    <div class="bg-gray-900 p-6 text-white mt-20">
        <div class="max-w-4xl mx-auto bg-gray-800 p-6 rounded-lg shadow-md">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-semibold">Alamat Saya</h1>
                <button id="openModal" class="bg-purple-600 text-white px-4 py-2 rounded-lg hover:bg-purple-700">
                    <i class="fas fa-plus mr-2"></i>Tambah Alamat Baru
                </button>

            </div>
            <div class="fixed inset-0 bg-opacity-50 flex items-center justify-center hidden" id="modalAlamat">
                <div class="bg-gray-900 p-8 rounded-lg shadow-md w-full max-w-2xl">
                    <h2 class="text-2xl font-semibold mb-6 text-white">Alamat Baru</h2>
                    <form action="{{ route('alamat.store') }}" method="POST">
                        @csrf
                        <div class="grid grid-cols-1 gap-4">
                            <div class="grid grid-cols-2 gap-4">
                                <input class="border border-gray-700 bg-gray-800 text-white p-3 rounded-md w-full"
                                    name="nama_penerima" placeholder="Nama Lengkap" type="text" required />
                                <input class="border border-gray-700 bg-gray-800 text-white p-3 rounded-md w-full"
                                    name="no_telp" placeholder="Nomor Telepon" type="text" required />
                            </div>
                            <input class="border border-gray-700 bg-gray-800 text-white p-3 rounded-md w-full"
                                name="provinsi" placeholder="Provinsi" type="text" required />
                            <input class="border border-gray-700 bg-gray-800 text-white p-3 rounded-md w-full"
                                name="kota" placeholder="Kota" type="text" required />
                            <input class="border border-gray-700 bg-gray-800 text-white p-3 rounded-md w-full"
                                name="kecamatan" placeholder="Kecamatan" type="text" required />
                            <input class="border border-gray-700 bg-gray-800 text-white p-3 rounded-md w-full"
                                name="kode_pos" placeholder="Kode Pos" type="text" required />
                            <input class="border border-gray-700 bg-gray-800 text-white p-3 rounded-md w-full"
                                name="alamat" placeholder="Nama Jalan, Gedung, No. Rumah" type="text" required />
                            <input class="border border-gray-700 bg-gray-800 text-white p-3 rounded-md w-full"
                                name="detail" placeholder="Detail Lainnya (Cth: Blok / Unit No., Patokan)"
                                type="text" />
                            <div class="flex justify-end mt-6 space-x-4">
                                <button type="button"
                                    class="text-gray-500 border border-transparent hover:border-gray-500 hover:text-white p-3 rounded-md w-32"
                                    id="closeModal">Nanti Saja</button>
                                <button type="submit"
                                    class="bg-purple-600 hover:bg-purple-700 text-white p-3 rounded-md w-32">OK</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div>
                @forelse ($alamat as $item)
                    <div class="border-b border-gray-700 pb-4 mb-4">
                        <div class="flex justify-between items-center">
                            <div>
                                <h3 class="font-bold">{{ $item->nama_penerima }}</h3>
                                <p class="text-gray-400">{{ $item->no_telp }}</p>
                                <p class="text-gray-400">{{ $item->alamat }}</p>
                                <p class="text-gray-400">{{ strtoupper($item->kecamatan) }},
                                    {{ strtoupper($item->kota) }}, {{ strtoupper($item->provinsi) }}, ID,
                                    {{ $item->kode_pos }}</p>
                            </div>
                            <div class="text-right">
                                <form action="{{ route('alamat.destroy', $item->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-400">Hapus</button>
                                </form>
                                <a href="{{ route('alamat.edit', $item->id) }}" class="text-blue-400 ml-2">Ubah</a>

                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-400">Belum ada alamat yang ditambahkan.</p>
                @endforelse
            </div>
        </div>
    </div>


    <x-footer />
    @vite('resources/js/app.js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>

    <script>
        const modal = document.getElementById('modalAlamat');
        const openModal = document.getElementById('openModal');
        const closeModal = document.getElementById('closeModal');

        openModal.addEventListener('click', () => {
            modal.classList.remove('hidden'); // Menampilkan modal
            modal.classList.add('modal-enter'); // Menambahkan animasi masuk
        });

        closeModal.addEventListener('click', () => {
            modal.classList.add('modal-exit'); // Menambahkan animasi keluar
            setTimeout(() => {
                modal.classList.add('hidden'); // Sembunyikan modal setelah animasi selesai
                modal.classList.remove('modal-exit'); // Menghapus kelas animasi keluar
            }, 300); // Durasi animasi keluar (sama seperti durasi fadeOut)
        });

        // Optional: Tutup modal jika klik di luar modal
        window.addEventListener('click', (event) => {
            if (event.target === modal) {
                modal.classList.add('modal-exit'); // Menambahkan animasi keluar
                setTimeout(() => {
                    modal.classList.add('hidden');
                    modal.classList.remove('modal-exit');
                }, 300);
            }
        });
    </script>

</body>

</html>

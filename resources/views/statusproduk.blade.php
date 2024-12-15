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


    <div class="font-roboto text-white mt-20">
        <div class="container mx-auto p-4">
            <div class="bg-gray-900 shadow-md rounded-lg p-6">
                <h1 class="text-3xl font-bold mb-6 text-center">Status Produk</h1>
                <table class="min-w-full bg-gray-800 rounded-lg overflow-hidden">
                    <thead>
                        <tr>
                            <th
                                class="py-3 px-4 border-b-2 border-gray-700 bg-gray-700 text-left text-sm font-semibold text-gray-300 uppercase tracking-wider">
                                Nama Produk</th>
                            <th
                                class="py-3 px-4 border-b-2 border-gray-700 bg-gray-700 text-left text-sm font-semibold text-gray-300 uppercase tracking-wider">
                                Jumlah Produk</th>
                            <th
                                class="py-3 px-4 border-b-2 border-gray-700 bg-gray-700 text-left text-sm font-semibold text-gray-300 uppercase tracking-wider">
                                Harga Produk</th>
                            <th
                                class="py-3 px-4 border-b-2 border-gray-700 bg-gray-700 text-left text-sm font-semibold text-gray-300 uppercase tracking-wider">
                                Harga Ongkos Kirim</th>
                            <th
                                class="py-3 px-4 border-b-2 border-gray-700 bg-gray-700 text-left text-sm font-semibold text-gray-300 uppercase tracking-wider">
                                Bukti Pembayaran</th>
                            <th
                                class="py-3 px-4 border-b-2 border-gray-700 bg-gray-700 text-left text-sm font-semibold text-gray-300 uppercase tracking-wider">
                                Alamat</th>
                            <th
                                class="py-3 px-4 border-b-2 border-gray-700 bg-gray-700 text-left text-sm font-semibold text-gray-300 uppercase tracking-wider">
                                Tanggal Pembelian</th>
                            <th
                                class="py-3 px-4 border-b-2 border-gray-700 bg-gray-700 text-left text-sm font-semibold text-gray-300 uppercase tracking-wider">
                                Status Pembayaran</th>
                            <th
                                class="py-3 px-4 border-b-2 border-gray-700 bg-gray-700 text-left text-sm font-semibold text-gray-300 uppercase tracking-wider">
                                Status Produk</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transactions as $transaction)
                            <tr class="hover:bg-gray-700">
                                <td class="py-3 px-4 border-b border-gray-700">{{ $transaction->product->nama_produk }}
                                </td>
                                <td class="py-3 px-4 border-b border-gray-700">{{ $transaction->quantity }}
                                </td>
                                <td class="py-3 px-4 border-b border-gray-700">Rp
                                    {{ number_format($transaction->product->harga, 0, ',', '.') }}</td>
                                <td class="py-3 px-4 border-b border-gray-700">Rp
                                    {{ number_format($transaction->harga_ongkir, 0, ',', '.') }}</td>
                                <td class="py-3 px-4 border-b border-gray-700">
                                    <img alt="Bukti pembayaran" class="w-16 h-16 object-cover rounded cursor-pointer"
                                        src="{{ asset('storage/' . $transaction->bukti_pembayaran) }}" width="100"
                                        height="100"
                                        onclick="openModal('{{ asset('storage/' . $transaction->bukti_pembayaran) }}')" />
                                </td>
                                <td class="py-3 px-4 border-b border-gray-700">{{ $transaction->alamat->alamat }}</td>
                                <td class="py-3 px-4 border-b border-gray-700">
                                    {{ $transaction->created_at->format('d-m-Y') }}</td>
                                <td class="py-3 px-4 border-b border-gray-700">{{ $transaction->status_pembayaran }}
                                </td>
                                <td class="py-3 px-4 border-b border-gray-700">{{ $transaction->status_produk }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal for Image Preview -->
    <!-- Modal -->
    <div id="imageModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white p-4 rounded-lg relative" onclick="event.stopPropagation()">
            <!-- Tombol Close X dihilangkan, cukup klik diluar modal untuk menutup -->
            <img id="previewImage" src="" alt="Bukti Pembayaran"
                class="max-w-full max-h-[80vh] object-contain" />
        </div>
    </div>



    <x-footer />
    @vite('resources/js/app.js')

    <script>
        // Fungsi untuk membuka modal
        function openModal(imageSrc) {
            const modal = document.getElementById('imageModal');
            const image = document.getElementById('previewImage');
            image.src = imageSrc;
            modal.classList.remove('hidden');
        }

        // Fungsi untuk menutup modal
        function closeModal() {
            document.getElementById('imageModal').classList.add('hidden');
        }

        // Event listener untuk menutup modal ketika klik di luar modal
        document.getElementById('imageModal').addEventListener('click', closeModal);
    </script>

</body>

</html>
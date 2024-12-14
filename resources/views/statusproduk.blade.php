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


    <div class=" font-roboto text-white mt-20">
        <div class="container mx-auto p-4 ">
            <div class="bg-gray-900 shadow-md rounded-lg p-6">
                <h1 class="text-3xl font-bold mb-6 text-center">
                    Status Produk
                </h1>
                <table class="min-w-full bg-gray-800 rounded-lg overflow-hidden">
                    <thead>
                        <tr>
                            <th
                                class="py-3 px-4 border-b-2 border-gray-700 bg-gray-700 text-left text-sm font-semibold text-gray-300 uppercase tracking-wider">
                                Nama Produk
                            </th>
                            <th
                                class="py-3 px-4 border-b-2 border-gray-700 bg-gray-700 text-left text-sm font-semibold text-gray-300 uppercase tracking-wider">
                                Harga Produk
                            </th>
                            <th
                                class="py-3 px-4 border-b-2 border-gray-700 bg-gray-700 text-left text-sm font-semibold text-gray-300 uppercase tracking-wider">
                                Harga Ongkos Kirim
                            </th>
                            <th
                                class="py-3 px-4 border-b-2 border-gray-700 bg-gray-700 text-left text-sm font-semibold text-gray-300 uppercase tracking-wider">
                                Bukti Pembayaran
                            </th>
                            <th
                                class="py-3 px-4 border-b-2 border-gray-700 bg-gray-700 text-left text-sm font-semibold text-gray-300 uppercase tracking-wider">
                                Alamat
                            </th>
                            <th
                                class="py-3 px-4 border-b-2 border-gray-700 bg-gray-700 text-left text-sm font-semibold text-gray-300 uppercase tracking-wider">
                                Tanggal Pembelian
                            </th>
                            <th
                                class="py-3 px-4 border-b-2 border-gray-700 bg-gray-700 text-left text-sm font-semibold text-gray-300 uppercase tracking-wider">
                                Status Pembayaran
                            </th>
                            <th
                                class="py-3 px-4 border-b-2 border-gray-700 bg-gray-700 text-left text-sm font-semibold text-gray-300 uppercase tracking-wider">
                                Status Produk
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="hover:bg-gray-700">
                            <td class="py-3 px-4 border-b border-gray-700">
                                Produk A
                            </td>
                            <td class="py-3 px-4 border-b border-gray-700">
                                Rp 100.000
                            </td>
                            <td class="py-3 px-4 border-b border-gray-700">
                                Rp 10.000
                            </td>
                            <td class="py-3 px-4 border-b border-gray-700">
                                <img alt="Bukti pembayaran untuk Produk A" class="w-16 h-16 object-cover rounded"
                                    height="100"
                                    src="https://storage.googleapis.com/a1aa/image/APJObOEHmaL3ARqIsO4PLek6xYx24KgJ7UPQctyJPFxY5Z9JA.jpg"
                                    width="100" />
                            </td>
                            <td class="py-3 px-4 border-b border-gray-700">
                                Jl. Contoh Alamat No. 1
                            </td>
                            <td class="py-3 px-4 border-b border-gray-700">
                                01-01-2023
                            </td>
                            <td class="py-3 px-4 border-b border-gray-700">
                                Sudah Dibayar
                            </td>
                            <td class="py-3 px-4 border-b border-gray-700">
                                Diproses
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-700">
                            <td class="py-3 px-4 border-b border-gray-700">
                                Produk B
                            </td>
                            <td class="py-3 px-4 border-b border-gray-700">
                                Rp 200.000
                            </td>
                            <td class="py-3 px-4 border-b border-gray-700">
                                Rp 20.000
                            </td>
                            <td class="py-3 px-4 border-b border-gray-700">
                                <img alt="Bukti pembayaran untuk Produk B" class="w-16 h-16 object-cover rounded"
                                    height="100"
                                    src="https://storage.googleapis.com/a1aa/image/7rBmJoqERPKRLtYuRVLu9Sf5WgtROeYudMALimvUvMzzyz6TA.jpg"
                                    width="100" />
                            </td>
                            <td class="py-3 px-4 border-b border-gray-700">
                                Jl. Contoh Alamat No. 2
                            </td>
                            <td class="py-3 px-4 border-b border-gray-700">
                                02-01-2023
                            </td>
                            <td class="py-3 px-4 border-b border-gray-700">
                                Belum Dibayar
                            </td>
                            <td class="py-3 px-4 border-b border-gray-700">
                                Dikirim
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-700">
                            <td class="py-3 px-4 border-b border-gray-700">
                                Produk C
                            </td>
                            <td class="py-3 px-4 border-b border-gray-700">
                                Rp 300.000
                            </td>
                            <td class="py-3 px-4 border-b border-gray-700">
                                Rp 30.000
                            </td>
                            <td class="py-3 px-4 border-b border-gray-700">
                                <img alt="Bukti pembayaran untuk Produk C" class="w-16 h-16 object-cover rounded"
                                    height="100"
                                    src="https://storage.googleapis.com/a1aa/image/Du8XsVsBWZoXD1BwZc275OtIRpdAA0QfKfQNbqUzyUiyyz6TA.jpg"
                                    width="100" />
                            </td>
                            <td class="py-3 px-4 border-b border-gray-700">
                                Jl. Contoh Alamat No. 3
                            </td>
                            <td class="py-3 px-4 border-b border-gray-700">
                                03-01-2023
                            </td>
                            <td class="py-3 px-4 border-b border-gray-700">
                                Sudah Dibayar
                            </td>
                            <td class="py-3 px-4 border-b border-gray-700">
                                Diterima
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <x-footer />
    @vite('resources/js/app.js')
</body>

</html>

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
    <link href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />
    <title>SigmaGem Consign</title>
</head>

<body class="h-full">
    <x-navbar class="x-navbar"></x-navbar>

    <!-- Stepper -->
    <div data-hs-stepper='{"currentIndex": 1}' class="px-20">
        <!-- Tambahkan padding horizontal -->
        <!-- Stepper Nav -->

        <ul class="relative flex flex-row gap-x-2 mt-20">

            <li class="flex items-center gap-x-2 shrink basis-0 flex-1 group active"
                data-hs-stepper-nav-item='{"index": 1}'>
                <span class="min-w-7 min-h-7 group inline-flex items-center text-xs align-middle">
                    <span
                        class="size-7 flex justify-center items-center shrink-0 bg-gray-100 font-medium text-gray-800 rounded-full group-focus:bg-gray-200 hs-stepper-active:bg-purple-600 hs-stepper-active:text-white hs-stepper-success:bg-purple-600 hs-stepper-success:text-white hs-stepper-completed:bg-teal-500 hs-stepper-completed:group-focus:bg-teal-600">
                        <span class="hs-stepper-success:hidden hs-stepper-completed:hidden">1</span>
                        <svg class="hidden shrink-0 size-3 hs-stepper-success:block" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                    </span>
                    <span class="ms-2 text-sm font-medium text-white ">Nama & Kategori</span>
                </span>
                <div
                    class="w-full h-px flex-1 bg-gray-200 group-last:hidden hs-stepper-success:bg-purple-600 hs-stepper-completed:bg-teal-600">
                </div>
            </li>

            <li class="flex items-center gap-x-2 shrink basis-0 flex-1 group active"
                data-hs-stepper-nav-item='{"index": 2}'>
                <span class="min-w-7 min-h-7 group inline-flex items-center text-xs align-middle">
                    <span
                        class="size-7 flex justify-center items-center shrink-0 bg-gray-100 font-medium text-gray-800 rounded-full group-focus:bg-gray-200 hs-stepper-active:bg-purple-600 hs-stepper-active:text-white hs-stepper-success:bg-purple-600 hs-stepper-success:text-white hs-stepper-completed:bg-teal-500 hs-stepper-completed:group-focus:bg-teal-600">
                        <span class="hs-stepper-success:hidden hs-stepper-completed:hidden">2</span>
                        <svg class="hidden shrink-0 size-3 hs-stepper-success:block" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                    </span>
                    <span class="ms-2 text-sm font-medium text-white ">Foto Produk</span>
                </span>
                <div
                    class="w-full h-px flex-1 bg-gray-200 group-last:hidden hs-stepper-success:bg-purple-600 hs-stepper-completed:bg-teal-600">
                </div>
            </li>

            <li class="flex items-center gap-x-2 shrink basis-0 flex-1 group" data-hs-stepper-nav-item='{"index": 3}'>
                <span class="min-w-7 min-h-7 group inline-flex items-center text-xs align-middle">
                    <span
                        class="size-7 flex justify-center items-center shrink-0 bg-gray-100 font-medium text-gray-800 rounded-full group-focus:bg-gray-200 hs-stepper-active:bg-purple-600 hs-stepper-active:text-white hs-stepper-success:bg-purple-600 hs-stepper-success:text-white hs-stepper-completed:bg-teal-500 hs-stepper-completed:group-focus:bg-teal-600">
                        <span class="hs-stepper-success:hidden hs-stepper-completed:hidden">3</span>
                        <svg class="hidden shrink-0 size-3 hs-stepper-success:block" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                    </span>
                    <span class="ms-2 text-sm font-medium text-white">Detail Produk</span>
                </span>
                <div
                    class="w-full h-px flex-1 bg-gray-200 group-last:hidden hs-stepper-success:bg-purple-600 hs-stepper-completed:bg-teal-600">
                </div>
            </li>
            <!-- End Item -->
        </ul>
        <!-- End Stepper Nav -->

        <!-- Stepper Content -->
        <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mt-5 sm:mt-8">
                <!-- First Content -->
                <div data-hs-stepper-content-item='{"index": 1,"isCompleted": true}' class="success"
                    style="display: none;">
                    <div>
                        <div class="max-w-10xl mx-auto bg-gray-900 p-6 border border-gray-700 rounded-lg shadow-md">
                            <!-- Nama Produk -->
                            <div class="mb-6">
                                <label class="block text-sm font-medium text-white">Nama Produk :</label>
                                <input type="text" name="nama_produk"
                                    class="mt-1 block w-full bg-gray-800 border-b border-gray-700 text-white focus:border-purple-600 focus:ring-0 rounded-lg">
                            </div>

                            <!-- Kategori Produk -->
                            <div class="mb-6">
                                <label class="block text-sm font-medium text-white">Kategori Produk :</label>
                                <select name="category_id" id="category_id"
                                    class="mt-1 block w-full bg-gray-800 text-white border border-gray-600 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                    <option value="" disabled selected>Pilih Kategori</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->nama_kategori }}</option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- search dropdown nama kategori --}}
                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    const categorySelect = new Choices('#category_id', {
                                        searchEnabled: true, // Aktifkan fitur pencarian
                                        removeItemButton: true, // Tombol untuk menghapus pilihan
                                        itemSelectText: '', // Menghilangkan teks default saat memilih
                                        shouldSort: false, // Tidak mengurutkan hasil pencarian
                                    });
                                });
                            </script>

                            {{-- <script>
                            function toggleDropdown(event, dropdownId) {
                                event.stopPropagation(); // Prevent click event from bubbling up
                                const dropdown = document.getElementById(dropdownId);
                                dropdown.classList.toggle('hidden');
                            }

                            function selectCategory(option, buttonId, textId) {
                                const button = document.getElementById(buttonId);
                                const text = document.getElementById(textId);

                                text.innerText = option; // Update the button text to the selected option
                                const dropdown = button.nextElementSibling; // Get the dropdown element
                                dropdown.classList.add('hidden'); // Hide the dropdown
                            }

                            // Close dropdown when clicking outside
                            window.onclick = function(event) {
                                const dropdowns = document.querySelectorAll('.absolute');
                                dropdowns.forEach(dropdown => {
                                    dropdown.classList.add('hidden');
                                });
                            }
                        </script> --}}


                            <!-- Harga dan Fee -->
                            <div class="bg-gray-800 p-4 rounded-lg shadow-md">
                                <div class="flex items-center justify-between mb-4">
                                    <label for="harga" class="text-sm font-medium text-white">Harga (Rp) :</label>
                                </div>
                                <input type="text" id="formatted_harga" placeholder="Rp 0"
                                    class="text-2xl bg-gray-800 font-semibold text-white mb-4 w-full border-b border-gray-700 focus:border-purple-600 focus:ring-0 rounded-lg">
                                <input type="hidden" id="harga" name="harga">
                                <!-- Hidden input untuk menyimpan nilai angka asli -->

                                {{-- Fee penjualan dan dana diterima --}}
                                <div class="text-sm text-white mb-2">
                                    <div class="flex justify-between text-gray-300">
                                        <span>Fee Penjualan (12%)</span>
                                        <span id="fee_penjualan">Rp0</span>
                                    </div>
                                    <div class="flex justify-between text-gray-300">
                                        <span>Dana Diterima (exc. Ongkir)</span>
                                        <span id="dana_diterima" class="text-green-600">Rp0</span>
                                    </div>
                                </div>

                                {{-- Hidden inputs --}}
                                <input type="hidden" name="fee_penjualan" id="hidden_fee_penjualan">
                                <input type="hidden" name="dana_diterima" id="hidden_dana_diterima">
                            </div>

                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    const formattedInput = document.getElementById('formatted_harga');
                                    const hiddenInput = document.getElementById('harga');
                                    const feePenjualanSpan = document.getElementById('fee_penjualan');
                                    const danaDiterimaSpan = document.getElementById('dana_diterima');
                                    const hiddenFeePenjualan = document.getElementById('hidden_fee_penjualan');
                                    const hiddenDanaDiterima = document.getElementById('hidden_dana_diterima');

                                    function formatRupiah(number) {
                                        return new Intl.NumberFormat('id-ID', {
                                            style: 'currency',
                                            currency: 'IDR',
                                            minimumFractionDigits: 0
                                        }).format(number);
                                    }

                                    function parseRupiah(string) {
                                        return parseInt(string.replace(/[^\d]/g, '')) || 0;
                                    }

                                    formattedInput.addEventListener('input', function() {
                                        const rawValue = parseRupiah(formattedInput.value); // Dapatkan angka mentah
                                        formattedInput.value = formatRupiah(rawValue); // Format kembali sebagai Rupiah
                                        hiddenInput.value = rawValue; // Simpan angka mentah ke input hidden

                                        const feePenjualan = rawValue * 0.12; // 12% fee
                                        const danaDiterima = rawValue - feePenjualan;

                                        // Update tampilan fee dan dana diterima
                                        feePenjualanSpan.textContent = formatRupiah(feePenjualan);
                                        danaDiterimaSpan.textContent = formatRupiah(danaDiterima);

                                        // Simpan nilai ke input hidden
                                        hiddenFeePenjualan.value = feePenjualan;
                                        hiddenDanaDiterima.value = danaDiterima;
                                    });
                                });
                            </script>


                            <div class="bg-orange-100 p-4 rounded-md mb-6 mt-6">
                                <p class="text-sm text-gray-700">
                                    Harap isi berat barang & dimensi yang benar. Apabila ada kelebihan berat barang atau
                                    dimensi saat paket diserahkan ke kurir, akan ada risiko penolakan dari pihak kurir.
                                    Disarankan untuk melebihkan sedikit guna menghindari resiko diatas.
                                </p>
                            </div>


                            <div class="mb-4">
                                {{-- berat --}}
                                <div class="mb-4">
                                    <label class="block text-white text-sm font-bold mb-1">Berat :</label>
                                    <div class="flex items-center">
                                        <input type="number" name="berat"
                                            class="bg-gray-800 border-b border-gray-700 text-white rounded-md text-lg w-24 text-center focus:outline-none focus:ring-0 focus:ring-purple-600">
                                        <span class="text-gray-300 text-sm ml-2">gram</span>
                                    </div>
                                    <p class="text-gray-300 text-sm mt-1">1 kg = 1000 gram</p>
                                </div>

                                {{-- stok --}}
                                <div class="mb-4">
                                    <label class="block text-white text-sm font-bold mb-1">Stok :</label>
                                    <div class="flex items-center">
                                        <input type="number" name="stok"
                                            class="bg-gray-800 border-b border-gray-700 text-white rounded-md text-lg w-24 text-center focus:outline-none focus:ring-0 focus:ring-purple-600">
                                        <span class="text-gray-300 text-sm ml-2">Pcs</span>
                                    </div>
                                </div>

                                {{-- dimensi barang (panjang, lebar, dan tinggi) --}}
                                <div class="mb-4">
                                    <label class="block text-white text-sm font-bold mb-1">Dimensi Barang :</label>
                                    <div class="flex items-center space-x-4">
                                        <div class="flex items-center">
                                            <input type="number" name="panjang"
                                                class="bg-gray-800 border-b border-gray-700 text-white rounded-md text-lg w-20 text-center focus:outline-none focus:ring-0 focus:ring-purple-600">
                                            <span class="text-gray-300 text-sm ml-2">cm</span>
                                        </div>
                                        <div class="flex items-center">
                                            <input type="number" name="lebar"
                                                class="bg-gray-800 border-b border-gray-700 text-white rounded-md text-lg w-20 text-center focus:outline-none focus:ring-0 focus:ring-purple-600">
                                            <span class="text-gray-300 text-sm ml-2">cm</span>
                                        </div>
                                        <div class="flex items-center">
                                            <input type="number" name="tinggi"
                                                class="bg-gray-800 border-b border-gray-700 text-white rounded-md text-lg w-20 text-center focus:outline-none focus:ring-0 focus:ring-purple-600">
                                            <span class="text-gray-300 text-sm ml-2">cm</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Pacing kayu dan asuransi --}}
                            <div class="mb-4">
                                <div class="flex items-center mb-2">
                                    <input type="checkbox" name="packing_kayu" value="1"
                                        class="bg-gray-800 form-checkbox h-5 w-5 text-purple-600 focus:ring-0">
                                    <label class="ml-2 text-gray-300 text-sm">Packing Kayu</label>
                                </div>
                                <div class="flex items-center">
                                    <input type="checkbox" name="asuransi" value="1"
                                        class="bg-gray-800 form-checkbox h-5 w-5 text-purple-600 focus:ring-0">
                                    <label class="ml-2 text-gray-300 text-sm">Asuransi</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- End First Content -->

                <!-- Second Content -->
                <div data-hs-stepper-content-item='{"index": 2}' class="active">
                    <div>
                        <div class="max-w-10xl mx-auto bg-gray-900 p-6 border border-gray-700 rounded-lg shadow-md">
                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                                <!-- Upload Sisi Depan -->
                                <div
                                    class="bg-gray-800 p-6 rounded-lg shadow-md flex flex-col items-center border border-transparent hover:border-purple-600 transition duration-300">
                                    <label for="sisi_depan" class="cursor-pointer">
                                        <img alt="Front side of a laptop" class="mb-4 h-24 w-24 object-contain"
                                            src="{{ asset('storage/images/default-image.jpg') }}"
                                            id="preview_sisi_depan" />
                                    </label>
                                    <input type="file" id="sisi_depan" name="sisi_depan" accept="image/*"
                                        class="hidden" onchange="previewImage(event, 'preview_sisi_depan')">
                                    <p class="text-gray-100 text-center">Sisi Depan</p>
                                </div>

                                <!-- Upload Sisi Kanan / Kiri -->
                                <div
                                    class="bg-gray-800 p-6 rounded-lg shadow-md flex flex-col items-center border border-transparent hover:border-purple-600 transition duration-300">
                                    <label for="sisi_kanan" class="cursor-pointer">
                                        <img alt="Side view of a laptop" class="mb-4 h-24 w-24 object-contain"
                                            src="https://storage.googleapis.com/a1aa/image/dOO6BqXieZ3eiE3YEUivtaQYyuLemARf9w70ccozMimrX0IPB.jpg"
                                            id="preview_sisi_kanan" />
                                    </label>
                                    <input type="file" id="sisi_kanan" name="sisi_kanan" accept="image/*"
                                        class="hidden" onchange="previewImage(event, 'preview_sisi_kanan')">
                                    <p class="text-gray-100 text-center">Sisi Kanan / Kiri</p>
                                </div>

                                <!-- Upload Sisi Atas / Bawah -->
                                <div
                                    class="bg-gray-800 p-6 rounded-lg shadow-md flex flex-col items-center border border-transparent hover:border-purple-600 transition duration-300">
                                    <label for="sisi_atas" class="cursor-pointer">
                                        <img alt="Top or bottom view of a laptop"
                                            class="mb-4 h-24 w-24 object-contain"
                                            src="{{ asset('storage/images/default-image.jpg') }}"
                                            id="preview_sisi_atas" />
                                    </label>
                                    <input type="file" id="sisi_atas" name="sisi_atas" accept="image/*"
                                        class="hidden" onchange="previewImage(event, 'preview_sisi_atas')">
                                    <p class="text-gray-100 text-center">Sisi Atas / Bawah</p>
                                </div>

                                <!-- Upload Lainnya -->
                                <div
                                    class="bg-gray-800 p-6 rounded-lg shadow-md flex flex-col items-center border border-transparent hover:border-purple-600 transition duration-300">
                                    <label for="lainnya" class="cursor-pointer">
                                        <img alt="Other items" class="mb-4 h-24 w-24 object-contain"
                                            src="{{ asset('storage/images/default-image.jpg') }}"
                                            id="preview_lainnya" />
                                    </label>
                                    <input type="file" id="lainnya" name="lainnya" accept="image/*"
                                        class="hidden" onchange="previewImage(event, 'preview_lainnya')">
                                    <p class="text-gray-100 text-center">Lainnya</p>
                                </div>
                            </div>

                            <script>
                                function previewImage(event, previewId) {
                                    const file = event.target.files[0];
                                    if (!file || !file.type.startsWith('image/')) {
                                        alert("Please upload a valid image file!");
                                        return;
                                    }

                                    const reader = new FileReader();
                                    reader.onload = function() {
                                        const output = document.getElementById(previewId);
                                        if (output) {
                                            output.src = reader.result;
                                        } else {
                                            console.error("Preview ID not found: ", previewId);
                                        }
                                    };
                                    reader.onerror = function() {
                                        console.error("Error reading file");
                                    };
                                    reader.readAsDataURL(file);
                                }
                            </script>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Second Content -->

            <!-- Third Content -->
            <div data-hs-stepper-content-item='{"index": 3}' style="display: none;">
                <div class="max-w-10xl mx-auto bg-gray-900 p-6 border border-gray-700 rounded-lg shadow-md text-white">
                    <div class="space-y-6">
                        <!-- Kondisi Barang -->
                        <div class="flex items-center space-x-2">
                            <span class="font-semibold text-lg">Kondisi Barang</span>
                        </div>
                        <div class="grid grid-cols-3 gap-2 mt-4">
                            <input type="hidden" id="kondisi_barang" name="kondisi_barang" value="">
                            <button type="button"
                                class="condition-button border rounded-lg border-gray-700 bg-gray-800 px-4 py-2 text-white"
                                onclick="selectCondition('Brand New In Box', this)">Brand New In Box</button>
                            <button type="button"
                                class="condition-button border rounded-lg border-gray-700 bg-gray-800 px-4 py-2 text-white"
                                onclick="selectCondition('Brand New Open Box', this)">Brand New Open Box</button>
                            <button type="button"
                                class="condition-button border rounded-lg border-gray-700 bg-gray-800 px-4 py-2 text-white"
                                onclick="selectCondition('Very Good Condition', this)">Very Good Condition</button>
                            <button type="button"
                                class="condition-button border rounded-lg border-gray-700 bg-gray-800 px-4 py-2 text-white"
                                onclick="selectCondition('Good Condition', this)">Good Condition</button>
                            <button type="button"
                                class="condition-button border rounded-lg border-gray-700 bg-gray-800 px-4 py-2 text-white"
                                onclick="selectCondition('Judge by Pict', this)">Judge by Pict</button>
                        </div>
                        <script>
                            function selectCondition(condition, element) {
                                document.getElementById('kondisi_barang').value = condition;
                                document.querySelectorAll('.condition-button').forEach(btn => btn.classList.remove('bg-purple-600'));
                                element.classList.add('bg-purple-600');
                            }
                        </script>

                        <!-- Garansi -->
                        <div>
                            <span class="font-semibold text-lg">Garansi</span>
                            <div class="flex space-x-2 mt-4">
                                <input type="hidden" id="garansi" name="garansi" value="">
                                <button type="button"
                                    class="warranty-button border rounded-lg bg-gray-800 px-4 py-2 text-white"
                                    onclick="selectWarranty('On', this)">On</button>
                                <button type="button"
                                    class="warranty-button border rounded-lg bg-gray-800 px-4 py-2 text-white"
                                    onclick="selectWarranty('Off', this)">Off</button>
                            </div>
                        </div>
                        <script>
                            function selectWarranty(status, button) {
                                // Set the hidden input value
                                document.getElementById('garansi').value = status;

                                // Highlight the selected button
                                const buttons = document.querySelectorAll('.warranty-button');
                                buttons.forEach(btn => btn.classList.remove('bg-purple-600'));
                                button.classList.add('bg-purple-600');
                            }
                        </script>


                        <!-- Lama Pemakaian -->
                        <div>
                            <label for="lama_pemakaian" class="block">Lama Pemakaian:</label>
                            <input type="text" name="lama_pemakaian" id="lama_pemakaian"
                                class="border border-gray-700 bg-gray-800 px-2 py-1 w-full text-white">
                        </div>

                        <!-- Tangan Ke -->
                        <div>
                            <label for="tangan_ke" class="block">Tangan Ke:</label>
                            <input type="text" name="tangan_ke" id="tangan_ke"
                                class="border border-gray-700 bg-gray-800 px-2 py-1 w-full text-white">
                        </div>

                        <!-- Waktu Pembelian -->
                        <div>
                            <label for="waktu_pembelian" class="block">Waktu Pembelian:</label>
                            <input type="text" name="waktu_pembelian" id="waktu_pembelian"
                                class="border border-gray-700 bg-gray-800 px-2 py-1 w-full text-white">
                        </div>

                        <!-- Minus -->
                        <div>
                            <label for="minus" class="block">Minus:</label>
                            <input type="text" name="minus" id="minus"
                                class="border border-gray-700 bg-gray-800 px-2 py-1 w-full text-white">
                        </div>

                        <!-- Kelengkapan -->
                        <div>
                            <label for="kelengkapan" class="block">Kelengkapan:</label>
                            <input type="text" name="kelengkapan" id="kelengkapan"
                                class="border border-gray-700 bg-gray-800 px-2 py-1 w-full text-white">
                        </div>

                        <!-- Wireless / Wired -->
                        <div class="mb-6">
                            <label class="block text-sm font-medium">Wireless / Wired:</label>
                            <input type="hidden" id="wireless" name="wireless" value="">
                            <button type="button"
                                class="wireless-button border rounded-lg bg-gray-800 px-4 py-2 text-white"
                                onclick="selectWireless('Wireless', this)">Wireless</button>
                            <button type="button"
                                class="wireless-button border rounded-lg bg-gray-800 px-4 py-2 text-white"
                                onclick="selectWireless('Wired', this)">Wired</button>
                        </div>
                        <script>
                            function selectWireless(option, button) {
                                // Set the hidden input value
                                document.getElementById('wireless').value = option;

                                // Highlight the selected button
                                const buttons = document.querySelectorAll('.wireless-button');
                                buttons.forEach(btn => btn.classList.remove('bg-purple-600'));
                                button.classList.add('bg-purple-600');
                            }
                        </script>


                        <!-- Suara Aman -->
                        <div>
                            <label for="suara_aman" class="block">Suara Aman:</label>
                            <input type="text" name="suara_aman" id="suara_aman"
                                class="border border-gray-700 bg-gray-800 px-2 py-1 w-full text-white">
                        </div>

                        <!-- Submit Button -->
                        {{-- <div class="mt-6">
                            <button type="submit"
                                class="bg-purple-600 text-white px-4 py-2 rounded-lg">Simpan</button>
                        </div> --}}
                    </div>
                </div>
            </div>
            <!-- End Third Content -->

            <!-- Final Content -->
            <div data-hs-stepper-content-item='{"isFinal": true}' style="display: none;">
                <div
                    class="p-4 h-48 bg-gray-50 flex justify-center items-center border border-dashed border-gray-200 rounded-xl">
                    <h3 class="text-gray-500">Final content</h3>
                </div>
            </div>
            <!-- End Final Content -->

            <!-- Button Group -->
            <div class="mt-5 flex justify-between items-center gap-x-2">
                <button type="button"
                    class="py-2 px-3 inline-flex items-center gap-x-1 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none"
                    data-hs-stepper-back-btn="">
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="m15 18-6-6 6-6"></path>
                    </svg>
                    Back
                </button>
                <button type ="button"
                    class="py-2 px-3 inline-flex items-center gap-x-1 text-sm font-medium rounded-lg border border-transparent bg-purple-600 text-white hover:bg-purple-700 focus:outline-none focus:bg-purple-700 disabled:opacity-50 disabled:pointer-events-none"
                    data-hs-stepper-next-btn="">
                    Next
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="m9 18 6-6-6-6"></path>
                    </svg>
                </button>
                <button type="submit"
                    class="py-2 px-3 inline-flex items-center gap-x-1 text-sm font-medium rounded-lg border border-transparent bg-purple-600 text-white hover:bg-purple-700 focus:outline-none focus:bg-purple-700 disabled:opacity-50 disabled:pointer-events-none"
                    data-hs-stepper-finish-btn="" style="display: none;">
                    Finish
                </button>
                <button type="reset"
                    class="py-2 px-3 inline-flex items-center gap-x-1 text-sm font-medium rounded-lg border border-transparent bg-purple-600 text-white hover:bg-purple-700 focus:outline-none focus:bg-purple-700 disabled:opacity-50 disabled:pointer-events-none"
                    data-hs-stepper-reset-btn="" style="display: none;">
                    Reset
                </button>
            </div>
            <!-- End Button Group -->
        </form>
    </div>
    <!-- End Stepper Content -->
    </div>
    <!-- End Stepper -->

    <x-footer />
    @vite('resources/js/app.js')
    <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
</body>

</html>

<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-900">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <title>Edit Profil</title>
</head>

<body class="h-full">

    <x-navbar></x-navbar>

    <div>
        <h1 class="text-gray-900 mt-20">test</h1>
    </div>

    <div class="max-w-5xl mx-auto bg-gray-900 p-8 rounded-lg shadow-lg border border-gray-800 mt-10 mb-20">
        <h1 class="text-2xl font-semibold mb-4 text-white">
            Profil Saya
        </h1>
        <p class="text-gray-400 mb-6">
            Kelola informasi profil Anda untuk mengontrol, melindungi dan mengamankan akun
        </p>
        <div class="border-b border-gray-700 mb-6">
        </div>
        <form>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="md:col-span-2">
                    <div class="mb-4">
                        <label class="block text-white font-medium mb-2">
                            Nama Lengkap
                        </label>
                        <input class="w-full border border-gray-700 p-2 rounded bg-gray-800 text-white"
                            type="text" />
                    </div>
                    <div class="mb-4">
                        <label class="block text-white font-medium mb-2">
                            Email
                        </label>
                        <input class="w-full border border-gray-700 p-2 rounded bg-gray-800 text-white" disabled=""
                            type="text" />
                    </div>
                    <div class="mb-4">
                        <label class="block text-white font-medium mb-2">
                            Nomor Telepon
                        </label>
                        <input class="w-full border border-gray-700 p-2 rounded bg-gray-800 text-white"
                            type="text" />
                    </div>
                    <div class="mb-4">
                        <label class="block text-white font-medium mb-2">
                            Kota Asal
                        </label>
                        <input class="w-full border border-gray-700 p-2 rounded bg-gray-800 text-white" type="text">
                    </div>
                    <div class="mb-4">
                        <label class="block text-white font-medium mb-2">
                            Password
                        </label>
                        <input class="w-full border border-gray-700 p-2 rounded bg-gray-800 text-white" type="password"
                            value="" />
                    </div>
                </div>
                <div class="flex flex-col items-center">
                    <img alt="Profile picture of a cat" class="w-24 h-24 rounded-full mb-4" height="100"
                        src="https://storage.googleapis.com/a1aa/image/AiLfzh5zkUXXNiFBB33Zf5x0ccqu3P812LsfeOz96GXjRZnPB.jpg"
                        width="100" />
                    <button class="bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-800">
                        Pilih Gambar
                    </button>
                    <p class="text-gray-500 text-sm mt-2">
                        Ukuran gambar: maks. 1 MB
                    </p>
                    <p class="text-gray-500 text-sm">
                        Format gambar: .JPEG, .PNG
                    </p>
                </div>
            </div>
            <div class="mt-6">
                <button class="bg-purple-600 text-white px-6 py-2 rounded hover:bg-purple-700">
                    Simpan
                </button>
            </div>
        </form>
    </div>
    <div>
        <h1 class="text-gray-900 mb-10">jarak</h1>
    </div>
    <x-footer></x-footer>
</body>

</html>

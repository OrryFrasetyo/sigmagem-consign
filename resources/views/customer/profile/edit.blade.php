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

    <section class=" dark:bg-gray-900">
        <div class="max-w-2xl px-4 py-8 mx-auto lg:py-16">
            <h1 class="mb-4 text-2xl text-center font-bold text-white mt-5">Edit Profil</h1>
            <form action="{{ route('update-profile') }}" method="POST">
                @csrf
                <div class="grid gap-4 mb-4 sm:grid-cols-2 sm:gap-6 sm:mb-5">
                    <div class="sm:col-span-2">
                        <label for="full_name" class="block mb-2 text-sm font-medium text-white">Nama Lengkap</label>
                        <input type="text" name="full_name" id="full_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ old('full_name', $user->full_name) }}" placeholder="Masukkan nama lengkap" required>
                    </div>

                    <div class="sm:col-span-2">
                        <label for="email" class="block mb-2 text-sm font-medium text-white">Email</label>
                        <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ old('email', $user->email) }}" placeholder="Masukkan email" required>
                    </div>

                    <div class="sm:col-span-2">
                        <label for="no_handphone" class="block mb-2 text-sm font-medium text-white">Nomor Handphone</label>
                        <input type="number" name="no_hp" id="no_hp" class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ old('no_hp', $user->no_hp) }}" placeholder="Masukkan Nomor Handphone">
                    </div>

                    <div class="sm:col-span-2">
                        <label for="password" class="block mb-2 text-sm font-medium text-white">Password</label>
                        <input type="password" name="password" id="password" class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Ubah Password">
                    </div>


                    {{-- <div class="sm:col-span-2">
                        <label for="full_name" class="block mb-2 text-sm font-medium text-white">Nama Lengkap</label>
                        <input type="text" name="full_name" id="full_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="Orry Frasetyo" placeholder="Masukkan nama lengkap" required="">
                    </div> --}}

                    {{-- <div class="sm:col-span-2">
                        <label for="tempat_lahir" class="block mb-2 text-sm font-medium text-white">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" id="tempat_lahir" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="Padang" placeholder="Masukkan tempat lahir" required="">
                    </div> --}}

                    {{-- <div class="sm:col-span-2">
                        <label for="tanggal_lahir" class="block mb-2 text-sm font-medium text-white">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="Orry Frasetyo" placeholder="Masukkan tanggal lahir" required="">
                    </div> --}}

                    {{-- <div class="sm:col-span-2">
                        <label for="jenis_kelamin" class="block mb-2 text-sm font-medium text-white">Jenis Kelamin</label>

                        <div class="flex items-center mb-4">
                            <input id="laki_laki" type="radio" value="Laki-laki" name="jenis_kelamin" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="laki_laki" class="ms-2 text-sm font-medium text-white">Laki-laki</label>
                        </div>
                        <div class="flex items-center">
                            <input id="perempuan" type="radio" value="Perempuan" name="jenis_kelamin" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="perempuan" class="ml-2 text-sm font-medium text-white">Perempuan</label>
                        </div>
                    </div> --}}
                </div>
                <div class="flex items-center space-x-4">
                    <button type="submit" class="text-white bg-purple-900 hover:bg-purple-950 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
      </section>

</body>
</html>

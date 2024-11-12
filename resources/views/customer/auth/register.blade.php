<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-800">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <title>Sign Up</title>
</head>

<body class="h-full flex items-center justify-center ">

    <section class="w-full max-w-md p-6 bg-gray-900 rounded-lg shadow dark:bg-gray-800">
        <a href="#" class="flex items-center justify-center mb-6 text-2xl font-semibold text-white">
            <img class="w-8 h-8 mr-2" src="img/scz.png" alt="logo">
            SigmaGem
        </a>

        <h1 class="text-xl font-bold text-center text-white mb-4">
            Registrasi Akun
        </h1>
        <p class="text-center text-sm text-white">Selamat datang di SigmaGem Consign</p>

        <form class="space-y-4 mt-6" action="{{ route('register.post') }}" method="POST">
            @csrf

            @error('email')
                <div class="text-red-600">{{ $message }}</div>
            @enderror

            @if (session('error'))
                <div class="p-4 mb-4 text-sm text-red-800 bg-red-50 rounded-lg dark:bg-gray-800 dark:text-red-400"
                    role="alert">
                    {{ session('error') }}
                </div>
            @endif

            <div>
                <label for="email" class="block text-sm mb-2 font-medium text-white">Email</label>
                <input type="email" name="email" id="email"
                    class="w-full p-2.5 border-transparent rounded-lg text-white bg-gray-800 placeholder-gray-500"
                    placeholder="name@email.com" required>
            </div>

            <div>
                <label for="fullname" class="block text-sm mb-2 font-medium text-white">Nama
                    Lengkap</label>
                <input type="text" name="full_name" id="fullname"
                    class="w-full p-2.5 border-transparent rounded-lg text-white bg-gray-800 placeholder-gray-500" placeholder="John Cena"
                    required>
            </div>

            <div>
                <label for="nohp" class="block text-sm mb-2 font-medium text-white">No
                    Handphone</label>
                <input type="number" name="no_hp" id="nohp"
                    class="w-full p-2.5 border-transparent rounded-lg text-white bg-gray-800 placeholder-gray-500" placeholder="08xxx" required>
            </div>

            <div>
                <label for="password"
                    class="block text-sm mb-2 font-medium text-white">Password</label>
                <input type="password" name="password" id="password"
                    class="w-full p-2.5 border-transparent rounded-lg text-white bg-gray-800 placeholder-gray-500" placeholder="••••••••"
                    required>
            </div>

            <button type="submit"
                class="w-full px-5 py-2.5 border-transparent text-sm font-medium text-white bg-purple-600 rounded-lg text-center">Registrasi
                Akun</button>

            <p class="text-sm font-light text-center text-gray-500 dark:text-gray-400">
                Sudah punya akun? <a href="{{ route('login') }}"
                    class="font-medium text-primary-600 dark:text-primary-500">Login</a>
            </p>
        </form>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>

</html>

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
    <title>Sign In</title>
</head>

<body class="h-full ">
    <section class="flex items-center justify-center px-6 py-8 md:h-screen lg:py-0">
        <div class="w-full max-w-md bg-gray-900 rounded-lg shadow-lg dark:bg-gray-800 dark:border-gray-700">
            <div class="p-6 md:p-8 space-y-6">
                <div class="flex items-center justify-center mb-6">
                    <img class="w-8 h-8 mr-2" src="img/scz.png" alt="logo">
                    <span class="text-2xl font-semibold text-white">SigmaGem</span>
                </div>
                <h1 class="text-xl font-bold text-center text-white md:text-2xl">Sign In</h1>
                
                {{-- Flash error message --}}
                @if ($errors->has('error'))
                    <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400">
                        {{ $errors->first('error') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login.post') }}" class="space-y-6">
                    @csrf
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-white">Email</label>
                        <input type="email" name="email" id="email" class="w-full p-2.5 border-transparent border border-gray-300 rounded-lg  text-white bg-gray-800 dark:border-gray- dark:text-white focus:ring-primary-600 focus:border-primary-600" placeholder="name@company.com" required>
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-white">Password</label>
                        <input type="password" name="password" id="password" class="w-full p-2.5 border-transparent border border-gray-300 rounded-lg text-gray-900 bg-gray-800 dark:border-gray-600 dark:text-white focus:ring-primary-600 focus:border-primary-600" placeholder="••••••••" required>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input id="remember" type="checkbox" class="w-4 h-4 border-gray-300 rounded bg-gray-50 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600">
                            <label for="remember" class="ml-2 text-sm text-gray-500 dark:text-gray-300">Remember me</label>
                        </div>
                        <a href="#" class="text-sm font-medium text-primary-600 hover:underline dark:text-primary-500">Lupa password?</a>
                    </div>
                    <button type="submit" class="w-full px-5 py-2.5 text-sm font-medium text-white bg-purple-600 rounded-lg">Sign in</button>
                    <p class="text-sm text-center text-gray-500 dark:text-gray-400">
                        Belum punya akun? <a href="/register" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Sign up</a>
                    </p>
                </form>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>
</html>

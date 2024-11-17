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
    <title>SigmaGem Consign</title>
</head>

<body class="h-full">
    <x-navbar class="x-navbar"></x-navbar>

    <!-- Stepper -->
    <div data-hs-stepper='{"currentIndex": 1}' class="px-20">
         <!-- Tambahkan padding horizontal -->
        <!-- Stepper Nav -->

        <ul class="relative flex flex-row gap-x-2 mt-20">

            <li class="flex items-center gap-x-2 shrink basis-0 flex-1 group success" data-hs-stepper-nav-item='{"index": 1,"isCompleted": true}'>
                <span class="min-w-7 min-h-7 group inline-flex items-center text-xs align-middle">
                    <span class="size-7 flex justify-center items-center shrink-0 bg-gray-100 font-medium text-gray-800 rounded-full group-focus:bg-gray-200 hs-stepper-active:bg-purple-600 hs-stepper-active:text-white hs-stepper-success:bg-purple-600 hs-stepper-success:text-white hs-stepper-completed:bg-teal-500 hs-stepper-completed:group-focus:bg-teal-600">
                        <span class="hs-stepper-success:hidden hs-stepper-completed:hidden">1</span>
                        <svg class="hidden shrink-0 size-3 hs-stepper-success:block" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                    </span>
                    <span class="ms-2 text-sm font-medium text-gray-800">Step</span>
                </span>
                <div class="w-full h-px flex-1 bg-gray-200 group-last:hidden hs-stepper-success:bg-purple-600 hs-stepper-completed:bg-teal-600"></div>
            </li>

            <li class="flex items-center gap-x-2 shrink basis-0 flex-1 group active" data-hs-stepper-nav-item='{"index": 2}'>
                <span class="min-w-7 min-h-7 group inline-flex items-center text-xs align-middle">
                    <span class="size-7 flex justify-center items-center shrink-0 bg-gray-100 font-medium text-gray-800 rounded-full group-focus:bg-gray-200 hs-stepper-active:bg-purple-600 hs-stepper-active:text-white hs-stepper-success:bg-purple-600 hs-stepper-success:text-white hs-stepper-completed:bg-teal-500 hs-stepper-completed:group-focus:bg-teal-600">
                        <span class="hs-stepper-success:hidden hs-stepper-completed:hidden">2</span>
                        <svg class="hidden shrink-0 size-3 hs-stepper-success:block" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                    </span>
                    <span class="ms-2 text-sm font-medium text-gray-800 ">Step</span>
                </span>
                <div class="w-full h-px flex-1 bg-gray-200 group-last:hidden hs-stepper-success:bg-purple-600 hs-stepper-completed:bg-teal-600"></div>
            </li>

            <li class="flex items-center gap-x-2 shrink basis-0 flex-1 group" data-hs-stepper-nav-item='{"index": 3}'>
                <span class="min-w-7 min-h-7 group inline-flex items-center text-xs align-middle">
                    <span class="size-7 flex justify-center items-center shrink-0 bg-gray-100 font-medium text-gray-800 rounded-full group-focus:bg-gray-200 hs-stepper-active:bg-purple-600 hs-stepper-active:text-white hs-stepper-success:bg-purple-600 hs-stepper-success:text-white hs-stepper-completed:bg-teal-500 hs-stepper-completed:group-focus:bg-teal-600">
                        <span class="hs-stepper-success:hidden hs-stepper-completed:hidden">3</span>
                        <svg class="hidden shrink-0 size-3 hs-stepper-success:block" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                    </span>
                    <span class="ms-2 text-sm font-medium text-gray-800">Step</span>
                </span>
                <div class="w-full h-px flex-1 bg-gray-200 group-last:hidden hs-stepper-success:bg-purple-600 hs-stepper-completed:bg-teal-600"></div>
            </li>
            <!-- End Item -->
        </ul>
        <!-- End Stepper Nav -->

        <!-- Stepper Content -->
        <div class="mt-5 sm:mt-8">
            <!-- First Content -->
            <div data-hs-stepper-content-item='{"index": 1,"isCompleted": true}' class="success" style="display: none;">
                <div class="p-4 h-48 bg-gray-50 flex justify-center items-center border border-dashed border-gray-200 rounded-xl">
                    <h3 class="text-gray-500">First content</h3>
                </div>
            </div>
            <!-- End First Content -->

            <!-- Second Content -->
            <div data-hs-stepper-content-item='{"index": 2}' class="active">
                <div class="p-4 h-48 bg-gray-50 flex justify-center items-center border border-dashed border-gray-200 rounded-xl">
                    <h3 class="text-gray-500">Second content</h3>
                </div>
            </div>
            <!-- End Second Content -->

            <!-- Third Content -->
            <div data-hs-stepper-content-item='{"index": 3}' style="display: none;">
                <div class="p-4 h-48 bg-gray-50 flex justify-center items-center border border-dashed border-gray-200 rounded-xl">
                    <h3 class="text-gray-500">Third content</h3>
                </div>
            </div>
            <!-- End Third Content -->

            <!-- Final Content -->
            <div data-hs-stepper-content-item='{"isFinal": true}' style="display: none;">
                <div class="p-4 h-48 bg-gray-50 flex justify-center items-center border border-dashed border-gray-200 rounded-xl">
                    <h3 class="text-gray-500">Final content</h3>
                </div>
            </div>
            <!-- End Final Content -->

            <!-- Button Group -->
            <div class="mt-5 flex justify-between items-center gap-x-2">
                <button type="button" class="py-2 px-3 inline-flex items-center gap-x-1 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none" data-hs-stepper-back-btn="">
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="m15 18-6-6 6-6"></path>
                    </svg>
                    Back
                </button>
                <button type ="button" class="py-2 px-3 inline-flex items-center gap-x-1 text-sm font-medium rounded-lg border border-transparent bg-purple-600 text-white hover:bg-purple-700 focus:outline-none focus:bg-purple-700 disabled:opacity-50 disabled:pointer-events-none" data-hs-stepper-next-btn="">
                    Next
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="m9 18 6-6-6-6"></path>
                    </svg>
                </button>
                <button type="button" class="py-2 px-3 inline-flex items-center gap-x-1 text-sm font-medium rounded-lg border border-transparent bg-purple-600 text-white hover:bg-purple-700 focus:outline-none focus:bg-purple-700 disabled:opacity-50 disabled:pointer-events-none" data-hs-stepper-finish-btn="" style="display: none;">
                    Finish
                </button>
                <button type="reset" class="py-2 px-3 inline-flex items-center gap-x-1 text-sm font-medium rounded-lg border border-transparent bg-purple-600 text-white hover:bg-purple-700 focus:outline-none focus:bg-purple-700 disabled:opacity-50 disabled:pointer-events-none" data-hs-stepper-reset-btn="" style="display: none;">
                    Reset
                </button>
            </div>
            <!-- End Button Group -->
        </div>
        <!-- End Stepper Content -->
    </div>
    <!-- End Stepper -->

    <x-footer/>
    @vite('resources/js/app.js')
</body>

</html>

    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <!-- resources/views/components/footer.blade.php -->
    <footer class="bg-transparent py-10">
        <div class="container mx-auto grid grid-cols-5 md:grid-cols-5 gap-6">
            <!-- Useful Links -->
            <div>
                <h5 class="font-bold text-white text-lg">Useful Links</h5>
                <ul class="mt-4 space-y-2 text-white">
                    <li><a href="#">Legal & Privacy</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="#">Gift Card</a></li>
                    <li><a href="#">Customer Service</a></li>
                    <li><a href="#">My Account</a></li>
                </ul>
            </div>

            <!-- Shop -->
            <div>
                <h5 class="font-bold text-white text-lg">Shop</h5>
                <ul class="mt-4 space-y-2 text-white">
                    <li><a href="#">Televisions</a></li>
                    <li><a href="#">Washing Machines</a></li>
                    <li><a href="#">Air Conditioners</a></li>
                    <li><a href="#">Laptops</a></li>
                    <li><a href="#">Accessories</a></li>
                </ul>
            </div>

            <!-- My Account -->
            <div>
                <h5 class="font-bold text-white text-lg">My Account</h5>
                <ul class="mt-4 space-y-2 text-white">
                    <li><a href="#">My Profile</a></li>
                    <li><a href="#">My Order History</a></li>
                    <li><a href="#">My Wish List</a></li>
                    <li><a href="#">Order Tracking</a></li>
                    <li><a href="#">Shopping Cart</a></li>
                </ul>
            </div>

            <!-- Company -->
            <div>
                <h5 class="font-bold text-white text-lg">Company</h5>
                <ul class="mt-4 space-y-2 text-white">
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Careers</a></li>
                    <li><a href="#">Our Blog</a></li>
                    <li><a href="#">Affiliate</a></li>
                    <li><a href="#">Contact Us</a></li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div>
                <h5 class="font-bold text-white text-lg">Need Help? Call Us Now</h5>
                <p class="mt-4 text-white">+99 0214 2542 223</p>
                <p class="mt-2 text-white">Monday - Friday: 9:00-20:00</p>
                <p class="mt-1 text-white">Saturday: 11:00 - 15:00</p>
                <div class="mt-4 flex space-x-4">
                    <a href="#"><i class="fab fa-facebook-f text-white"></i></a>
                    <a href="#"><i class="fab fa-twitter text-white"></i></a>
                    <a href="#"><i class="fab fa-instagram text-white"></i></a>
                    <a href="#"><i class="fab fa-linkedin text-white"></i></a>
                </div>
            </div>
        </div>

        <div
            class="container mx-auto mt-8 border-t pt-4 flex flex-col md:flex-row justify-center items-center text-white">
            <p>&copy; 2024 rojeconsign. All Rights Reserved.</p>
            {{-- <div class="mt-4 md:mt-0 flex space-x-4">
            <img src="pay_logo/paypal.png" alt="PayPal" class="w-8 h-8">
            <img src="pay_logo/visa.png" alt="Visa" class="w-8 h-8">
            <img src="pay_logo/mastercard.png" alt="Amex" class="w-8 h-8">
        </div> --}}
        </div>

        @vite('resources/js/app.js')

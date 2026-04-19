<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Hamro Bhansa - Authentic Nepali Cuisine</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
    </head>
    <body class="bg-[#fff8f3]" x-data="{ mobileMenuOpen: false }">
        <!-- Navbar -->
        <nav class="sticky top-0 z-50 bg-white shadow-lg">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-20">
                    <!-- Logo -->
                    <div class="flex-shrink-0">
                        <a href="#home" class="text-2xl font-bold text-[#C0392B] font-serif">
                            Hamro Bhansa
                        </a>
                    </div>

                    <!-- Desktop Navigation -->
                    <div class="hidden md:block">
                        <div class="ml-10 flex items-baseline space-x-8">
                            <a href="#home" class="text-gray-700 hover:text-[#C0392B] transition duration-300 font-medium">Home</a>
                            <a href="#menu" class="text-gray-700 hover:text-[#C0392B] transition duration-300 font-medium">Menu</a>
                            <a href="#about" class="text-gray-700 hover:text-[#C0392B] transition duration-300 font-medium">About</a>
                            <a href="#contact" class="text-gray-700 hover:text-[#C0392B] transition duration-300 font-medium">Contact</a>
                        </div>
                    </div>

                    <!-- Mobile menu button -->
                    <div class="md:hidden">
                        <button @click="mobileMenuOpen = !mobileMenuOpen" class="inline-flex items-center justify-center p-2 rounded-md text-[#C0392B] hover:bg-gray-100 focus:outline-none transition">
                            <svg class="h-6 w-6" :class="mobileMenuOpen ? 'hidden' : 'block'" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                            <svg class="h-6 w-6" :class="mobileMenuOpen ? 'block' : 'hidden'" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Mobile Navigation -->
                <div x-show="mobileMenuOpen" class="md:hidden pb-4 space-y-2">
                    <a href="#home" @click="mobileMenuOpen = false" class="text-gray-700 hover:text-[#C0392B] block px-3 py-2 rounded-md text-base font-medium">Home</a>
                    <a href="#menu" @click="mobileMenuOpen = false" class="text-gray-700 hover:text-[#C0392B] block px-3 py-2 rounded-md text-base font-medium">Menu</a>
                    <a href="#about" @click="mobileMenuOpen = false" class="text-gray-700 hover:text-[#C0392B] block px-3 py-2 rounded-md text-base font-medium">About</a>
                    <a href="#contact" @click="mobileMenuOpen = false" class="text-gray-700 hover:text-[#C0392B] block px-3 py-2 rounded-md text-base font-medium">Contact</a>
                </div>
            </div>
        </nav>

        <!-- Hero Section -->
        <section id="home" class="min-h-screen flex items-center justify-center bg-gradient-to-br from-[#fff8f3] via-[#fff0e4] to-[#fff8f3] relative overflow-hidden">
            <!-- Background decoration -->
            <div class="absolute top-10 right-10 w-72 h-72 bg-[#E67E22] rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob"></div>
            <div class="absolute bottom-10 left-10 w-72 h-72 bg-[#C0392B] rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-2000"></div>

            <div class="relative z-10 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center" data-aos="fade-up">
                <h1 class="text-5xl sm:text-6xl lg:text-7xl font-bold font-serif text-[#C0392B] mb-6 leading-tight">
                    Authentic Nepali Taste
                </h1>
                <p class="text-xl sm:text-2xl text-gray-700 mb-8 max-w-2xl mx-auto font-light">
                    Experience the warm, rich flavors of Nepal right here in Kathmandu. Handcrafted dishes prepared with love and tradition.
                </p>
                <a href="#menu" class="inline-block bg-[#C0392B] hover:bg-[#8f160b] text-white px-8 py-4 rounded-lg font-bold text-lg transition duration-300 transform hover:scale-105 shadow-lg">
                    Explore Our Menu
                </a>
            </div>
        </section>

        <!-- Menu Section -->
        <section id="menu" class="py-20 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16" data-aos="fade-up">
                    <h2 class="text-5xl font-bold font-serif text-[#C0392B] mb-4">Our Menu</h2>
                    <p class="text-xl text-gray-600">Handpicked Nepali dishes with authentic flavors</p>
                </div>

                <!-- Menu Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Dal Bhat -->
                    <div class="bg-gradient-to-br from-[#fff8f3] to-[#fff0e4] rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transition duration-300 transform hover:scale-105" data-aos="fade-up" data-aos-delay="100">
                        <div class="h-48 bg-gradient-to-br from-[#E67E22] to-[#D35400] flex items-center justify-center">
                            <img src="{{ asset('images/foods/dal-bhat.png') }}" alt="Dal Bhat" class="h-full w-full object-cover" loading="lazy">
                        </div>
                        <div class="p-6">
                            <h3 class="text-2xl font-bold text-[#C0392B] font-serif mb-2">Dal Bhat</h3>
                            <p class="text-gray-600 mb-4">Lentil curry with steamed rice, served with seasonal vegetables and pickles</p>
                            <div class="flex justify-between items-center">
                                <span class="text-2xl font-bold text-[#E67E22]">₨ 250</span>
                                <button class="bg-[#C0392B] hover:bg-[#8f160b] text-white px-4 py-2 rounded-lg transition duration-300">Order</button>
                            </div>
                        </div>
                    </div>

                    <!-- Momo -->
                    <div class="bg-gradient-to-br from-[#fff8f3] to-[#fff0e4] rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transition duration-300 transform hover:scale-105" data-aos="fade-up" data-aos-delay="200">
                        <div class="h-48 bg-gradient-to-br from-[#E67E22] to-[#D35400] flex items-center justify-center">
                            <img src="{{ asset('images/foods/momo.png') }}" alt="Momo" class="h-full w-full object-cover" loading="lazy">
                        </div>
                        <div class="p-6">
                            <h3 class="text-2xl font-bold text-[#C0392B] font-serif mb-2">Momo</h3>
                            <p class="text-gray-600 mb-4">Steamed dumplings filled with spiced meat and vegetables. A classic Nepali favorite</p>
                            <div class="flex justify-between items-center">
                                <span class="text-2xl font-bold text-[#E67E22]">₨ 180</span>
                                <button class="bg-[#C0392B] hover:bg-[#8f160b] text-white px-4 py-2 rounded-lg transition duration-300">Order</button>
                            </div>
                        </div>
                    </div>

                    <!-- Thakali Set -->
                    <div class="bg-gradient-to-br from-[#fff8f3] to-[#fff0e4] rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transition duration-300 transform hover:scale-105" data-aos="fade-up" data-aos-delay="300">
                        <div class="h-48 bg-gradient-to-br from-[#E67E22] to-[#D35400] flex items-center justify-center">
                            <img src="{{ asset('images/foods/thakali-set.png') }}" alt="Thakali Set" class="h-full w-full object-cover" loading="lazy">
                        </div>
                        <div class="p-6">
                            <h3 class="text-2xl font-bold text-[#C0392B] font-serif mb-2">Thakali Set</h3>
                            <p class="text-gray-600 mb-4">Authentic mountain cuisine with dhido, gundruk, and spiced meat curry</p>
                            <div class="flex justify-between items-center">
                                <span class="text-2xl font-bold text-[#E67E22]">₨ 350</span>
                                <button class="bg-[#C0392B] hover:bg-[#8f160b] text-white px-4 py-2 rounded-lg transition duration-300">Order</button>
                            </div>
                        </div>
                    </div>

                    <!-- Sel Roti -->
                    <div class="bg-gradient-to-br from-[#fff8f3] to-[#fff0e4] rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transition duration-300 transform hover:scale-105" data-aos="fade-up" data-aos-delay="400">
                        <div class="h-48 bg-gradient-to-br from-[#E67E22] to-[#D35400] flex items-center justify-center">
                            <img src="{{ asset('images/foods/sel-roti.png') }}" alt="Sel Roti" class="h-full w-full object-cover" loading="lazy">
                        </div>
                        <div class="p-6">
                            <h3 class="text-2xl font-bold text-[#C0392B] font-serif mb-2">Sel Roti</h3>
                            <p class="text-gray-600 mb-4">Sweet fried bread rings, crispy outside and soft inside. Perfect treat!</p>
                            <div class="flex justify-between items-center">
                                <span class="text-2xl font-bold text-[#E67E22]">₨ 80</span>
                                <button class="bg-[#C0392B] hover:bg-[#8f160b] text-white px-4 py-2 rounded-lg transition duration-300">Order</button>
                            </div>
                        </div>
                    </div>

                    <!-- Newari Khaja Set -->
                    <div class="bg-gradient-to-br from-[#fff8f3] to-[#fff0e4] rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transition duration-300 transform hover:scale-105" data-aos="fade-up" data-aos-delay="500">
                        <div class="h-48 bg-gradient-to-br from-[#E67E22] to-[#D35400] flex items-center justify-center">
                            <img src="{{ asset('images/foods/newari-khaja-set.png') }}" alt="Newari Khaja Set" class="h-full w-full object-cover" loading="lazy">
                        </div>
                        <div class="p-6">
                            <h3 class="text-2xl font-bold text-[#C0392B] font-serif mb-2">Newari Khaja Set</h3>
                            <p class="text-gray-600 mb-4">Traditional Newari delicacies with spiced meat, bamboo shoots, and local flavors</p>
                            <div class="flex justify-between items-center">
                                <span class="text-2xl font-bold text-[#E67E22]">₨ 300</span>
                                <button class="bg-[#C0392B] hover:bg-[#8f160b] text-white px-4 py-2 rounded-lg transition duration-300">Order</button>
                            </div>
                        </div>
                    </div>

                    <!-- Chowmein -->
                    <div class="bg-gradient-to-br from-[#fff8f3] to-[#fff0e4] rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transition duration-300 transform hover:scale-105" data-aos="fade-up" data-aos-delay="600">
                        <div class="h-48 bg-gradient-to-br from-[#E67E22] to-[#D35400] flex items-center justify-center">
                            <img src="{{ asset('images/foods/chowmein.png') }}" alt="Chowmein" class="h-full w-full object-cover" loading="lazy">
                        </div>
                        <div class="p-6">
                            <h3 class="text-2xl font-bold text-[#C0392B] font-serif mb-2">Chowmein</h3>
                            <p class="text-gray-600 mb-4">Crispy noodles stir-fried with vegetables and spices. A beloved street food</p>
                            <div class="flex justify-between items-center">
                                <span class="text-2xl font-bold text-[#E67E22]">₨ 150</span>
                                <button class="bg-[#C0392B] hover:bg-[#8f160b] text-white px-4 py-2 rounded-lg transition duration-300">Order</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- About Section -->
        <section id="about" class="py-20 bg-gradient-to-r from-[#fff8f3] to-[#fff0e4]">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                    <!-- About Image -->
                    <div data-aos="fade-right">
                        <div class="relative h-96 bg-gradient-to-br from-[#C0392B] to-[#E67E22] rounded-2xl shadow-2xl flex items-center justify-center overflow-hidden">
                            <div class="text-9xl opacity-30">🏔️</div>
                            <div class="absolute top-0 right-0 w-40 h-40 bg-white rounded-full mix-blend-soft-light opacity-20"></div>
                        </div>
                    </div>

                    <!-- About Content -->
                    <div data-aos="fade-left">
                        <h2 class="text-5xl font-bold font-serif text-[#C0392B] mb-6">About Hamro Bhansa</h2>
                        <p class="text-lg text-gray-700 mb-4 leading-relaxed">
                            Hamro Bhansa means "Our Kitchen" in Nepali, and that's exactly what we are—a warm, family-run establishment dedicated to sharing the authentic flavors of Nepal with our community.
                        </p>
                        <p class="text-lg text-gray-700 mb-4 leading-relaxed">
                            Rooted in the heart of Thamel, Kathmandu, we've been serving traditional Nepali cuisine with fresh, locally-sourced ingredients and time-honored recipes passed down through generations.
                        </p>
                        <p class="text-lg text-gray-700 mb-8 leading-relaxed">
                            Every dish is prepared with care and love, ensuring that every bite transports you to the mountains and valleys of Nepal. Our mission is to celebrate our culinary heritage while creating memorable dining experiences.
                        </p>
                        <div class="flex gap-4">
                            <div class="flex items-center gap-3">
                                <span class="text-4xl">✓</span>
                                <span class="text-gray-700 font-semibold">Authentic Recipes</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <span class="text-4xl">✓</span>
                                <span class="text-gray-700 font-semibold">Fresh Ingredients</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contact Section -->
        <section id="contact" class="py-20 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16" data-aos="fade-up">
                    <h2 class="text-5xl font-bold font-serif text-[#C0392B] mb-4">Get In Touch</h2>
                    <p class="text-xl text-gray-600">Visit us at our Kathmandu location</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                    <!-- Contact Info -->
                    <div data-aos="fade-right">
                        <div class="space-y-8">
                            <!-- Address -->
                            <div class="flex gap-4">
                                <div class="flex-shrink-0 text-3xl text-[#C0392B]">📍</div>
                                <div>
                                    <h3 class="text-2xl font-bold text-gray-900 mb-2">Location</h3>
                                    <p class="text-gray-700 text-lg">
                                        Thamel, Kathmandu<br>
                                        Anam Nagar Marg<br>
                                        Nepal
                                    </p>
                                </div>
                            </div>

                            <!-- Phone -->
                            <div class="flex gap-4">
                                <div class="flex-shrink-0 text-3xl text-[#C0392B]">📞</div>
                                <div>
                                    <h3 class="text-2xl font-bold text-gray-900 mb-2">Phone</h3>
                                    <a href="tel:+977-1-4700123" class="text-gray-700 text-lg hover:text-[#C0392B] transition">
                                        +977-1-4700123
                                    </a>
                                </div>
                            </div>

                            <!-- Hours -->
                            <div class="flex gap-4">
                                <div class="flex-shrink-0 text-3xl text-[#C0392B]">🕐</div>
                                <div>
                                    <h3 class="text-2xl font-bold text-gray-900 mb-2">Hours</h3>
                                    <p class="text-gray-700 text-lg">
                                        Mon - Sun: 11:00 AM - 10:00 PM<br>
                                        Open Every Day
                                    </p>
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="flex gap-4">
                                <div class="flex-shrink-0 text-3xl text-[#C0392B]">📧</div>
                                <div>
                                    <h3 class="text-2xl font-bold text-gray-900 mb-2">Email</h3>
                                    <a href="mailto:info@harobhansa.com" class="text-gray-700 text-lg hover:text-[#C0392B] transition">
                                        info@harobhansa.com
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Map -->
                    <div data-aos="fade-left">
                        <div class="rounded-xl overflow-hidden shadow-lg h-96 bg-gray-200">
                            <iframe 
                                class="w-full h-full"
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3532.7435089891647!2d85.30751!3d27.716472!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb19c77f6f6f6f%3A0x1234567890!2sThamel%2C%20Kathmandu!5e0!3m2!1sen!2snp!4v1234567890"
                                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="bg-gray-900 text-white py-8">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
                    <!-- Brand -->
                    <div>
                        <h3 class="text-2xl font-bold text-[#E67E22] font-serif mb-2">Hamro Bhansa</h3>
                        <p class="text-gray-400">Authentic Nepali Cuisine in Kathmandu</p>
                    </div>

                    <!-- Quick Links -->
                    <div>
                        <h4 class="text-lg font-bold mb-4">Quick Links</h4>
                        <ul class="space-y-2 text-gray-400">
                            <li><a href="#home" class="hover:text-[#E67E22] transition">Home</a></li>
                            <li><a href="#menu" class="hover:text-[#E67E22] transition">Menu</a></li>
                            <li><a href="#about" class="hover:text-[#E67E22] transition">About</a></li>
                            <li><a href="#contact" class="hover:text-[#E67E22] transition">Contact</a></li>
                        </ul>
                    </div>

                    <!-- Social Media -->
                    <div>
                        <h4 class="text-lg font-bold mb-4">Follow Us</h4>
                        <div class="flex gap-4">
                            <a href="#" class="text-gray-400 hover:text-[#E67E22] transition text-xl">f</a>
                            <a href="#" class="text-gray-400 hover:text-[#E67E22] transition text-xl">𝕏</a>
                            <a href="#" class="text-gray-400 hover:text-[#E67E22] transition text-xl">📷</a>
                        </div>
                    </div>
                </div>

                <div class="border-t border-gray-800 pt-8 text-center text-gray-400">
                    <p>&copy; 2024 Hamro Bhansa. All rights reserved. | Made with ❤️ in Kathmandu</p>
                </div>
            </div>
        </footer>

        <!-- Scripts -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
        <script>
            AOS.init({
                duration: 800,
                easing: 'ease-in-out-cubic',
                once: true
            });
        </script>
    </body>
</html>

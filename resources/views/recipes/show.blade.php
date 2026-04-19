<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ $recipe->name }} - Ghar Ko Mitha Khana</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
    </head>
    <body class="bg-[#fff8f3]" x-data="{ mobileMenuOpen: false }">
        <!-- Navbar -->
        <nav class="sticky top-0 z-50 bg-white shadow-lg">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-20">
                    <div class="flex-shrink-0">
                        <a href="/" class="text-2xl font-bold text-[#C0392B] font-serif">
                            Ghar Ko Mitha Khana
                        </a>
                    </div>

                    <div class="hidden md:block">
                        <div class="ml-10 flex items-baseline space-x-8">
                            <a href="/" class="text-gray-700 hover:text-[#C0392B] transition duration-300 font-medium">Home</a>
                            <a href="/#recipes" class="text-gray-700 hover:text-[#C0392B] transition duration-300 font-medium">Recipes</a>
                            <a href="/#categories" class="text-gray-700 hover:text-[#C0392B] transition duration-300 font-medium">Categories</a>
                            <a href="/#about" class="text-gray-700 hover:text-[#C0392B] transition duration-300 font-medium">About</a>
                        </div>
                    </div>

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

                <div x-show="mobileMenuOpen" class="md:hidden pb-4 space-y-2">
                    <a href="/" @click="mobileMenuOpen = false" class="text-gray-700 hover:text-[#C0392B] block px-3 py-2 rounded-md text-base font-medium">Home</a>
                    <a href="/#recipes" @click="mobileMenuOpen = false" class="text-gray-700 hover:text-[#C0392B] block px-3 py-2 rounded-md text-base font-medium">Recipes</a>
                    <a href="/#categories" @click="mobileMenuOpen = false" class="text-gray-700 hover:text-[#C0392B] block px-3 py-2 rounded-md text-base font-medium">Categories</a>
                    <a href="/#about" @click="mobileMenuOpen = false" class="text-gray-700 hover:text-[#C0392B] block px-3 py-2 rounded-md text-base font-medium">About</a>
                </div>
            </div>
        </nav>

        <!-- Back Button & Hero -->
        <section class="bg-gradient-to-br from-[#fff8f3] via-[#fff0e4] to-[#fff8f3] py-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <a href="/" class="inline-flex items-center text-[#C0392B] hover:text-[#8f160b] mb-8 font-semibold transition">
                    ← Back to Recipes
                </a>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center" data-aos="fade-up">
                    <!-- Recipe Image -->
                    <div class="bg-gradient-to-br from-[#C0392B] to-[#E67E22] rounded-2xl h-80 flex items-center justify-center shadow-2xl overflow-hidden">
                        <img src="{{ asset('images/foods/' . $recipe->slug . '.png') }}" alt="{{ $recipe->name }}" class="h-full w-full object-cover" loading="lazy" onerror="this.onerror=null;this.src='{{ asset('images/foods/dal-bhat.png') }}';">
                    </div>

                    <!-- Recipe Header Info -->
                    <div>
                        <p class="text-[#E67E22] font-bold text-lg mb-2">{{ $recipe->category }}</p>
                        <h1 class="text-5xl md:text-6xl font-bold font-serif text-[#C0392B] mb-4">{{ $recipe->name }}</h1>
                        <p class="text-xl text-gray-700 mb-8 leading-relaxed">{{ $recipe->description }}</p>

                        <div class="grid grid-cols-2 gap-4">
                            <div class="bg-white rounded-lg p-6 shadow-md">
                                <p class="text-sm text-gray-600 font-semibold">⏱️ PREP TIME</p>
                                <p class="text-3xl font-bold text-[#C0392B]">{{ $recipe->prep_time }}<span class="text-lg">m</span></p>
                            </div>
                            <div class="bg-white rounded-lg p-6 shadow-md">
                                <p class="text-sm text-gray-600 font-semibold">🍳 COOK TIME</p>
                                <p class="text-3xl font-bold text-[#E67E22]">{{ $recipe->cook_time }}<span class="text-lg">m</span></p>
                            </div>
                            <div class="bg-white rounded-lg p-6 shadow-md">
                                <p class="text-sm text-gray-600 font-semibold">⏲️ TOTAL TIME</p>
                                <p class="text-3xl font-bold text-[#C0392B]">{{ $recipe->total_time }}<span class="text-lg">m</span></p>
                            </div>
                            <div class="bg-white rounded-lg p-6 shadow-md">
                                <p class="text-sm text-gray-600 font-semibold">👥 SERVINGS</p>
                                <p class="text-3xl font-bold text-[#E67E22]">{{ $recipe->servings }}</p>
                            </div>
                            <div class="bg-white rounded-lg p-6 shadow-md">
                                <p class="text-sm text-gray-600 font-semibold">📊 DIFFICULTY</p>
                                <p class="text-2xl font-bold text-[#C0392B]">{{ $recipe->difficulty }}</p>
                            </div>
                            <div class="bg-white rounded-lg p-6 shadow-md">
                                <p class="text-sm text-gray-600 font-semibold">🔥 CALORIES</p>
                                <p class="text-3xl font-bold text-[#E67E22]">{{ $recipe->calories }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Recipe Content -->
        <section class="py-20 bg-white">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Ingredients Section -->
                <div class="mb-16" data-aos="fade-up">
                    <h2 class="text-4xl font-bold font-serif text-[#C0392B] mb-8 pb-4 border-b-4 border-[#E67E22]">
                        Ingredients
                    </h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @foreach($recipe->ingredients as $ingredient)
                            <div class="flex items-start bg-gradient-to-br from-[#fff8f3] to-[#fff0e4] rounded-lg p-4">
                                <span class="text-2xl mr-4">✓</span>
                                <div class="flex-1">
                                    <p class="font-semibold text-gray-900">{{ $ingredient['item'] }}</p>
                                    <p class="text-[#E67E22] font-bold">
                                        {{ $ingredient['quantity'] }} {{ $ingredient['unit'] }}
                                        @if(isset($ingredient[3]))
                                            ({{ $ingredient[3] }})
                                        @endif
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Instructions Section -->
                <div class="mb-16" data-aos="fade-up">
                    <h2 class="text-4xl font-bold font-serif text-[#C0392B] mb-8 pb-4 border-b-4 border-[#E67E22]">
                        Step-by-Step Instructions
                    </h2>
                    <div class="space-y-6">
                        @foreach($recipe->instructions as $index => $instruction)
                            <div class="flex gap-6 items-start" data-aos="fade-left" data-aos-delay="{{ $index * 100 }}">
                                <div class="flex-shrink-0 flex items-center justify-center w-12 h-12 rounded-full bg-[#C0392B] text-white font-bold text-lg">
                                    {{ $index + 1 }}
                                </div>
                                <div class="flex-1 pt-1">
                                    <p class="text-gray-700 text-lg leading-relaxed">{{ $instruction }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Pro Tips Section -->
                @if($recipe->tips)
                <div class="mb-16 bg-gradient-to-br from-[#fff8f3] to-[#fff0e4] rounded-2xl p-8" data-aos="fade-up">
                    <h2 class="text-3xl font-bold font-serif text-[#C0392B] mb-8 flex items-center gap-3">
                        💡 Pro Cooking Tips
                    </h2>
                    <ul class="space-y-4">
                        @foreach($recipe->tips as $tip)
                            <li class="flex items-start gap-4">
                                <span class="text-2xl flex-shrink-0">🎯</span>
                                <p class="text-gray-700 text-lg leading-relaxed">{{ $tip }}</p>
                            </li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <!-- Share Section -->
                <div class="text-center py-12 border-t-2 border-[#E67E22]" data-aos="fade-up">
                    <h3 class="text-2xl font-bold text-gray-900 mb-6">Share This Recipe</h3>
                    <div class="flex justify-center gap-4">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}" target="_blank" class="bg-[#C0392B] hover:bg-[#8f160b] text-white px-6 py-3 rounded-lg font-semibold transition">
                            Facebook
                        </a>
                        <a href="https://twitter.com/intent/tweet?url={{ url()->current() }}&text=Check out this recipe for {{ $recipe->name }}!" target="_blank" class="bg-[#E67E22] hover:bg-[#d47010] text-white px-6 py-3 rounded-lg font-semibold transition">
                            Twitter
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- More Recipes Section -->
        <section class="py-20 bg-gradient-to-r from-[#fff8f3] to-[#fff0e4]">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-4xl font-bold font-serif text-[#C0392B] mb-12 text-center">More Recipes to Try</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- You can add related recipes here -->
                    <div class="text-center py-8">
                        <a href="/" class="inline-block bg-[#C0392B] hover:bg-[#8f160b] text-white px-8 py-4 rounded-lg font-bold transition duration-300">
                            Browse All Recipes
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="bg-gray-900 text-white py-8">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
                    <div>
                        <h3 class="text-2xl font-bold text-[#E67E22] font-serif mb-2">Ghar Ko Mitha Khana</h3>
                        <p class="text-gray-400">Authentic Nepali Recipes</p>
                    </div>

                    <div>
                        <h4 class="text-lg font-bold mb-4">Quick Links</h4>
                        <ul class="space-y-2 text-gray-400">
                            <li><a href="/" class="hover:text-[#E67E22] transition">Home</a></li>
                            <li><a href="/#recipes" class="hover:text-[#E67E22] transition">Recipes</a></li>
                            <li><a href="/#about" class="hover:text-[#E67E22] transition">About</a></li>
                        </ul>
                    </div>

                    <div>
                        <h4 class="text-lg font-bold mb-4">This Recipe</h4>
                        <p class="text-gray-400">{{ $recipe->name }}</p>
                        <p class="text-gray-500 text-sm mt-2">Category: {{ $recipe->category }}</p>
                    </div>
                </div>

                <div class="border-t border-gray-800 pt-8 text-center text-gray-400">
                    <p>&copy; 2024 Ghar Ko Mitha Khana. All rights reserved. | Made with ❤️ for Nepali Food Lovers</p>
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

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Ghar Ko Mitha Khana - Authentic Nepali Recipes</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
    </head>
    <body class="bg-gradient-to-b from-[#fffaf4] via-[#fff3e8] to-[#fff9f4] text-[#3f1206]" x-data="{ mobileMenuOpen: false }">
        <!-- Navbar -->
        <nav class="sticky top-0 z-50 bg-white/90 backdrop-blur-md shadow-lg border-b border-[#e9b48a]">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-20">
                    <!-- Logo -->
                    <div class="flex-shrink-0">
                        <a href="/" class="text-2xl font-bold text-[#C0392B] font-serif">
                            Ghar Ko Mitha Khana
                        </a>
                    </div>

                    <!-- Desktop Navigation -->
                    <div class="hidden md:block">
                        <div class="ml-10 flex items-baseline space-x-8">
                            <a href="/" class="text-[#5d2311] hover:text-[#E67E22] transition duration-300 font-semibold">Home</a>
                            <a href="#recipes" class="text-[#5d2311] hover:text-[#E67E22] transition duration-300 font-semibold">Recipes</a>
                            <a href="#categories" class="text-[#5d2311] hover:text-[#E67E22] transition duration-300 font-semibold">Categories</a>
                            <a href="#about" class="text-[#5d2311] hover:text-[#E67E22] transition duration-300 font-semibold">About</a>
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
                    <a href="/" @click="mobileMenuOpen = false" class="text-[#5d2311] hover:text-[#E67E22] block px-3 py-2 rounded-md text-base font-semibold">Home</a>
                    <a href="#recipes" @click="mobileMenuOpen = false" class="text-[#5d2311] hover:text-[#E67E22] block px-3 py-2 rounded-md text-base font-semibold">Recipes</a>
                    <a href="#categories" @click="mobileMenuOpen = false" class="text-[#5d2311] hover:text-[#E67E22] block px-3 py-2 rounded-md text-base font-semibold">Categories</a>
                    <a href="#about" @click="mobileMenuOpen = false" class="text-[#5d2311] hover:text-[#E67E22] block px-3 py-2 rounded-md text-base font-semibold">About</a>
                </div>
            </div>
        </nav>

        <!-- Hero Section -->
        <section id="home" class="min-h-screen flex items-center justify-center bg-gradient-to-br from-[#fff9f1] via-[#ffe8d3] to-[#fff4e8] relative overflow-hidden py-20 border-b border-[#f0c7aa]">
            <!-- Animated background decoration -->
            <div class="absolute top-10 right-10 w-96 h-96 bg-[#f59e0b] rounded-full mix-blend-multiply filter blur-3xl opacity-35 animate-pulse"></div>
            <div class="absolute bottom-10 left-10 w-96 h-96 bg-[#be123c] rounded-full mix-blend-multiply filter blur-3xl opacity-25 animate-pulse"></div>
            <div class="absolute top-1/2 left-1/4 w-80 h-80 bg-[#fb923c] rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-pulse" style="animation-delay: 1s;"></div>

            <!-- Floating decoration elements -->
            <div class="absolute top-20 left-20 text-6xl opacity-10 animate-bounce" style="animation-delay: 0s;">🌶️</div>
            <div class="absolute bottom-32 right-20 text-6xl opacity-10 animate-bounce" style="animation-delay: 1s;">🍛</div>
            <div class="absolute top-1/2 right-10 text-5xl opacity-10 animate-bounce" style="animation-delay: 2s;">🥘</div>

            <div class="relative z-10 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center" data-aos="fade-up">
                <div class="mb-6 inline-block">
                    <span class="px-4 py-2 bg-white/75 text-[#9a2517] rounded-full text-sm font-bold border border-[#f4b184] shadow-sm">
                        🌟 Authentic Nepali Cuisine
                    </span>
                </div>
                <h1 class="text-5xl sm:text-6xl lg:text-7xl font-bold font-serif mb-6 leading-tight bg-gradient-to-r from-[#991b1b] via-[#e67e22] to-[#b45309] bg-clip-text text-transparent drop-shadow-sm">
                    Ghar Ko Mitha Khana
                </h1>
                <p class="text-2xl sm:text-3xl text-[#9a2517] mb-4 font-semibold">
                    Your Home Kitchen, Our Traditional Recipes
                </p>
                <p class="text-lg text-[#5f2e1d] mb-12 max-w-2xl mx-auto leading-relaxed">
                    Master 11 authentic Nepali dishes with detailed step-by-step recipes, tested ingredients, and professional cooking tips. From mountain staples to festival favorites.
                </p>
                <a href="#recipes" class="inline-flex items-center gap-2 bg-gradient-to-r from-[#be123c] via-[#dc2626] to-[#f59e0b] hover:shadow-2xl text-white px-10 py-4 rounded-full font-bold text-lg transition duration-300 transform hover:scale-110 shadow-lg shadow-[#c2410c]/30">
                    <span>✨ Explore Recipes</span>
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path></svg>
                </a>
            </div>
        </section>

        <!-- Stats Section -->
        <section class="py-12 bg-gradient-to-r from-[#991b1b] via-[#dc2626] to-[#f59e0b] relative overflow-hidden border-y border-[#f6c29a]">
            <div class="absolute inset-0 opacity-10">
                <div class="absolute top-2 left-10 text-4xl">🍛</div>
                <div class="absolute bottom-2 right-20 text-5xl">🥘</div>
                <div class="absolute top-1/2 right-1/4 text-3xl">🌶️</div>
            </div>
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
                    <div data-aos="zoom-in">
                        <p class="text-5xl font-bold text-white mb-2">11</p>
                        <p class="text-xl text-white/90">Authentic Recipes</p>
                    </div>
                    <div data-aos="zoom-in" data-aos-delay="100">
                        <p class="text-5xl font-bold text-white mb-2">5</p>
                        <p class="text-xl text-white/90">Categories</p>
                    </div>
                    <div data-aos="zoom-in" data-aos-delay="200">
                        <p class="text-5xl font-bold text-white mb-2">∞</p>
                        <p class="text-xl text-white/90">Flavor and Tradition</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Featured Recipe Section -->
        @if($featuredRecipe)
        <section class="py-20 bg-gradient-to-b from-[#fffdfb] to-[#fff4eb] relative">
            <div class="absolute top-0 right-0 w-64 h-64 bg-[#E67E22]/10 rounded-full blur-3xl -z-10"></div>
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16" data-aos="fade-up">
                    <div class="inline-block mb-4">
                        <span class="px-4 py-2 bg-[#E67E22]/20 text-[#E67E22] rounded-full text-sm font-bold border border-[#E67E22]">
                            🌟 Chef's Pick
                        </span>
                    </div>
                    <h2 class="text-4xl font-bold font-serif text-[#C0392B] mb-2">Recipe of the Day</h2>
                    <p class="text-gray-600 text-lg">Discover our most recommended authentic Nepali dish</p>
                </div>

                <div class="bg-gradient-to-br from-[#fff7ed] via-[#ffedd5] to-white rounded-3xl overflow-hidden shadow-2xl border-4 border-[#f59e0b]/30" data-aos="zoom-in">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 p-8 md:p-12">
                        <!-- Featured Recipe Image -->
                        <div class="flex items-center justify-center bg-gradient-to-br from-[#C0392B] via-[#E67E22] to-[#D68910] rounded-2xl h-96 md:h-full relative overflow-hidden group">
                            <div class="absolute inset-0 opacity-20 group-hover:opacity-40 transition duration-300" style="background: radial-gradient(circle at 30% 70%, rgba(255,255,255,0.3), rgba(0,0,0,0.1));"></div>
                            <img src="{{ asset('images/foods/' . $featuredRecipe->slug . '.png') }}" alt="{{ $featuredRecipe->name }}" class="h-full w-full object-cover group-hover:scale-110 transition duration-300 transform" loading="lazy" onerror="this.onerror=null;this.src='{{ asset('images/foods/dal-bhat.png') }}';">
                        </div>

                        <!-- Featured Recipe Info -->
                        <div class="flex flex-col justify-center">
                            <div class="mb-4 flex gap-2 flex-wrap">
                                <span class="px-3 py-1 bg-[#C0392B]/10 text-[#C0392B] rounded-full text-xs font-bold border border-[#C0392B]/30">
                                    {{ $featuredRecipe->category }}
                                </span>
                                <span class="px-3 py-1 bg-[#E67E22]/10 text-[#E67E22] rounded-full text-xs font-bold border border-[#E67E22]/30">
                                    💪 {{ $featuredRecipe->difficulty }}
                                </span>
                            </div>
                            <h3 class="text-5xl font-bold font-serif text-[#9a2517] mb-4">{{ $featuredRecipe->name }}</h3>
                            
                            <p class="text-[#5f2e1d] text-lg mb-8 leading-relaxed line-clamp-3">{{ $featuredRecipe->description }}</p>

                            <div class="grid grid-cols-2 gap-4 mb-8">
                                <div class="bg-white rounded-xl p-4 shadow-md border-l-4 border-[#C0392B] hover:shadow-lg transition">
                                    <p class="text-xs text-gray-600 font-semibold">⏱️ TOTAL TIME</p>
                                    <p class="text-3xl font-bold text-[#C0392B] mt-1">{{ $featuredRecipe->total_time }}</p>
                                    <p class="text-xs text-gray-600">minutes</p>
                                </div>
                                <div class="bg-white rounded-xl p-4 shadow-md border-l-4 border-[#E67E22] hover:shadow-lg transition">
                                    <p class="text-xs text-gray-600 font-semibold">👥 SERVINGS</p>
                                    <p class="text-3xl font-bold text-[#E67E22] mt-1">{{ $featuredRecipe->servings }}</p>
                                    <p class="text-xs text-gray-600">people</p>
                                </div>
                                <div class="bg-white rounded-xl p-4 shadow-md border-l-4 border-[#C0392B] hover:shadow-lg transition">
                                    <p class="text-xs text-gray-600 font-semibold">📊 DIFFICULTY</p>
                                    <p class="text-3xl font-bold text-[#C0392B] mt-1">{{ $featuredRecipe->difficulty }}</p>
                                    <p class="text-xs text-gray-600">level</p>
                                </div>
                                <div class="bg-white rounded-xl p-4 shadow-md border-l-4 border-[#E67E22] hover:shadow-lg transition">
                                    <p class="text-xs text-gray-600 font-semibold">🔥 CALORIES</p>
                                    <p class="text-3xl font-bold text-[#E67E22] mt-1">{{ $featuredRecipe->calories }}</p>
                                    <p class="text-xs text-gray-600">per serving</p>
                                </div>
                            </div>

                            <a href="{{ route('recipes.show', $featuredRecipe->slug) }}" class="inline-flex items-center justify-center gap-2 bg-gradient-to-r from-[#be123c] to-[#f59e0b] hover:shadow-2xl text-white px-8 py-4 rounded-xl font-bold text-lg transition duration-300 transform hover:scale-105 w-full">
                                <span>👨‍🍳 View Full Recipe</span>
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path></svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @endif

        <!-- Search & Filter Section -->
        <section id="recipes" class="py-16 bg-gradient-to-b from-[#ffe9d6] via-[#fff4ea] to-[#fffdfb] border-y border-[#f3d6bf]">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <form method="GET" action="/" class="space-y-8" data-aos="fade-up">
                    <!-- Search Bar with Icon -->
                    <div class="relative">
                        <label class="block text-lg font-bold text-[#9a2517] mb-4">
                            🔍 Find Your Recipe
                        </label>
                        <div class="flex flex-col sm:flex-row gap-3">
                            <div class="flex-1 relative">
                                <input 
                                    type="text" 
                                    name="search" 
                                    placeholder="Search by recipe name..." 
                                    value="{{ request('search') }}"
                                    class="w-full px-6 py-4 bg-white border-2 border-[#f59e0b]/40 rounded-xl focus:outline-none focus:border-[#be123c] focus:ring-2 focus:ring-[#be123c]/20 transition shadow-md text-lg"
                                >
                                <svg class="absolute right-4 top-4 w-6 h-6 text-[#f59e0b] opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                            </div>
                            <button type="submit" class="px-8 py-4 bg-gradient-to-r from-[#be123c] to-[#f59e0b] hover:shadow-lg text-white rounded-xl font-bold transition duration-300 transform hover:scale-105 shadow-md flex items-center justify-center gap-2 whitespace-nowrap">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 9l3 3L9 20"></path></svg>
                                Search
                            </button>
                        </div>
                    </div>

                    <!-- Category Filter -->
                    <div id="categories" class="space-y-4">
                        <label class="block text-lg font-bold text-[#9a2517]">
                            🏷️ Filter by Category
                        </label>
                        <div class="flex flex-wrap gap-3">
                            <a href="/" class="px-6 py-3 rounded-full font-semibold transition duration-300 transform hover:scale-105 {{ !request('category') ? 'bg-gradient-to-r from-[#be123c] to-[#f59e0b] text-white shadow-lg' : 'bg-white text-[#9a2517] border-2 border-[#be123c] hover:bg-[#be123c] hover:text-white' }}">
                                ✨ All
                            </a>
                            @foreach($categories as $category)
                                <a href="?category={{ urlencode($category) }}" class="px-6 py-3 rounded-full font-semibold transition duration-300 transform hover:scale-105 {{ request('category') === $category ? 'bg-gradient-to-r from-[#be123c] to-[#f59e0b] text-white shadow-lg' : 'bg-white text-[#9a2517] border-2 border-[#be123c] hover:bg-[#be123c] hover:text-white' }}">
                                    {{ $category }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                </form>
            </div>
        </section>

        <!-- Recipes Grid -->
        <section class="py-20 bg-gradient-to-b from-[#fffefc] to-[#fff2e7]">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16" data-aos="fade-up">
                    <h2 class="text-5xl font-bold font-serif text-[#9a2517] mb-4">All Recipes</h2>
                    <p class="text-xl text-gray-700">Handpicked Nepali dishes with authentic flavors & detailed instructions</p>
                </div>

                @if($recipes->count() > 0)
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
                        @foreach($recipes as $recipe)
                            <div class="group bg-[#fffaf6] rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition duration-300 transform hover:-translate-y-2 border border-[#f5d5be] hover:border-[#f59e0b]/40" data-aos="fade-up">
                                <!-- Card Header image -->
                                <div class="h-48 bg-gradient-to-br from-[#f59e0b] via-[#ea580c] to-[#c2410c] flex items-center justify-center relative overflow-hidden group-hover:scale-110 transition duration-300">
                                    <div class="absolute inset-0 opacity-20 group-hover:opacity-40 transition" style="background: radial-gradient(circle at 30% 70%, rgba(255,255,255,0.3), rgba(0,0,0,0.1));"></div>
                                    <img src="{{ asset('images/foods/' . $recipe->slug . '.png') }}" alt="{{ $recipe->name }}" class="h-full w-full object-cover group-hover:scale-125 transition duration-300" loading="lazy" onerror="this.onerror=null;this.src='{{ asset('images/foods/dal-bhat.png') }}';">
                                </div>
                                
                                <div class="p-6 relative">
                                    <!-- Category & Difficulty Tags -->
                                    <div class="flex justify-between items-start mb-3 gap-2">
                                        <span class="px-3 py-1 bg-[#C0392B]/10 text-[#C0392B] rounded-full text-xs font-bold">
                                            {{ $recipe->category }}
                                        </span>
                                        <span class="px-3 py-1 bg-[#E67E22]/10 text-[#E67E22] rounded-full text-xs font-bold">
                                            @if($recipe->difficulty === 'Easy')
                                                ⭐ Easy
                                            @elseif($recipe->difficulty === 'Medium')
                                                ⭐⭐ Medium
                                            @else
                                                ⭐⭐⭐ Hard
                                            @endif
                                        </span>
                                    </div>

                                    <h3 class="text-2xl font-bold text-[#9a2517] font-serif mb-2 group-hover:text-[#ea580c] transition">{{ $recipe->name }}</h3>
                                    <p class="text-[#65412f] mb-4 line-clamp-2 text-sm leading-relaxed">{{ $recipe->description }}</p>
                                    
                                    <!-- Recipe Quick Info -->
                                    <div class="grid grid-cols-4 gap-2 mb-6 py-3 border-y border-gray-100">
                                        <div class="text-center">
                                            <p class="text-2xl">⏱️</p>
                                            <p class="text-xs font-semibold text-gray-700">{{ $recipe->total_time }}</p>
                                            <p class="text-xs text-gray-500">min</p>
                                        </div>
                                        <div class="text-center">
                                            <p class="text-2xl">👥</p>
                                            <p class="text-xs font-semibold text-gray-700">{{ $recipe->servings }}</p>
                                            <p class="text-xs text-gray-500">srv</p>
                                        </div>
                                        <div class="text-center">
                                            <p class="text-2xl">🔥</p>
                                            <p class="text-xs font-semibold text-gray-700">{{ $recipe->calories }}</p>
                                            <p class="text-xs text-gray-500">cal</p>
                                        </div>
                                        <div class="text-center">
                                            <p class="text-2xl">💪</p>
                                            <p class="text-xs font-semibold text-gray-700">
                                                @if($recipe->difficulty === 'Easy')
                                                    Easy
                                                @elseif($recipe->difficulty === 'Medium')
                                                    Med
                                                @else
                                                    Hard
                                                @endif
                                            </p>
                                            <p class="text-xs text-gray-500">lvl</p>
                                        </div>
                                    </div>

                                    <a href="{{ route('recipes.show', $recipe->slug) }}" class="block w-full bg-gradient-to-r from-[#be123c] to-[#f59e0b] hover:from-[#991b1b] hover:to-[#d97706] text-white text-center px-4 py-3 rounded-lg font-bold transition duration-300 transform group-hover:scale-105 shadow-md">
                                        👨‍🍳 View Recipe
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    <div class="flex justify-center mb-8">
                        {{ $recipes->links() }}
                    </div>
                @else
                    <div class="text-center py-12 bg-gradient-to-r from-[#fff3e3] to-[#ffe4cf] rounded-2xl border border-[#f1c4a1]">
                        <p class="text-3xl mb-4">🤔</p>
                        <p class="text-2xl text-gray-600 mb-4">No recipes found. Try a different search.</p>
                        <a href="/" class="inline-block bg-gradient-to-r from-[#be123c] to-[#f59e0b] hover:from-[#991b1b] hover:to-[#d97706] text-white px-8 py-4 rounded-lg font-bold transition duration-300">
                            Reset Filters
                        </a>
                    </div>
                @endif
            </div>
        </section>

        <!-- About Section -->
        <section id="about" class="py-20 bg-gradient-to-r from-[#881337] via-[#be123c] to-[#f59e0b] relative overflow-hidden">
            <!-- Decorative elements -->
            <div class="absolute top-0 right-0 w-96 h-96 bg-white/10 rounded-full blur-3xl -z-0"></div>
            <div class="absolute bottom-0 left-0 w-72 h-72 bg-white/10 rounded-full blur-3xl -z-0"></div>
            
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10" data-aos="fade-up">
                <div class="mb-6 inline-block">
                    <span class="text-5xl">🏡</span>
                </div>
                <h2 class="text-5xl font-bold font-serif text-white mb-8">About This Recipe Collection</h2>
                <p class="text-lg text-white/95 mb-8 leading-relaxed max-w-3xl mx-auto">
                    <span class="font-bold">Ghar Ko Mitha Khana</span>, which means "Our Kitchen's Sweet Food," is a carefully curated collection of authentic Nepali recipes. Each recipe has been developed with detailed ingredients, step-by-step instructions, professional tips, and nutritional information to help you recreate the authentic flavors of Nepal in your own kitchen.
                </p>
                <p class="text-lg text-white/95 leading-relaxed max-w-3xl mx-auto">
                    From mountain staples like <span class="font-bold">Dal Bhat</span> and <span class="font-bold">Dhido</span> to festival favorites like <span class="font-bold">Sel Roti</span> and <span class="font-bold">Yomari</span>, explore the rich culinary heritage of Nepal with our comprehensive recipe guides.
                </p>
                
                <div class="mt-12 grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-white/12 backdrop-blur-sm rounded-xl p-6 border border-white/25 hover:bg-white/20 transition">
                        <p class="text-3xl mb-3">👨‍🍳</p>
                        <p class="text-white font-semibold">Authentic Recipes</p>
                        <p class="text-white/80 text-sm mt-1">From real Nepali home kitchens</p>
                    </div>
                    <div class="bg-white/12 backdrop-blur-sm rounded-xl p-6 border border-white/25 hover:bg-white/20 transition">
                        <p class="text-3xl mb-3">📚</p>
                        <p class="text-white font-semibold">Detailed Guides</p>
                        <p class="text-white/80 text-sm mt-1">Step-by-step instructions & tips</p>
                    </div>
                    <div class="bg-white/12 backdrop-blur-sm rounded-xl p-6 border border-white/25 hover:bg-white/20 transition">
                        <p class="text-3xl mb-3">🌍</p>
                        <p class="text-white font-semibold">Cultural Heritage</p>
                        <p class="text-white/80 text-sm mt-1">Preserve Nepali food traditions</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="bg-gradient-to-r from-[#20070f] via-[#2d0a14] to-[#2f1208] text-white py-8 border-t border-[#5f2d1c]">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
                    <!-- Brand -->
                    <div>
                        <h3 class="text-2xl font-bold text-[#E67E22] font-serif mb-2">Ghar Ko Mitha Khana</h3>
                        <p class="text-gray-400">Authentic Nepali Recipes</p>
                    </div>

                    <!-- Quick Links -->
                    <div>
                        <h4 class="text-lg font-bold mb-4">Quick Links</h4>
                        <ul class="space-y-2 text-gray-400">
                            <li><a href="/" class="hover:text-[#E67E22] transition">Home</a></li>
                            <li><a href="#recipes" class="hover:text-[#E67E22] transition">Recipes</a></li>
                            <li><a href="#categories" class="hover:text-[#E67E22] transition">Categories</a></li>
                            <li><a href="#about" class="hover:text-[#E67E22] transition">About</a></li>
                        </ul>
                    </div>

                    <!-- Recipe Categories -->
                    <div>
                        <h4 class="text-lg font-bold mb-4">Categories</h4>
                        <ul class="space-y-2 text-gray-400">
                            @foreach($categories->take(4) as $category)
                                <li><a href="?category={{ urlencode($category) }}" class="hover:text-[#E67E22] transition">{{ $category }}</a></li>
                            @endforeach
                        </ul>
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

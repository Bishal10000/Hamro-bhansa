<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ __('ui.site_title') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap');
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .spice-float {
            animation: floatSpice 6s ease-in-out infinite;
        }
        .spice-float-delay {
            animation: floatSpice 7.5s ease-in-out infinite;
            animation-delay: 0.8s;
        }
        @keyframes floatSpice {
            0%, 100% { transform: translateY(0) translateX(0); }
            50% { transform: translateY(-14px) translateX(8px); }
        }
    </style>
</head>
<body class="bg-[#FFFBF2] text-[#24100f]">

    <nav class="sticky top-0 z-50 border-b border-white/30 bg-[#7B1D1D]/70 backdrop-blur-xl">
        <div class="mx-auto flex max-w-7xl items-center gap-4 px-4 py-3 sm:px-6 lg:px-8">
            <a href="{{ route('recipes.index') }}" class="cursor-pointer text-lg font-extrabold text-[#F4A226] transition duration-300 hover:opacity-90 sm:text-2xl">🍲 {{ __('ui.brand') }}</a>

            <div class="ml-auto hidden items-center gap-3 md:flex">
                <a href="{{ route('recipes.index') }}" class="cursor-pointer rounded-full bg-white/15 px-4 py-2 text-sm font-semibold text-white transition duration-200 hover:bg-white/25">{{ __('ui.home') }}</a>
                <a href="#recipes" class="cursor-pointer rounded-full bg-white/15 px-4 py-2 text-sm font-semibold text-white transition duration-200 hover:bg-white/25">{{ __('ui.recipes') }}</a>
                <a href="#categories" class="cursor-pointer rounded-full bg-white/15 px-4 py-2 text-sm font-semibold text-white transition duration-200 hover:bg-white/25">{{ __('ui.categories') }}</a>
                <a href="{{ route('locale.switch', 'en') }}" class="rounded-full border border-amber-200 bg-white px-3 py-1 text-sm font-semibold text-amber-700 transition hover:bg-amber-50">🇬🇧 EN</a>
                <a href="{{ route('locale.switch', 'ne') }}" class="rounded-full border border-amber-200 bg-white px-3 py-1 text-sm font-semibold text-amber-700 transition hover:bg-amber-50">🇳🇵 NP</a>
            </div>

            <form method="GET" action="{{ route('recipes.index') }}" class="hidden lg:block">
                <div class="flex items-center rounded-full border border-white/30 bg-white/20 px-3 py-1.5">
                    <svg class="mr-2 h-4 w-4 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="11" cy="11" r="8"></circle>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                    </svg>
                    <input name="search" value="{{ request('search') }}" placeholder="{{ __('ui.search_placeholder') }}" class="w-44 bg-transparent text-sm text-white placeholder:text-white/80 outline-none" />
                </div>
            </form>
        </div>
    </nav>

    <section class="relative overflow-hidden bg-gradient-to-br from-[#F4A226] to-[#7B1D1D] px-4 py-24 sm:px-6 lg:px-8">
        <div class="spice-float absolute left-10 top-14 h-24 w-24 rounded-full bg-white/10 blur-md"></div>
        <div class="spice-float-delay absolute bottom-20 right-16 h-32 w-32 rounded-full bg-[#F4A226]/40 blur-lg"></div>
        <div class="spice-float absolute bottom-10 left-1/3 h-16 w-16 rounded-full bg-white/15 blur-sm"></div>

        <div class="relative mx-auto max-w-5xl text-center">
            <h1 class="text-4xl font-extrabold leading-tight text-white sm:text-5xl lg:text-6xl">{!! __('ui.hero_title') !!}</h1>
            <p class="mx-auto mt-4 max-w-2xl text-lg text-white/90 sm:text-xl">{{ __('ui.hero_subtitle') }}</p>

            <div class="mt-8 flex flex-wrap items-center justify-center gap-4">
                <a href="#recipes" class="cursor-pointer rounded-full bg-[#F4A226] px-7 py-3 font-bold text-[#2e1613] shadow-[0_0_30px_rgba(244,162,38,0.45)] transition duration-300 hover:scale-105 hover:shadow-[0_0_40px_rgba(244,162,38,0.65)]">{{ __('ui.browse_recipes') }}</a>
                @if($featuredRecipe)
                    <a href="{{ route('recipes.show', $featuredRecipe->slug) }}" class="cursor-pointer rounded-full border-2 border-white px-7 py-3 font-bold text-white transition duration-300 hover:bg-white hover:text-[#7B1D1D]">{{ __('ui.featured_recipe') }}</a>
                @else
                    <a href="#featured" class="cursor-pointer rounded-full border-2 border-white px-7 py-3 font-bold text-white transition duration-300 hover:bg-white hover:text-[#7B1D1D]">{{ __('ui.featured_recipe') }}</a>
                @endif
            </div>
        </div>
    </section>

    <section class="bg-[#7B1D1D] px-4 py-4 text-center text-sm font-semibold tracking-wide text-white sm:text-base">
        {{ __('ui.stats_line') }}
    </section>

    @if($featuredRecipe)
        @php
            $featuredTranslation = trans('recipes.' . $featuredRecipe->slug);
            $featuredTitle = (is_array($featuredTranslation) && isset($featuredTranslation['name'])) ? $featuredTranslation['name'] : ($featuredRecipe->title ?? $featuredRecipe->name);
            $featuredDescription = (is_array($featuredTranslation) && isset($featuredTranslation['description'])) ? $featuredTranslation['description'] : $featuredRecipe->description;
            $featuredImage = $featuredRecipe->image ?? asset('images/foods/' . $featuredRecipe->slug . '.png');
            $featuredDifficultyKey = 'ui.level_' . $featuredRecipe->difficulty;
            $featuredDifficulty = __($featuredDifficultyKey) !== $featuredDifficultyKey ? __($featuredDifficultyKey) : $featuredRecipe->difficulty;
        @endphp
        <section id="featured" class="px-4 py-14 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-7xl">
                <div class="overflow-hidden rounded-3xl border border-[#f2d9af] bg-white shadow-lg">
                    <div class="grid grid-cols-1 md:grid-cols-2">
                        <img src="{{ $featuredImage }}" alt="{{ $featuredTitle }}" class="h-72 w-full object-cover md:h-full" onerror="this.onerror=null;this.src='{{ asset('images/foods/dal-bhat.png') }}';" />
                        <div class="flex flex-col justify-center p-6 sm:p-10">
                            <span class="mb-3 inline-flex w-fit rounded-full bg-[#F4A226]/20 px-3 py-1 text-xs font-bold text-[#7B1D1D]">{{ __('ui.featured_today') }}</span>
                            <h2 class="text-3xl font-extrabold text-[#7B1D1D] sm:text-4xl">{{ $featuredTitle }}</h2>
                            <p class="mt-3 text-[#4b2b28]">{{ $featuredDescription }}</p>
                            <div class="mt-5 grid grid-cols-3 gap-3 text-sm">
                                <div class="rounded-xl bg-[#FFFBF2] p-3 font-semibold text-[#7B1D1D]">{{ __('ui.prep') }}: {{ $featuredRecipe->prep_time }}m</div>
                                <div class="rounded-xl bg-[#FFFBF2] p-3 font-semibold text-[#7B1D1D]">{{ __('ui.cook') }}: {{ $featuredRecipe->cook_time }}m</div>
                                <div class="rounded-xl bg-[#FFFBF2] p-3 font-semibold text-[#7B1D1D]">{{ $featuredDifficulty }}</div>
                            </div>
                            <a href="{{ route('recipes.show', $featuredRecipe->slug) }}" class="mt-6 inline-flex w-fit cursor-pointer items-center rounded-full bg-[#7B1D1D] px-5 py-3 text-sm font-bold text-white transition duration-300 hover:bg-[#5f1515]">{{ __('ui.view_full_recipe') }} →</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <section id="categories" class="px-4 pb-6 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-7xl overflow-x-auto">
            <div class="flex w-max gap-3 pb-2">
                <a href="{{ route('recipes.index') }}" class="cursor-pointer whitespace-nowrap rounded-full px-4 py-2 text-sm font-semibold transition duration-200 {{ request('category') ? 'bg-white text-[#7B1D1D] border border-[#e7d2ae]' : 'bg-[#F4A226] text-[#22110f]' }}">
                    <span class="inline-flex items-center gap-2">
                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2a10 10 0 100 20 10 10 0 000-20zm0 3.5l2.1 4.3 4.8.7-3.4 3.3.8 4.7L12 16.3l-4.3 2.2.8-4.7-3.4-3.3 4.8-.7L12 5.5z"/></svg>
                        {{ __('ui.all') }}
                    </span>
                </a>
                @foreach($categories as $category)
                    @php
                        $categoryKey = 'ui.cat-' . \Illuminate\Support\Str::slug($category);
                        $categoryText = __($categoryKey) !== $categoryKey ? __($categoryKey) : $category;
                    @endphp
                    <a href="{{ route('recipes.index', ['category' => $category, 'search' => request('search')]) }}" class="cursor-pointer whitespace-nowrap rounded-full px-4 py-2 text-sm font-semibold transition duration-200 {{ request('category') === $category ? 'bg-[#F4A226] text-[#22110f]' : 'bg-white text-[#7B1D1D] border border-[#e7d2ae]' }}">
                        <span class="inline-flex items-center gap-2">
                            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="currentColor"><path d="M20 12l-8 8-8-8 8-8 8 8zm-8-5.2L6.8 12 12 17.2 17.2 12 12 6.8z"/></svg>
                            {{ $categoryText }}
                        </span>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <section id="recipes" class="px-4 pb-16 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-7xl">
            <h2 class="mb-7 text-3xl font-extrabold text-[#7B1D1D] sm:text-4xl">{{ __('ui.explore_recipes') }}</h2>

            @if($recipes->count())
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 xl:grid-cols-3">
                    @foreach($recipes as $recipe)
                        @php
                            $recipeTranslation = trans('recipes.' . $recipe->slug);
                            $recipeTitle = (is_array($recipeTranslation) && isset($recipeTranslation['name'])) ? $recipeTranslation['name'] : ($recipe->title ?? $recipe->name);
                            $recipeDescription = (is_array($recipeTranslation) && isset($recipeTranslation['description'])) ? $recipeTranslation['description'] : $recipe->description;
                            $recipeImage = $recipe->image ?? asset('images/foods/' . $recipe->slug . '.png');
                            $difficultyKey = 'ui.level_' . $recipe->difficulty;
                            $difficultyText = __($difficultyKey) !== $difficultyKey ? __($difficultyKey) : $recipe->difficulty;
                        @endphp
                        <article class="group overflow-hidden rounded-2xl border border-[#ecd9b9] bg-white shadow-md transition duration-300 hover:scale-105 hover:shadow-xl">
                            <div class="relative h-56 overflow-hidden">
                                <img src="{{ $recipeImage }}" alt="{{ $recipeTitle }}" class="h-full w-full object-cover transition duration-300 group-hover:scale-105" onerror="this.onerror=null;this.src='{{ asset('images/foods/dal-bhat.png') }}';" />
                                <div class="pointer-events-none absolute inset-x-0 bottom-0 translate-y-full bg-gradient-to-t from-[#7B1D1D]/90 to-transparent p-4 transition duration-300 group-hover:translate-y-0">
                                    <a href="{{ route('recipes.show', $recipe->slug) }}" class="pointer-events-auto inline-flex cursor-pointer rounded-full bg-[#F4A226] px-4 py-2 text-sm font-bold text-[#1f100e] transition duration-200 hover:bg-[#ffbd55]">{{ __('ui.view_recipe') }}</a>
                                </div>
                            </div>
                            <div class="p-5">
                                <h3 class="text-xl font-extrabold text-[#7B1D1D]">{{ $recipeTitle }}</h3>
                                <p class="mt-2 line-clamp-2 text-sm text-[#4b2b28]">{{ $recipeDescription }}</p>
                                <p class="mt-3 text-sm text-[#4b2b28]">{{ __('ui.prep') }}: {{ $recipe->prep_time }}m</p>
                                <p class="text-sm font-semibold text-[#7B1D1D]">{{ __('ui.difficulty') }}: {{ $difficultyText }}</p>
                            </div>
                        </article>
                    @endforeach
                </div>

                <div class="mt-8">{{ $recipes->links() }}</div>
            @else
                <div class="rounded-2xl border border-[#ecd9b9] bg-white p-8 text-center text-[#7B1D1D]">
                    {{ __('ui.no_recipes') }}
                </div>
            @endif
        </div>
    </section>

    <footer class="bg-[#7B1D1D] px-4 py-10 text-white sm:px-6 lg:px-8">
        <div class="mx-auto grid max-w-7xl grid-cols-1 gap-8 md:grid-cols-3">
            <div>
                <h3 class="text-xl font-extrabold text-[#F4A226]">🍲 {{ __('ui.brand') }}</h3>
                <p class="mt-3 text-white/90">{{ __('ui.footer_tagline') }}</p>
            </div>
            <div>
                <h4 class="text-sm font-bold uppercase tracking-wide text-[#F4A226]">{{ __('ui.links') }}</h4>
                <div class="mt-3 space-y-2">
                    <a href="{{ route('recipes.index') }}" class="block cursor-pointer transition duration-200 hover:text-[#F4A226]">{{ __('ui.home') }}</a>
                    <a href="#recipes" class="block cursor-pointer transition duration-200 hover:text-[#F4A226]">{{ __('ui.recipes') }}</a>
                    <a href="#categories" class="block cursor-pointer transition duration-200 hover:text-[#F4A226]">{{ __('ui.categories') }}</a>
                </div>
            </div>
            <div class="md:text-right">
                <p class="text-white/80">© {{ date('Y') }} {{ __('ui.brand') }}</p>
                <p class="mt-1 text-white/70">{{ __('ui.all_rights_reserved') }}</p>
            </div>
        </div>
    </footer>

</body>
</html>

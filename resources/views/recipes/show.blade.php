<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $recipe->name }} - {{ __('ui.brand') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#FFFBF2] text-[#24100f]">

    @php
        $recipeTranslation = trans('recipes.' . $recipe->slug);
        $translatedName = (is_array($recipeTranslation) && isset($recipeTranslation['name'])) ? $recipeTranslation['name'] : $recipe->name;
        $translatedDescription = (is_array($recipeTranslation) && isset($recipeTranslation['description'])) ? $recipeTranslation['description'] : $recipe->description;
        $translatedIngredients = (is_array($recipeTranslation) && isset($recipeTranslation['ingredients']) && is_array($recipeTranslation['ingredients'])) ? $recipeTranslation['ingredients'] : $recipe->ingredients;
        $translatedInstructions = (is_array($recipeTranslation) && isset($recipeTranslation['instructions']) && is_array($recipeTranslation['instructions'])) ? $recipeTranslation['instructions'] : $recipe->instructions;
        $translatedTips = (is_array($recipeTranslation) && isset($recipeTranslation['tips']) && is_array($recipeTranslation['tips'])) ? $recipeTranslation['tips'] : $recipe->tips;

        $categoryKey = 'ui.cat-' . \Illuminate\Support\Str::slug($recipe->category);
        $translatedCategory = __($categoryKey) !== $categoryKey ? __($categoryKey) : $recipe->category;
        $difficultyKey = 'ui.level_' . $recipe->difficulty;
        $translatedDifficulty = __($difficultyKey) !== $difficultyKey ? __($difficultyKey) : $recipe->difficulty;
    @endphp

    <header class="sticky top-0 z-50 border-b border-white/30 bg-[#7B1D1D]/80 backdrop-blur-lg">
        <div class="mx-auto flex max-w-7xl items-center justify-between px-4 py-3 sm:px-6 lg:px-8">
            <a href="{{ route('recipes.index') }}" class="cursor-pointer text-lg font-extrabold text-[#F4A226] sm:text-2xl">🍲 {{ __('ui.brand') }}</a>
            <nav class="hidden gap-3 md:flex">
                <a href="{{ route('recipes.index') }}" class="cursor-pointer rounded-full bg-white/15 px-4 py-2 text-sm font-semibold text-white transition duration-200 hover:bg-white/25">{{ __('ui.home') }}</a>
                <a href="{{ route('recipes.index') }}#recipes" class="cursor-pointer rounded-full bg-white/15 px-4 py-2 text-sm font-semibold text-white transition duration-200 hover:bg-white/25">{{ __('ui.recipes') }}</a>
                <a href="{{ route('recipes.index') }}#categories" class="cursor-pointer rounded-full bg-white/15 px-4 py-2 text-sm font-semibold text-white transition duration-200 hover:bg-white/25">{{ __('ui.categories') }}</a>
                <a href="{{ route('locale.switch', 'en') }}" class="rounded-full border border-amber-200 bg-white px-3 py-1 text-sm font-semibold text-amber-700 transition hover:bg-amber-50">🇬🇧 EN</a>
                <a href="{{ route('locale.switch', 'ne') }}" class="rounded-full border border-amber-200 bg-white px-3 py-1 text-sm font-semibold text-amber-700 transition hover:bg-amber-50">🇳🇵 NP</a>
            </nav>
        </div>
    </header>

    <main>
        <div class="mx-auto max-w-7xl px-4 pt-8 sm:px-6 lg:px-8">
            <a href="{{ route('recipes.index') }}" class="inline-flex cursor-pointer items-center rounded-full border border-[#e5d3b2] bg-white px-4 py-2 text-sm font-semibold text-[#7B1D1D] transition duration-200 hover:border-[#F4A226] hover:bg-[#fff4df]">← {{ __('ui.back_to_recipes') }}</a>
        </div>

        <section class="mx-auto mt-6 max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="relative h-[300px] overflow-hidden rounded-3xl sm:h-[420px]">
                <img src="{{ asset('images/foods/' . $recipe->slug . '.png') }}" alt="{{ $translatedName }}" class="h-full w-full object-cover" onerror="this.onerror=null;this.src='{{ asset('images/foods/dal-bhat.png') }}';" />
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-black/10"></div>
                <div class="absolute bottom-0 left-0 w-full p-6 sm:p-8">
                    <p class="mb-2 text-sm font-semibold uppercase tracking-wider text-[#F4A226]">{{ $translatedCategory }}</p>
                    <h1 class="text-3xl font-extrabold text-white sm:text-5xl">{{ $translatedName }}</h1>
                    <p class="mt-3 max-w-3xl text-sm text-white/90 sm:text-base">{{ $translatedDescription }}</p>
                </div>
            </div>
        </section>

        <section class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 gap-4 md:grid-cols-4">
                <div class="rounded-2xl border border-[#ead8b5] bg-white p-4">
                    <p class="text-xs font-bold uppercase text-[#7B1D1D]">⏱ {{ __('ui.prep_time') }}</p>
                    <p class="mt-2 text-2xl font-extrabold text-[#24100f]">{{ $recipe->prep_time }}m</p>
                </div>
                <div class="rounded-2xl border border-[#ead8b5] bg-white p-4">
                    <p class="text-xs font-bold uppercase text-[#7B1D1D]">🍳 {{ __('ui.cook_time') }}</p>
                    <p class="mt-2 text-2xl font-extrabold text-[#24100f]">{{ $recipe->cook_time }}m</p>
                </div>
                <div class="rounded-2xl border border-[#ead8b5] bg-white p-4">
                    <p class="text-xs font-bold uppercase text-[#7B1D1D]">👥 {{ __('ui.servings') }}</p>
                    <p class="mt-2 text-2xl font-extrabold text-[#24100f]">{{ $recipe->servings }}</p>
                </div>
                <div class="rounded-2xl border border-[#ead8b5] bg-white p-4">
                    <p class="text-xs font-bold uppercase text-[#7B1D1D]">📊 {{ __('ui.difficulty') }}</p>
                    <p class="mt-2 text-2xl font-extrabold text-[#24100f]">{{ $translatedDifficulty }}</p>
                </div>
            </div>
        </section>

        <section class="mx-auto grid max-w-7xl grid-cols-1 gap-8 px-4 pb-10 sm:px-6 lg:grid-cols-2 lg:px-8">
            <article class="rounded-2xl border border-[#ead8b5] bg-white p-6">
                <h2 class="mb-4 text-2xl font-extrabold text-[#7B1D1D]">{{ __('ui.ingredients') }}</h2>
                <ul class="space-y-3">
                    @foreach($translatedIngredients as $ingredient)
                        <li class="rounded-xl bg-[#FFFBF2] px-4 py-3 text-sm text-[#2c1715]">
                            <span class="font-bold">{{ $ingredient['item'] ?? '' }}</span>
                            <span class="ml-2 text-[#7B1D1D]">{{ $ingredient['quantity'] ?? '' }} {{ $ingredient['unit'] ?? '' }}</span>
                        </li>
                    @endforeach
                </ul>
            </article>

            <article class="rounded-2xl border border-[#ead8b5] bg-white p-6">
                <h2 class="mb-4 text-2xl font-extrabold text-[#7B1D1D]">{{ __('ui.instructions') }}</h2>
                <ol class="space-y-4">
                    @foreach($translatedInstructions as $index => $instruction)
                        <li class="flex gap-3 rounded-xl bg-[#FFFBF2] p-4">
                            <span class="mt-0.5 inline-flex h-7 w-7 flex-shrink-0 items-center justify-center rounded-full bg-[#7B1D1D] text-sm font-bold text-white">{{ $index + 1 }}</span>
                            <p class="text-sm leading-relaxed text-[#2c1715]">{{ $instruction }}</p>
                        </li>
                    @endforeach
                </ol>
            </article>
        </section>

        @if($translatedTips)
            <section class="mx-auto max-w-7xl px-4 pb-14 sm:px-6 lg:px-8">
                <div class="rounded-2xl border border-[#f0c47d] bg-[#fff4de] p-6">
                    <h3 class="mb-4 text-2xl font-extrabold text-[#7B1D1D]">{{ __('ui.cooking_tips') }}</h3>
                    <ul class="space-y-2">
                        @foreach($translatedTips as $tip)
                            <li class="text-sm text-[#2c1715]">• {{ $tip }}</li>
                        @endforeach
                    </ul>
                </div>
            </section>
        @endif
    </main>

    <footer class="bg-[#7B1D1D] px-4 py-10 text-white sm:px-6 lg:px-8">
        <div class="mx-auto max-w-7xl text-sm text-white/80">© {{ date('Y') }} {{ __('ui.brand') }}. {{ __('ui.all_rights_reserved') }}</div>
    </footer>

</body>
</html>

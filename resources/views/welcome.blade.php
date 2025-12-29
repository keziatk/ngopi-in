<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>ngopi.in — Platform Edukasi & Tools Barista Modern</title>

    {{-- SEO --}}
    <meta name="description"
        content="ngopi.in membantu barista memahami kopi, metode seduh, peralatan, dan menghitung brew secara presisi.">
    <meta name="keywords" content="kopi, barista, brew calculator, metode seduh, coffee tools">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-[#0f0f0f] text-white overflow-x-hidden">

    {{-- NAVBAR --}}
    <nav class="max-w-7xl mx-auto px-6 py-6 flex justify-between items-center">
        <h1 class="text-xl font-bold tracking-wide">
            ☕ ngopi<span class="text-amber-400">.in</span>
        </h1>

        <div class="flex gap-4">
            <a href="{{ route('login') }}" class="text-gray-300 hover:text-white">Login</a>
            <a href="{{ route('register') }}"
                class="px-4 py-2 rounded-xl bg-amber-600 hover:bg-amber-500 text-black transition">
                Register
            </a>
        </div>
    </nav>

    {{-- HERO --}}
    <section class="max-w-7xl mx-auto px-6 py-24 grid md:grid-cols-2 gap-16 items-center">

        <div>
            <h2 class="text-5xl font-bold leading-tight">
                Brew Better.<br>
                <span class="text-amber-400">Think Like a Barista.</span>
            </h2>

            <p class="mt-6 text-gray-400 text-lg">
                ngopi.in adalah platform edukasi dan tools modern
                untuk barista, roastery, dan coffee enthusiast.
            </p>

            <div class="mt-8 flex gap-4">
                <a href="{{ route('register') }}"
                    class="px-6 py-3 rounded-xl bg-amber-600 hover:bg-amber-500 text-black font-medium transition">
                    Mulai Gratis ☕
                </a>

                <a href="{{ route('login') }}" class="px-6 py-3 rounded-xl bg-white/10 hover:bg-white/20 transition">
                    Login
                </a>
            </div>
        </div>

        {{-- HERO IMAGE --}}
        <div class="relative">
            <img src="https://images.unsplash.com/photo-1511920170033-f8396924c348"
                class="rounded-3xl shadow-2xl opacity-90" alt="Coffee Brewing">
        </div>

    </section>

    {{-- FEATURES --}}
    <section class="max-w-7xl mx-auto px-6 py-20">
        <h3 class="text-3xl font-bold text-center mb-12">
            Kenapa ngopi<span class="text-amber-400">.in</span>?
        </h3>

        <div class="grid md:grid-cols-4 gap-6">
            <x-feature-card icon="☕" title="Database Kopi">
                Origin, roast level, flavor notes untuk edukasi barista.
            </x-feature-card>

            <x-feature-card icon="⚙️" title="Peralatan Seduh">
                Semua tools penting barista dalam satu tempat.
            </x-feature-card>

            <x-feature-card icon="🧪" title="Metode Seduh">
                V60, Aeropress, French Press, dan lainnya.
            </x-feature-card>

            <x-feature-card icon="📊" title="Brew Calculator">
                Hitung air, rasio, dan resep secara presisi.
            </x-feature-card>
        </div>
    </section>

    {{-- PREVIEW --}}
    <section class="bg-[#121212] py-20">
        <div class="max-w-7xl mx-auto px-6">
            <h3 class="text-3xl font-bold mb-10">
                Preview Fitur
            </h3>

            <div class="grid md:grid-cols-3 gap-6">
                <x-preview-card icon="☕" title="Kopi">
                    Detail origin, proses, dan karakter rasa.
                </x-preview-card>

                <x-preview-card icon="⚙️" title="Peralatan">
                    Grinder, brewer, scale, kettle.
                </x-preview-card>

                <x-preview-card icon="🧪" title="Metode Seduh">
                    Langkah seduh + rasio ideal.
                </x-preview-card>
            </div>
        </div>
    </section>

    {{-- CTA --}}
    <section class="max-w-7xl mx-auto px-6 py-24 text-center">
        <h3 class="text-4xl font-bold">
            Siap upgrade skill barista kamu?
        </h3>

        <p class="text-gray-400 mt-4">
            Mulai catat brew, pahami kopi, dan konsisten dalam seduhan.
        </p>

        <a href="{{ route('register') }}" class="inline-block mt-8 px-8 py-4 rounded-2xl
              bg-amber-600 hover:bg-amber-500 text-black font-semibold transition">
            Daftar Sekarang ☕
        </a>
    </section>

    {{-- FOOTER --}}
    <footer class="border-t border-white/10 py-6 text-center text-sm text-gray-500">
        © {{ date('Y') }} ngopi.in — Brew smarter, not harder ☕
    </footer>

</body>

</html>
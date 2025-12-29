<x-app-layout>
    <x-slot name="header">
        <div class="relative overflow-hidden rounded-2xl
                bg-gradient-to-r from-[#2b2b2b] via-[#1f1f1f] to-black
                px-6 py-5">

            <div class="flex items-center justify-between">
                <div>
                    <h2 class="font-semibold text-xl text-white flex items-center gap-2">
                        ☕ Database Kopi
                    </h2>
                    <p class="text-sm text-gray-400 mt-1">
                        Platform edukasi & tools barista modern
                    </p>
                </div>

                <a href="{{ route('coffees.create') }}" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl
                      bg-amber-600 hover:bg-amber-500
                      text-white text-sm font-semibold transition shadow-lg">
                    ➕ Tambah Kopi
                </a>
            </div>

        </div>
    </x-slot>


    <div class="py-10">
        <div class="max-w-7xl mx-auto px-6">

            {{-- Flash --}}
            @if (session('success'))
            <div class="mb-6 rounded-xl bg-emerald-500/10 border border-emerald-500/30
                        px-5 py-3 text-emerald-400">
                {{ session('success') }}
            </div>
            @endif

            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">

                @forelse ($coffees as $coffee)
                <div class="bg-[#1f1f1f] rounded-2xl overflow-hidden shadow-lg">

                    {{-- Image --}}
                    <div class="h-40 bg-zinc-800">
                        @if ($coffee->image)
                        <img src="{{ asset('storage/'.$coffee->image) }}" class="w-full h-full object-cover">
                        @else
                        <div class="flex items-center justify-center h-full text-gray-500">
                            ☕ No Image
                        </div>
                        @endif
                    </div>

                    {{-- Content --}}
                    <div class="p-5 space-y-2">
                        <h3 class="text-lg font-semibold text-white">
                            {{ $coffee->name }}
                        </h3>

                        <p class="text-sm text-gray-400">
                            {{ $coffee->origin ?? '-' }}
                        </p>

                        <div class="flex gap-2 text-xs">
                            <span class="px-2 py-1 rounded-lg bg-white/10 text-gray-300">
                                {{ $coffee->process ?? '-' }}
                            </span>

                            <span class="px-2 py-1 rounded-lg bg-amber-500/10 text-amber-400">
                                {{ $coffee->roast_level ?? '-' }}
                            </span>
                        </div>

                        <p class="text-xs text-gray-500 line-clamp-2">
                            {{ $coffee->flavor_notes ?? '-' }}
                        </p>

                        {{-- Actions --}}
                        <div class="flex gap-2 pt-3">
                            <a href="{{ route('coffees.edit', $coffee) }}" class="flex-1 text-center py-2 rounded-lg
                                      bg-white/10 hover:bg-white/20
                                      text-gray-200 text-sm transition">
                                Edit
                            </a>

                            <form method="POST" action="{{ route('coffees.destroy', $coffee) }}"
                                onsubmit="return confirm('Hapus data kopi ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="px-3 py-2 rounded-lg
                                               bg-red-500/10 hover:bg-red-500/20
                                               text-red-400 text-sm transition">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center text-gray-400 py-16">
                    Belum ada data kopi ☕
                </div>
                @endforelse

            </div>
        </div>
    </div>
</x-app-layout>
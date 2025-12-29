<x-app-layout>
    <x-slot name="header">
        <div class="relative overflow-hidden rounded-2xl
                bg-gradient-to-r from-[#2b2b2b] via-[#1f1f1f] to-black
                px-6 py-5">

            <div class="flex items-center justify-between">
                <div>
                    <h2 class="font-semibold text-xl text-white flex items-center gap-2">
                        🛠️ Peralatan Kopi
                    </h2>
                    <p class="text-sm text-gray-400 mt-1">
                        Platform edukasi & tools barista modern
                    </p>
                </div>

                <a href="{{ route('equipments.create') }}" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl
                      bg-amber-600 hover:bg-amber-500
                      text-white text-sm font-semibold transition shadow-lg">
                    ➕ Tambah Peralatan
                </a>
            </div>

        </div>
    </x-slot>


    <div class="py-10">
        <div class="max-w-7xl mx-auto px-6">

            {{-- Flash Message --}}
            @if (session('success'))
            <div class="mb-6 rounded-xl bg-emerald-500/10 border border-emerald-500/30
                        px-5 py-3 text-emerald-400">
                {{ session('success') }}
            </div>
            @endif

            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">

                @forelse ($equipments as $equipment)
                <div class="bg-[#1f1f1f] rounded-2xl overflow-hidden shadow-lg
                            border border-white/5 hover:border-white/10 transition">

                    {{-- IMAGE --}}
                    <div class="h-40 bg-zinc-800">
                        @if ($equipment->image)
                        <img src="{{ asset('storage/'.$equipment->image) }}" class="w-full h-full object-cover">
                        @else
                        <div class="flex items-center justify-center h-full text-gray-500 text-sm">
                            🛠️ No Image
                        </div>
                        @endif
                    </div>

                    {{-- CONTENT --}}
                    <div class="p-5 space-y-3">
                        <h3 class="text-lg font-semibold text-white">
                            {{ $equipment->name }}
                        </h3>

                        <p class="text-sm text-gray-400">
                            {{ $equipment->function ?? '-' }}
                        </p>

                        <p class="text-xs text-gray-500 line-clamp-2">
                            {{ $equipment->description ?? '-' }}
                        </p>

                        {{-- ACTIONS --}}
                        <div class="flex gap-2 pt-3">
                            <a href="{{ route('equipments.edit', $equipment) }}" class="flex-1 text-center py-2 rounded-lg
                                      bg-white/10 hover:bg-white/20
                                      text-gray-200 text-sm transition">
                                Edit
                            </a>

                            <form method="POST" action="{{ route('equipments.destroy', $equipment) }}"
                                onsubmit="return confirm('Hapus peralatan ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="px-4 py-2 rounded-lg
                                               bg-red-500/10 hover:bg-red-500/20
                                               text-red-400 text-sm transition">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </div>

                </div>
                @empty
                <div class="col-span-full text-center text-gray-500 py-16">
                    Belum ada peralatan ☕
                </div>
                @endforelse

            </div>
        </div>
    </div>
</x-app-layout>
<x-app-layout>

    {{-- HEADER --}}
    <x-slot name="header">
        <div class="relative overflow-hidden rounded-2xl
                    bg-gradient-to-r from-[#2b2b2b] via-[#1f1f1f] to-black
                    px-6 py-5">

            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div>
                    <h2 class="font-semibold text-xl text-white flex items-center gap-2">
                        ☕ Metode Seduh
                    </h2>
                    <p class="text-sm text-gray-400 mt-1">
                        Kelola metode seduh untuk brew calculator & workflow barista
                    </p>
                </div>

                <a href="{{ route('methods.create') }}" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl
                          bg-amber-600 hover:bg-amber-500
                          text-white text-sm font-semibold transition shadow-lg">
                    ➕ Tambah Metode
                </a>
            </div>

        </div>
    </x-slot>

    {{-- CONTENT --}}
    <div class="py-10 max-w-7xl mx-auto px-6">

        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">

            @forelse ($methods as $method)
            <div class="bg-[#1f1f1f] border border-white/10
                        rounded-2xl p-6 shadow-lg
                        hover:border-amber-400/40 transition">

                {{-- TITLE --}}
                <h3 class="text-lg font-semibold text-white mb-4">
                    {{ $method->name }}
                </h3>

                {{-- INFO --}}
                <div class="space-y-2 text-sm text-gray-300">
                    <p>☕ <span class="text-gray-400">Rasio:</span> 1 : {{ $method->ratio }}</p>
                    <p>⚙️ <span class="text-gray-400">Grind:</span> {{ $method->grind_size }}</p>
                    <p>🔥 <span class="text-gray-400">Suhu:</span> {{ $method->temperature_label }}</p>
                    <p>⏱️ <span class="text-gray-400">Waktu:</span> {{ $method->brew_time_label }}</p>
                </div>

                {{-- ACTIONS --}}
                <div class="mt-6 flex gap-2">
                    <a href="{{ route('methods.edit', $method) }}" class="flex-1 text-center py-2 rounded-xl
                              bg-white/10 hover:bg-white/20
                              text-white text-sm transition">
                        Edit
                    </a>

                    <form action="{{ route('methods.destroy', $method) }}" method="POST" class="flex-1">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Hapus metode ini?')" class="w-full py-2 rounded-xl
                                       bg-red-500/10 hover:bg-red-500/20
                                       text-red-400 text-sm transition">
                            Hapus
                        </button>
                    </form>
                </div>

            </div>
            @empty
            <div class="col-span-full text-center text-gray-400 py-20">
                Belum ada metode seduh ☕
            </div>
            @endforelse

        </div>

    </div>

</x-app-layout>
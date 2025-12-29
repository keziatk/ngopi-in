<x-app-layout>
    <x-slot name="header">
        <div class="space-y-1">
            <h2 class="font-semibold text-2xl text-white tracking-tight">
                👋 Selamat datang di <span class="text-amber-400">ngopi.in</span>
            </h2>
            <p class="text-sm text-amber-100">
                Platform edukasi & tools barista modern
            </p>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto px-6 space-y-12">

            {{-- STATS --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @php
                $stats = [
                ['label'=>'Total Kopi','value'=>$coffeeCount,'icon'=>'☕'],
                ['label'=>'Peralatan','value'=>$equipmentCount,'icon'=>'⚙️'],
                ['label'=>'Metode Seduh','value'=>$methodCount,'icon'=>'🧪'],
                ];
                @endphp

                @foreach ($stats as $stat)
                <div class="bg-[#1f1f1f] rounded-2xl p-6 shadow-lg
                            border border-white/5 hover:border-amber-500/40 transition">
                    <div class="flex items-center justify-between">
                        <p class="text-sm text-gray-400">{{ $stat['label'] }}</p>
                        <span class="text-xl">{{ $stat['icon'] }}</span>
                    </div>
                    <h3 class="text-3xl font-bold text-white mt-3">
                        {{ $stat['value'] }}
                    </h3>
                </div>
                @endforeach
            </div>

            {{-- QUICK ACTION --}}
            <div>
                <h3 class="text-lg font-semibold text-white mb-4">
                    ⚡ Akses Cepat
                </h3>

                <div class="grid sm:grid-cols-3 gap-4">
                    <a href="{{ route('coffees.index') }}" class="group bg-amber-600 hover:bg-amber-500
                               rounded-2xl p-5 text-white transition shadow-lg">
                        <p class="font-semibold">☕ Kelola Kopi</p>
                        <p class="text-xs text-amber-100 mt-1">
                            Tambah & atur data kopi
                        </p>
                    </a>

                    <a href="{{ route('equipments.index') }}" class="group bg-white/10 hover:bg-white/20
                               rounded-2xl p-5 text-gray-200 transition">
                        <p class="font-semibold">⚙️ Peralatan</p>
                        <p class="text-xs text-gray-400 mt-1">
                            Data alat seduh
                        </p>
                    </a>

                    <a href="{{ route('methods.index') }}" class="group bg-white/10 hover:bg-white/20
                               rounded-2xl p-5 text-gray-200 transition">
                        <p class="font-semibold">🧪 Metode Seduh</p>
                        <p class="text-xs text-gray-400 mt-1">
                            Resep & metode brew
                        </p>
                    </a>
                </div>
            </div>

            {{-- TIPS --}}
            <div class="bg-gradient-to-r from-amber-700 to-amber-600
                        rounded-2xl p-8 text-white shadow-lg">
                <h3 class="text-xl font-semibold mb-2">
                    ☕ Tips Barista Hari Ini
                </h3>
                <p class="text-sm text-amber-100 leading-relaxed">
                    Gunakan rasio seduh konsisten (1:15 – 1:17),
                    grind size sesuai metode, dan air bersuhu stabil
                    untuk hasil brew maksimal.
                </p>
            </div>

            {{-- RIWAYAT BREW --}}
            <div x-data="{ open:false, brew:null }">
                <h3 class="text-lg font-semibold text-white mb-4">
                    📒 Riwayat Brew Terakhir
                </h3>

                <div class="bg-[#1f1f1f] rounded-2xl overflow-hidden shadow-lg border border-white/5">
                    <table class="w-full text-sm text-gray-300">
                        <thead class="bg-white/5 text-gray-400">
                            <tr>
                                <th class="px-5 py-4 text-left">Metode</th>
                                <th class="px-5 py-4 text-left">Kopi</th>
                                <th class="px-5 py-4 text-left">Air</th>
                                <th class="px-5 py-4 text-left">Rasio</th>
                                <th class="px-5 py-4 text-left">Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($brewHistories as $brew)
                            <tr class="border-t border-white/10
                                       hover:bg-white/5 transition">
                                <td class="px-5 py-3 font-medium text-orange-400 cursor-pointer hover:underline"
                                    @click="open=true; brew={{ Js::from($brew) }}">
                                    {{ $brew->method?->name ?? '-' }}
                                </td>
                                <td class="px-5 py-3">{{ $brew->coffee_gram }} g</td>
                                <td class="px-5 py-3">{{ $brew->water_ml }} ml</td>
                                <td class="px-5 py-3">{{ $brew->ratio }}</td>
                                <td class="px-5 py-3 text-gray-400">
                                    {{ $brew->created_at->format('d M Y') }}
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="px-5 py-8 text-center text-gray-500">
                                    Belum ada riwayat brew ☕
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{-- MODAL --}}
                <div x-show="open" x-transition class="fixed inset-0 bg-black/70 flex items-center justify-center z-50">

                    <div @click.outside="open=false" class="bg-[#1f1f1f] max-w-lg w-full rounded-2xl p-6 shadow-xl">

                        <h3 class="text-xl font-bold text-white mb-4">
                            ☕ Detail Brew
                        </h3>

                        <template x-if="brew">
                            <div class="space-y-2 text-sm text-gray-300">
                                <p>☕ <strong>Metode:</strong>
                                    <span x-text="brew.method?.name ?? '-'"></span>
                                </p>
                                <p>🫘 <strong>Kopi:</strong>
                                    <span x-text="brew.coffee_gram"></span> g
                                </p>
                                <p>💧 <strong>Air:</strong>
                                    <span x-text="brew.water_ml"></span> ml
                                </p>
                                <p>⚖️ <strong>Rasio:</strong>
                                    <span x-text="brew.ratio"></span>
                                </p>
                            </div>
                        </template>

                        <div class="mt-6 text-right">
                            <button @click="open=false" class="px-4 py-2 bg-orange-600 hover:bg-orange-500
                                       rounded-lg text-white text-sm">
                                Tutup
                            </button>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>
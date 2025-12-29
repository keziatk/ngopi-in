<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-white">
            ☕ Brew History
        </h2>
    </x-slot>

    <div class="py-8 max-w-5xl mx-auto px-6">
        <div class="bg-[#1f1f1f] rounded-2xl overflow-hidden">

            <table class="w-full text-sm text-white">
                <thead class="bg-black/40 text-gray-400">
                    <tr>
                        <th class="p-3 text-left">Metode</th>
                        <th class="p-3">Kopi</th>
                        <th class="p-3">Air</th>
                        <th class="p-3">Rasio</th>
                        <th class="p-3">Grind</th>
                        <th class="p-3">Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($histories as $brew)
                    <tr class="border-t border-white/10">
                        <td class="p-3 capitalize">{{ $brew->method }}</td>
                        <td class="p-3 text-center">{{ $brew->coffee_gram }}g</td>
                        <td class="p-3 text-center">{{ $brew->water_ml }}ml</td>
                        <td class="p-3 text-center">{{ $brew->ratio }}</td>
                        <td class="p-3 text-center">{{ $brew->grind_size }}</td>
                        <td class="p-3 text-center">
                            {{ $brew->created_at->format('d M Y') }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</x-app-layout>
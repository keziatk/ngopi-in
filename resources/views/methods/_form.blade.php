<div class="space-y-6">

    {{-- Nama --}}
    <div>
        <label class="text-sm text-gray-300">Nama Metode</label>
        <input name="name" required value="{{ old('name', $method->name ?? '') }}" placeholder="V60 Pour Over" class="mt-1 w-full rounded-xl bg-black/40 border border-white/10
                      px-4 py-2.5 text-white
                      focus:border-amber-500 focus:ring-amber-500">
    </div>

    {{-- Grid --}}
    <div class="grid md:grid-cols-2 gap-5">

        <div>
            <label class="text-sm text-gray-300">Rasio</label>
            <input name="ratio" type="number" required value="{{ old('ratio', $method->ratio ?? '') }}" placeholder="15"
                class="mt-1 w-full rounded-xl bg-black/40 border border-white/10
                          px-4 py-2.5 text-white">
        </div>

        <div>
            <label class="text-sm text-gray-300">Grind Size</label>
            <input name="grind_size" required value="{{ old('grind_size', $method->grind_size ?? '') }}"
                placeholder="Medium-fine" class="mt-1 w-full rounded-xl bg-black/40 border border-white/10
                          px-4 py-2.5 text-white">
        </div>

        <div>
            <label class="text-sm text-gray-300">Suhu (°C)</label>
            <input name="temperature" type="number" required
                value="{{ old('temperature', $method->temperature ?? '') }}" placeholder="93" class="mt-1 w-full rounded-xl bg-black/40 border border-white/10
                          px-4 py-2.5 text-white">
        </div>

        <div>
            <label class="text-sm text-gray-300">Label Suhu</label>
            <input name="temperature_label" required
                value="{{ old('temperature_label', $method->temperature_label ?? '') }}" placeholder="92–94 °C" class="mt-1 w-full rounded-xl bg-black/40 border border-white/10
                          px-4 py-2.5 text-white">
        </div>

        <div>
            <label class="text-sm text-gray-300">Waktu (detik)</label>
            <input name="brew_time" type="number" required value="{{ old('brew_time', $method->brew_time ?? '') }}"
                placeholder="180" class="mt-1 w-full rounded-xl bg-black/40 border border-white/10
                          px-4 py-2.5 text-white">
        </div>

        <div>
            <label class="text-sm text-gray-300">Label Waktu</label>
            <input name="brew_time_label" required value="{{ old('brew_time_label', $method->brew_time_label ?? '') }}"
                placeholder="3–3,5 menit" class="mt-1 w-full rounded-xl bg-black/40 border border-white/10
                          px-4 py-2.5 text-white">
        </div>
    </div>

    {{-- Steps --}}
    <div>
        <label class="text-sm text-gray-300">Langkah Seduh</label>
        <textarea name="steps" rows="4" required placeholder="1. Bloom 30 detik..." class="mt-1 w-full rounded-xl bg-black/40 border border-white/10
                   px-4 py-2.5 text-white">{{ old('steps', $method->steps ?? '') }}</textarea>
    </div>

    {{-- Equipments --}}
    <div>
        <p class="text-white font-semibold mb-2">⚙️ Peralatan</p>
        <div class="grid sm:grid-cols-2 gap-2">
            @foreach($equipments as $equipment)
            <label class="flex items-center gap-2 text-gray-300">
                <input type="checkbox" name="equipments[]" value="{{ $equipment->id }}" @checked(isset($method) &&
                    $method->equipments->contains($equipment))
                class="rounded bg-zinc-800 border-zinc-700">
                {{ $equipment->name }}
            </label>
            @endforeach
        </div>
    </div>

    {{-- Coffees --}}
    <div>
        <p class="text-white font-semibold mb-2">☕ Kopi</p>
        <div class="grid sm:grid-cols-2 gap-2">
            @foreach($coffees as $coffee)
            <label class="flex items-center gap-2 text-gray-300">
                <input type="checkbox" name="coffees[]" value="{{ $coffee->id }}" @checked(isset($method) &&
                    $method->coffees->contains($coffee))
                class="rounded bg-zinc-800 border-zinc-700">
                {{ $coffee->name }}
            </label>
            @endforeach
        </div>
    </div>

    {{-- Action --}}
    <div class="flex justify-end gap-3 pt-4">
        <a href="{{ route('methods.index') }}"
            class="px-4 py-2 rounded-xl bg-white/10 text-gray-300 hover:bg-white/20 transition">
            Batal
        </a>

        <button class="px-6 py-2 rounded-xl bg-amber-600 hover:bg-amber-500
                       text-white font-semibold transition shadow-lg">
            {{ isset($method) ? 'Update Metode ☕' : 'Simpan Metode ☕' }}
        </button>
    </div>

</div>
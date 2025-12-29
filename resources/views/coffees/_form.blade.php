<form method="POST" action="{{ $action }}" enctype="multipart/form-data"
    class="bg-[#1f1f1f] border border-white/10 rounded-2xl p-8 space-y-5 shadow-lg">

    @csrf
    @if($method !== 'POST') @method($method) @endif

    {{-- Nama --}}
    <div>
        <label class="text-sm text-gray-300">Nama Kopi</label>
        <input name="name" required value="{{ old('name', $coffee->name ?? '') }}" placeholder="Contoh: Arabica Gayo"
            class="mt-1 w-full rounded-xl bg-black/40 border border-white/10
                      px-4 py-2.5 text-white
                      focus:border-amber-500 focus:ring-amber-500">
    </div>

    {{-- Origin --}}
    <div>
        <label class="text-sm text-gray-300">Asal Kopi (Origin)</label>
        <input name="origin" value="{{ old('origin', $coffee->origin ?? '') }}" placeholder="Aceh, Ethiopia, Brazil"
            class="mt-1 w-full rounded-xl bg-black/40 border border-white/10
                      px-4 py-2.5 text-white">
    </div>

    {{-- Process --}}
    <div>
        <label class="text-sm text-gray-300">Proses</label>
        <select name="process" class="mt-1 w-full rounded-xl bg-black/40 border border-white/10
                       px-4 py-2.5 text-white">
            <option value="">Pilih Proses</option>
            @foreach(['Washed','Natural','Honey','Anaerobic'] as $p)
            <option value="{{ $p }}" @selected(old('process', $coffee->process ?? '') == $p)>
                {{ $p }}
            </option>
            @endforeach
        </select>
    </div>

    {{-- Roast --}}
    <div>
        <label class="text-sm text-gray-300">Roast Level</label>
        <select name="roast_level" class="mt-1 w-full rounded-xl bg-black/40 border border-white/10
                       px-4 py-2.5 text-white">
            <option value="">Pilih Roast</option>
            @foreach(['Light','Medium','Dark'] as $r)
            <option value="{{ $r }}" @selected(old('roast_level', $coffee->roast_level ?? '') == $r)>
                {{ $r }}
            </option>
            @endforeach
        </select>
    </div>

    {{-- Flavor --}}
    <div>
        <label class="text-sm text-gray-300">Flavor Notes</label>
        <input name="flavor_notes" value="{{ old('flavor_notes', $coffee->flavor_notes ?? '') }}"
            placeholder="Chocolate, Citrus, Floral" class="mt-1 w-full rounded-xl bg-black/40 border border-white/10
                      px-4 py-2.5 text-white">
    </div>

    {{-- Description --}}
    <div>
        <label class="text-sm text-gray-300">Deskripsi</label>
        <textarea name="description" rows="4" class="mt-1 w-full rounded-xl bg-black/40 border border-white/10
                         px-4 py-2.5 text-white">{{ old('description', $coffee->description ?? '') }}</textarea>
    </div>

    {{-- Image --}}
    <div>
        <label class="text-sm text-gray-300">Gambar Kopi</label>
        <input type="file" name="image" class="mt-1 w-full rounded-xl bg-black/40 border border-white/10
                      px-4 py-2 text-white">
    </div>

    {{-- Action --}}
    <div class="flex justify-end gap-3 pt-4">
        <a href="{{ route('coffees.index') }}"
            class="px-4 py-2 rounded-xl bg-white/10 text-gray-300 hover:bg-white/20 transition">
            Batal
        </a>

        <button class="px-6 py-2 rounded-xl bg-amber-600 hover:bg-amber-500
                   text-white font-semibold transition shadow-lg">
            {{ $submit }}
        </button>
    </div>

</form>
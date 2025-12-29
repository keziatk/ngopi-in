<form method="POST" enctype="multipart/form-data" class="space-y-5">

    @csrf
    @isset($equipment)
    @method('PUT')
    @endisset

    {{-- Nama --}}
    <div>
        <label class="text-sm text-gray-300">Nama Peralatan</label>
        <input type="text" name="name" required value="{{ old('name', $equipment->name ?? '') }}"
            placeholder="Contoh: Grinder Manual" class="mt-1 w-full rounded-xl bg-black/40 border border-white/10
                   px-4 py-2.5 text-white
                   focus:border-amber-500 focus:ring-amber-500">
    </div>

    {{-- Fungsi --}}
    <div>
        <label class="text-sm text-gray-300">Fungsi</label>
        <input type="text" name="function" value="{{ old('function', $equipment->function ?? '') }}"
            placeholder="Menggiling biji kopi" class="mt-1 w-full rounded-xl bg-black/40 border border-white/10
                   px-4 py-2.5 text-white">
    </div>

    {{-- Deskripsi --}}
    <div>
        <label class="text-sm text-gray-300">Deskripsi</label>
        <textarea name="description" rows="4" placeholder="Kegunaan, tips pemakaian, rekomendasi barista" class="mt-1 w-full rounded-xl bg-black/40 border border-white/10
                   px-4 py-2.5 text-white">{{ old('description', $equipment->description ?? '') }}</textarea>
    </div>

    {{-- Image --}}
    <div>
        <label class="text-sm text-gray-300">Gambar Peralatan</label>
        <input type="file" name="image" class="mt-1 w-full rounded-xl bg-black/40 border border-white/10
                   px-4 py-2 text-white">
    </div>

    {{-- Action --}}
    <div class="flex justify-end gap-3 pt-4">
        <a href="{{ route('equipments.index') }}"
            class="px-4 py-2 rounded-xl bg-white/10 text-gray-300 hover:bg-white/20 transition">
            Batal
        </a>

        <button type="submit" class="px-6 py-2 rounded-xl bg-amber-600 hover:bg-amber-500
                   text-white font-semibold transition shadow-lg">
            {{ isset($equipment) ? 'Update Peralatan ☕' : 'Simpan Peralatan ☕' }}
        </button>
    </div>

</form>
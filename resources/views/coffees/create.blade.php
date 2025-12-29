<x-app-layout>

    <x-slot name="header">
        <div class="rounded-2xl bg-gradient-to-r from-[#2b2b2b] via-[#1f1f1f] to-black px-6 py-5">
            <h2 class="text-xl font-semibold text-white">
                ➕ Tambah Data Kopi
            </h2>
            <p class="text-sm text-gray-400">
                Tambahkan kopi baru ke database ngopi.in
            </p>
        </div>
    </x-slot>

    <div class="py-10 max-w-3xl mx-auto px-6">
        @include('coffees._form', [
        'action' => route('coffees.store'),
        'method' => 'POST',
        'submit' => 'Simpan ☕',
        'coffee' => null
        ])
    </div>

</x-app-layout>
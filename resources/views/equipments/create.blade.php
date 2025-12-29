<x-app-layout>

    <x-slot name="header">
        <div class="rounded-2xl bg-gradient-to-r from-[#2b2b2b] via-[#1f1f1f] to-black px-6 py-5">
            <h2 class="text-xl font-semibold text-white">
                ➕ Tambah Peralatan
            </h2>
            <p class="text-sm text-gray-400">
                Tambahkan alat pendukung workflow barista
            </p>
        </div>
    </x-slot>

    <div class="py-10 max-w-xl mx-auto px-6">
        <div class="bg-[#1f1f1f] border border-white/10 rounded-2xl p-6 shadow-xl">
            <form method="POST" action="{{ route('equipments.store') }}" enctype="multipart/form-data">
                @csrf
                @include('equipments._form')
            </form>
        </div>
    </div>

</x-app-layout>
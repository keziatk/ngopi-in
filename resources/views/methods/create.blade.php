<x-app-layout>

    <x-slot name="header">
        <div class="rounded-2xl bg-gradient-to-r from-[#2b2b2b] via-[#1f1f1f] to-black px-6 py-5">
            <h2 class="text-xl font-semibold text-white">
                ➕ Tambah Metode Seduh
            </h2>
            <p class="text-sm text-gray-400">
                Tambahkan metode seduh baru untuk brew calculator
            </p>
        </div>
    </x-slot>

    <div class="py-10 max-w-4xl mx-auto px-6">
        <div class="bg-[#1f1f1f] border border-white/10 rounded-2xl p-6 shadow-xl">
            <form method="POST" action="{{ route('methods.store') }}">
                @csrf
                @include('methods._form')
            </form>
        </div>
    </div>

</x-app-layout>
<x-app-layout>

    <x-slot name="header">
        <div class="rounded-2xl bg-gradient-to-r from-[#2b2b2b] via-[#1f1f1f] to-black px-6 py-5">
            <h2 class="text-xl font-semibold text-white">
                ✏️ Edit Kopi
            </h2>
            <p class="text-sm text-gray-400">
                Perbarui informasi kopi
            </p>
        </div>
    </x-slot>

    <div class="py-10 max-w-3xl mx-auto px-6">
        @include('coffees._form', [
        'action' => route('coffees.update', $coffee),
        'method' => 'PUT',
        'submit' => 'Update ☕',
        'coffee' => $coffee
        ])
    </div>

</x-app-layout>
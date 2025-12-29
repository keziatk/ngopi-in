<div class="bg-[#1f1f1f] rounded-2xl overflow-hidden shadow-lg">
    <div class="h-32 bg-gradient-to-br from-amber-600 to-amber-400 flex items-center justify-center">
        <span class="text-3xl">{{ $icon }}</span>
    </div>
    <div class="p-4">
        <h4 class="text-white font-semibold">
            {{ $title }}
        </h4>
        <p class="text-sm text-gray-400 mt-1">
            {{ $slot }}
        </p>
    </div>
</div>
<x-app-layout>

    {{-- HEADER --}}
    <x-slot name="header">
        <div class="relative overflow-hidden rounded-2xl
                    bg-gradient-to-r from-[#2b2b2b] via-[#1f1f1f] to-black
                    px-6 py-5">

            <h2 class="font-semibold text-xl text-white flex items-center gap-2">
                ☕ Brew Calculator
            </h2>
            <p class="text-sm text-gray-400 mt-1">
                Hitung rasio kopi dengan cepat & presisi ala barista
            </p>

        </div>
    </x-slot>

    {{-- CONTENT --}}
    <div class="py-10 max-w-5xl mx-auto px-6">
        <div class="grid md:grid-cols-2 gap-6">

            {{-- INPUT --}}
            <div class="bg-[#1f1f1f] border border-white/10 rounded-2xl p-6 shadow-lg">
                <h3 class="text-lg font-semibold text-white mb-4">
                    Input Brew
                </h3>

                <div class="space-y-4">

                    <div>
                        <label class="text-sm text-gray-400">Metode Seduh</label>
                        <select id="method" class="w-full mt-1 rounded-xl bg-black/40 border border-white/10
                                       text-white px-4 py-2.5 focus:ring-amber-500 focus:border-amber-500">
                            <option value="">Pilih metode</option>
                            @foreach ($methods as $method)
                            <option value="{{ $method->id }}" data-ratio="{{ $method->ratio }}"
                                data-grind="{{ $method->grind_size }}" data-temp="{{ $method->temperature_label }}"
                                data-time="{{ $method->brew_time_label }}">
                                {{ $method->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="text-sm text-gray-400">Berat Kopi (gram)</label>
                        <input id="coffee" type="number" min="1" value="15" class="w-full mt-1 rounded-xl bg-black/40 border border-white/10
                                      text-white px-4 py-2.5 focus:ring-amber-500 focus:border-amber-500">
                    </div>

                    <button onclick="calculate()" class="w-full py-3 rounded-xl
                                   bg-amber-600 hover:bg-amber-500
                                   text-white font-semibold transition shadow-lg">
                        Hitung Brew ☕
                    </button>

                </div>
            </div>

            {{-- RESULT --}}
            <div class="bg-[#1f1f1f] border border-white/10 rounded-2xl p-6 shadow-lg">
                <h3 class="text-lg font-semibold text-white mb-4">
                    Hasil Brew
                </h3>

                <p id="empty" class="text-gray-500">
                    Hitung brew untuk melihat hasil ☕
                </p>

                <div id="result" class="hidden space-y-4 text-sm">

                    <div class="flex justify-between">
                        <span class="text-gray-400">Air</span>
                        <span id="water" class="text-white font-semibold"></span>
                    </div>

                    <div class="flex justify-between">
                        <span class="text-gray-400">Rasio</span>
                        <span id="ratio" class="text-white font-semibold"></span>
                    </div>

                    <div class="flex justify-between">
                        <span class="text-gray-400">Grind Size</span>
                        <span id="grind" class="text-white font-semibold"></span>
                    </div>

                    <div class="flex justify-between">
                        <span class="text-gray-400">Suhu Air</span>
                        <span id="temp" class="text-white font-semibold"></span>
                    </div>

                    <div class="flex justify-between">
                        <span class="text-gray-400">Waktu Seduh</span>
                        <span id="time" class="text-white font-semibold"></span>
                    </div>

                    {{-- VISUAL --}}
                    <div class="pt-4">
                        <p class="text-gray-400 mb-2">Visual Rasio</p>
                        <div class="w-full h-3 bg-black/40 rounded-full overflow-hidden">
                            <div id="bar" class="h-full bg-amber-500 transition-all"></div>
                        </div>
                    </div>

                    {{-- SAVE --}}
                    <form method="POST" action="{{ route('brew-history.store') }}" class="pt-4">
                        @csrf
                        <input type="hidden" name="method_id" id="save_method">
                        <input type="hidden" name="coffee_gram" id="save_coffee">
                        <input type="hidden" name="water_ml" id="save_water">
                        <input type="hidden" name="ratio" id="save_ratio">

                        <button class="w-full py-3 rounded-xl
                                   bg-emerald-600 hover:bg-emerald-500
                                   text-white font-semibold transition shadow-lg">
                            Simpan Brew ☕
                        </button>
                    </form>

                </div>
            </div>

        </div>
    </div>

    <script>
        function calculate() {
            const select = document.getElementById('method')
            if (!select.value) {
                alert('Pilih metode seduh dulu')
                return
            }

            const opt = select.options[select.selectedIndex]
            const coffee = parseInt(document.getElementById('coffee').value)

            if (!coffee || coffee < 1) {
                alert('Berat kopi tidak valid')
                return
            }

            const ratio = parseInt(opt.dataset.ratio)
            const water = coffee * ratio

            document.getElementById('water').innerText = water + ' ml'
            document.getElementById('ratio').innerText = '1 : ' + ratio
            document.getElementById('grind').innerText = opt.dataset.grind
            document.getElementById('temp').innerText = opt.dataset.temp
            document.getElementById('time').innerText = opt.dataset.time

            document.getElementById('bar').style.width =
                Math.min(ratio * 5, 100) + '%'

            document.getElementById('empty').classList.add('hidden')
            document.getElementById('result').classList.remove('hidden')

            document.getElementById('save_method').value = select.value
            document.getElementById('save_coffee').value = coffee
            document.getElementById('save_water').value = water
            document.getElementById('save_ratio').value = '1 : ' + ratio
        }
    </script>

</x-app-layout>
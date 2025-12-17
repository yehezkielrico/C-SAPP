<x-admin>
    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-8">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-3xl font-bold text-white">Edit Simulasi</h1>
                        <p class="mt-2 text-gray-400">Edit simulasi keamanan siber</p>
                    </div>
                    <a href="{{ route('admin.simulations.index') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-gray-600 hover:bg-gray-700">
                        <i class="fas fa-arrow-left mr-2"></i>
                        Kembali
                    </a>
                </div>
            </div>

            <div class="bg-gray-800/50 backdrop-blur-sm rounded-lg border border-gray-700/50 overflow-hidden">
                <form action="{{ route('admin.simulations.update', $simulation) }}" method="POST" class="p-6">
                    @csrf
                    @method('PUT')
                    
                    <div class="grid grid-cols-1 gap-6">
                        <!-- Title -->
                        <div>
                            <label for="title" class="block text-sm font-medium text-gray-300">Judul Simulasi</label>
                            <input type="text" name="title" id="title" class="mt-1 block w-full rounded-md bg-gray-700/50 border border-gray-600 text-white focus:border-blue-500 focus:ring-blue-500" value="{{ old('title', $simulation->title) }}" required>
                            @error('title')
                                <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Description -->
                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-300">Deskripsi</label>
                            <textarea name="description" id="description" rows="3" class="mt-1 block w-full rounded-md bg-gray-700/50 border border-gray-600 text-white focus:border-blue-500 focus:ring-blue-500">{{ old('description', $simulation->description) }}</textarea>
                            @error('description')
                                <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Scenario -->
                        <div>
                            <label for="scenario" class="block text-sm font-medium text-gray-300">Skenario</label>
                            <textarea name="scenario" id="scenario" rows="4" class="mt-1 block w-full rounded-md bg-gray-700/50 border border-gray-600 text-white focus:border-blue-500 focus:ring-blue-500" required>{{ old('scenario', $simulation->scenario) }}</textarea>
                            <p class="mt-1 text-xs text-gray-400">Jelaskan skenario simulasi yang akan dihadapi pengguna</p>
                            @error('scenario')
                                <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Type -->
                        <div>
                            <label for="type" class="block text-sm font-medium text-gray-300">Tipe Simulasi</label>
                            <select name="type" id="type" class="mt-1 block w-full rounded-md bg-gray-700/50 border border-gray-600 text-white focus:border-blue-500 focus:ring-blue-500">
                                <option value="phishing" {{ old('type', $simulation->type) == 'phishing' ? 'selected' : '' }}>Phishing</option>
                                <option value="malware" {{ old('type', $simulation->type) == 'malware' ? 'selected' : '' }}>Malware</option>
                                <option value="password" {{ old('type', $simulation->type) == 'password' ? 'selected' : '' }}>Password Security</option>
                            </select>
                            @error('type')
                                <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Steps -->
                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-2">Langkah-langkah Simulasi</label>
                            <div id="steps-container" class="space-y-6">
                                @foreach($simulation->steps as $index => $step)
                                <div class="step-item border border-gray-700/50 rounded-lg p-4 bg-gray-800/30" data-step-index="{{ $index }}">
                                    <div class="flex items-center justify-between mb-3">
                                        <h4 class="text-sm font-medium text-gray-300">Langkah {{ $index + 1 }}</h4>
                                        <button type="button" class="px-2 py-1 text-xs font-medium text-white bg-red-600 rounded-md hover:bg-red-700" onclick="removeStep(this)" {{ count($simulation->steps) > 1 ? '' : 'style="display: none;"' }}>
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" name="steps[]" class="w-full rounded-md bg-gray-700/50 border border-gray-600 text-white focus:border-blue-500 focus:ring-blue-500" value="{{ old('steps.' . $index, $step) }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="block text-xs font-medium text-gray-400 mb-2">Opsi Jawaban</label>
                                        <div class="options-container space-y-2">
                                            @foreach($simulation->options[$index] ?? [] as $optIdx => $option)
                                            <div class="flex items-center gap-2">
                                                <input type="text" name="options[{{ $index }}][]" class="flex-1 rounded-md bg-gray-700/50 border border-gray-600 text-white focus:border-blue-500 focus:ring-blue-500 text-sm" value="{{ old('options.' . $index . '.' . $optIdx, $option) }}" required>
                                                <button type="button" class="px-2 py-1 text-xs font-medium text-white bg-red-600 rounded-md hover:bg-red-700" onclick="removeOption(this)" {{ count($simulation->options[$index] ?? []) > 2 ? '' : 'style="display: none;"' }}>
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                            @endforeach
                                        </div>
                                        <button type="button" class="mt-2 px-3 py-1 text-xs font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700" onclick="addOption(this)">
                                            <i class="fas fa-plus mr-1"></i> Tambah Opsi
                                        </button>
                                    </div>
                                    <div>
                                        <label class="block text-xs font-medium text-gray-400 mb-2">Jawaban Benar (Index: 0, 1, 2, ...)</label>
                                        <input type="number" name="correct_answers[]" class="w-full rounded-md bg-gray-700/50 border border-gray-600 text-white focus:border-blue-500 focus:ring-blue-500" value="{{ old('correct_answers.' . $index, $simulation->correct_answers[$index] ?? 0) }}" min="0" required>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <button type="button" class="mt-4 px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700" onclick="addStep()">
                                <i class="fas fa-plus mr-2"></i> Tambah Langkah
                            </button>
                            @error('steps')
                                <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                            @enderror
                            @error('options')
                                <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                            @enderror
                            @error('correct_answers')
                                <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Published Status -->
                        <div>
                            <label class="flex items-center">
                                <input type="checkbox" name="is_published" value="1" {{ old('is_published', $simulation->is_published) ? 'checked' : '' }} class="rounded bg-gray-700/50 border-gray-600 text-blue-500 focus:ring-blue-500">
                                <span class="ml-2 text-sm text-gray-300">Publikasikan simulasi ini</span>
                            </label>
                        </div>
                    </div>

                    <div class="mt-6 flex justify-end">
                        <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        let stepIndex = {{ count($simulation->steps) }};

        function addStep() {
            const container = document.getElementById('steps-container');
            const stepItem = document.createElement('div');
            stepItem.className = 'step-item border border-gray-700/50 rounded-lg p-4 bg-gray-800/30';
            stepItem.setAttribute('data-step-index', stepIndex);
            
            stepItem.innerHTML = `
                <div class="flex items-center justify-between mb-3">
                    <h4 class="text-sm font-medium text-gray-300">Langkah ${stepIndex + 1}</h4>
                    <button type="button" class="px-2 py-1 text-xs font-medium text-white bg-red-600 rounded-md hover:bg-red-700" onclick="removeStep(this)">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
                <div class="mb-3">
                    <input type="text" name="steps[]" class="w-full rounded-md bg-gray-700/50 border border-gray-600 text-white focus:border-blue-500 focus:ring-blue-500" placeholder="Masukkan langkah simulasi" required>
                </div>
                <div class="mb-3">
                    <label class="block text-xs font-medium text-gray-400 mb-2">Opsi Jawaban</label>
                    <div class="options-container space-y-2">
                        <div class="flex items-center gap-2">
                            <input type="text" name="options[${stepIndex}][]" class="flex-1 rounded-md bg-gray-700/50 border border-gray-600 text-white focus:border-blue-500 focus:ring-blue-500 text-sm" placeholder="Opsi 1" required>
                            <button type="button" class="px-2 py-1 text-xs font-medium text-white bg-red-600 rounded-md hover:bg-red-700" onclick="removeOption(this)" style="display: none;">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                        <div class="flex items-center gap-2">
                            <input type="text" name="options[${stepIndex}][]" class="flex-1 rounded-md bg-gray-700/50 border border-gray-600 text-white focus:border-blue-500 focus:ring-blue-500 text-sm" placeholder="Opsi 2" required>
                            <button type="button" class="px-2 py-1 text-xs font-medium text-white bg-red-600 rounded-md hover:bg-red-700" onclick="removeOption(this)" style="display: none;">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </div>
                    <button type="button" class="mt-2 px-3 py-1 text-xs font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700" onclick="addOption(this)">
                        <i class="fas fa-plus mr-1"></i> Tambah Opsi
                    </button>
                </div>
                <div>
                    <label class="block text-xs font-medium text-gray-400 mb-2">Jawaban Benar (Index: 0, 1, 2, ...)</label>
                    <input type="number" name="correct_answers[]" class="w-full rounded-md bg-gray-700/50 border border-gray-600 text-white focus:border-blue-500 focus:ring-blue-500" placeholder="0" min="0" required>
                </div>
            `;
            
            container.appendChild(stepItem);
            stepIndex++;
            updateStepNumbers();
        }

        function removeStep(button) {
            const stepItem = button.closest('.step-item');
            const steps = document.querySelectorAll('.step-item');
            if (steps.length <= 1) {
                alert('Minimal harus ada 1 langkah');
                return;
            }
            stepItem.remove();
            updateStepNumbers();
            reindexSteps();
        }

        function addOption(button) {
            const optionsContainer = button.previousElementSibling;
            const stepItem = button.closest('.step-item');
            const stepIdx = stepItem.getAttribute('data-step-index');
            const optionCount = optionsContainer.children.length;
            
            const optionDiv = document.createElement('div');
            optionDiv.className = 'flex items-center gap-2';
            optionDiv.innerHTML = `
                <input type="text" name="options[${stepIdx}][]" class="flex-1 rounded-md bg-gray-700/50 border border-gray-600 text-white focus:border-blue-500 focus:ring-blue-500 text-sm" placeholder="Opsi ${optionCount + 1}" required>
                <button type="button" class="px-2 py-1 text-xs font-medium text-white bg-red-600 rounded-md hover:bg-red-700" onclick="removeOption(this)">
                    <i class="fas fa-trash"></i>
                </button>
            `;
            
            optionsContainer.appendChild(optionDiv);
            updateDeleteButtons(optionsContainer);
        }

        function removeOption(button) {
            const optionsContainer = button.closest('.options-container');
            if (optionsContainer.children.length <= 2) {
                alert('Minimal harus ada 2 opsi');
                return;
            }
            button.parentElement.remove();
            updateDeleteButtons(optionsContainer);
        }

        function updateDeleteButtons(container) {
            const buttons = container.querySelectorAll('button');
            buttons.forEach(btn => {
                btn.style.display = container.children.length > 2 ? 'block' : 'none';
            });
        }

        function updateStepNumbers() {
            const steps = document.querySelectorAll('.step-item');
            steps.forEach((step, index) => {
                step.querySelector('h4').textContent = `Langkah ${index + 1}`;
            });
        }

        function reindexSteps() {
            const steps = document.querySelectorAll('.step-item');
            steps.forEach((step, index) => {
                step.setAttribute('data-step-index', index);
                const inputs = step.querySelectorAll('input[name^="options["]');
                inputs.forEach(input => {
                    input.name = input.name.replace(/options\[\d+\]/, `options[${index}]`);
                });
            });
            stepIndex = steps.length;
        }

        // Initialize delete buttons visibility
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.options-container').forEach(container => {
                updateDeleteButtons(container);
            });
        });
    </script>
    @endpush
</x-admin> 
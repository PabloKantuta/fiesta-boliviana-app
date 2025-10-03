@props(['currentStep' => 1])

<div class="mb-8">
    <nav aria-label="Progreso de creación">
        <ol class="flex items-center justify-center space-x-4 md:space-x-8">
            <!-- Step 1 -->
            <li class="flex items-center {{ $currentStep >= 1 ? 'text-primary' : 'text-gray-400' }}">
                <div class="flex flex-col items-center">
                    <div class="flex items-center justify-center w-10 h-10 rounded-full border-2 {{ $currentStep >= 1 ? 'border-primary bg-primary text-white' : 'border-gray-300 bg-white' }} font-semibold mb-2">
                        @if($currentStep > 1)
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                        @else
                            1
                        @endif
                    </div>
                    <span class="text-sm font-medium hidden md:block">Datos del Cliente</span>
                </div>
                <svg class="w-6 h-6 ml-4 hidden md:block" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </li>

            <!-- Step 2 -->
            <li class="flex items-center {{ $currentStep >= 2 ? 'text-primary' : 'text-gray-400' }}">
                <div class="flex flex-col items-center">
                    <div class="flex items-center justify-center w-10 h-10 rounded-full border-2 {{ $currentStep >= 2 ? 'border-primary bg-primary text-white' : 'border-gray-300 bg-white' }} font-semibold mb-2">
                        @if($currentStep > 2)
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                        @else
                            2
                        @endif
                    </div>
                    <span class="text-sm font-medium hidden md:block">Selección de Paquetes</span>
                </div>
                <svg class="w-6 h-6 ml-4 hidden md:block" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </li>

            <!-- Step 3 -->
            <li class="flex items-center {{ $currentStep >= 3 ? 'text-primary' : 'text-gray-400' }}">
                <div class="flex flex-col items-center">
                    <div class="flex items-center justify-center w-10 h-10 rounded-full border-2 {{ $currentStep >= 3 ? 'border-primary bg-primary text-white' : 'border-gray-300 bg-white' }} font-semibold mb-2">
                        3
                    </div>
                    <span class="text-sm font-medium hidden md:block">Confirmar y Crear</span>
                </div>
            </li>
        </ol>
    </nav>
</div>

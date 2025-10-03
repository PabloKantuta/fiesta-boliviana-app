@props(['message' => 'No se encontraron resultados', 'action' => null, 'actionLabel' => 'Crear nuevo'])

<div class="flex flex-col items-center justify-center py-12 px-4">
    <svg class="w-24 h-24 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
    </svg>
    
    <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ $message }}</h3>
    <p class="text-sm text-gray-500 mb-6 text-center max-w-md">
        {{ $slot->isEmpty() ? 'Intenta ajustar los filtros o crea un nuevo registro.' : $slot }}
    </p>
    
    @if($action)
        <a href="{{ $action }}" class="inline-flex items-center px-4 py-2 bg-primary text-white text-sm font-medium rounded-lg hover:bg-primary/90 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 transition">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            {{ $actionLabel }}
        </a>
    @endif
</div>

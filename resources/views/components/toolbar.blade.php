@props([
    'searchPlaceholder' => 'Buscar...',
    'showStatusFilter' => false,
    'statusOptions' => [],
    'showDateFilter' => false,
    'showCreateButton' => false,
    'createRoute' => '#',
    'createLabel' => 'Crear nuevo'
])

<div class="bg-white rounded-2xl shadow-sm p-4 mb-6 border border-gray-100">
    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
        <!-- Search Input -->
        <div class="flex-1 max-w-md">
            <label for="search" class="sr-only">Buscar</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </div>
                <input 
                    type="search" 
                    id="search"
                    name="search"
                    class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary text-sm"
                    placeholder="{{ $searchPlaceholder }}"
                    aria-label="{{ $searchPlaceholder }}"
                >
            </div>
        </div>

        <!-- Filters -->
        <div class="flex flex-wrap items-center gap-3">
            @if($showStatusFilter && count($statusOptions) > 0)
                <div class="w-full sm:w-auto">
                    <label for="status-filter" class="sr-only">Filtrar por estado</label>
                    <select 
                        id="status-filter"
                        name="status"
                        class="block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary text-sm"
                    >
                        <option value="">Todos los estados</option>
                        @foreach($statusOptions as $value => $label)
                            <option value="{{ $value }}">{{ $label }}</option>
                        @endforeach
                    </select>
                </div>
            @endif

            @if($showDateFilter)
                <div class="w-full sm:w-auto">
                    <label for="date-from" class="sr-only">Fecha desde</label>
                    <input 
                        type="date" 
                        id="date-from"
                        name="date_from"
                        class="block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary text-sm"
                    >
                </div>
                <div class="w-full sm:w-auto">
                    <label for="date-to" class="sr-only">Fecha hasta</label>
                    <input 
                        type="date" 
                        id="date-to"
                        name="date_to"
                        class="block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary text-sm"
                    >
                </div>
            @endif

            <button 
                type="button"
                class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-lg text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 transition"
                onclick="/* Aplicar filtros */"
            >
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/>
                </svg>
                Aplicar
            </button>

            {{ $slot }}

            @if($showCreateButton)
                <a 
                    href="{{ $createRoute }}"
                    class="inline-flex items-center px-4 py-2 bg-primary text-white text-sm font-medium rounded-lg hover:bg-primary/90 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 transition"
                >
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    {{ $createLabel }}
                </a>
            @endif
        </div>
    </div>
</div>

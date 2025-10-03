<x-app-layout>
    <x-slot name="header">Reportes</x-slot>
    <x-slot name="title">Reportes - Sr Fiesta</x-slot>

    <!-- Report Type Selector -->
    <div class="bg-white rounded-2xl shadow-card p-6 border border-gray-100 mb-6">
        <h2 class="text-lg font-semibold text-gray-900 mb-4">Seleccionar Tipo de Reporte</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <button 
                onclick="/* Mostrar reporte inventario */"
                class="flex items-start p-4 border-2 border-primary bg-primary/5 rounded-xl hover:bg-primary/10 transition text-left"
            >
                <div class="flex-shrink-0 w-12 h-12 bg-primary/20 rounded-lg flex items-center justify-center mr-4">
                    <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                    </svg>
                </div>
                <div>
                    <h3 class="text-sm font-semibold text-gray-900 mb-1">Inventario de Activos</h3>
                    <p class="text-xs text-gray-600">Estado actual, disponibilidad y movimientos</p>
                </div>
            </button>

            <button 
                onclick="/* Mostrar reporte ingresos */"
                class="flex items-start p-4 border-2 border-gray-200 rounded-xl hover:border-primary hover:bg-primary/5 transition text-left"
            >
                <div class="flex-shrink-0 w-12 h-12 bg-gray-100 rounded-lg flex items-center justify-center mr-4">
                    <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div>
                    <h3 class="text-sm font-semibold text-gray-900 mb-1">Ingresos y Ventas</h3>
                    <p class="text-xs text-gray-600">Análisis de ingresos, paquetes más rentables</p>
                </div>
            </button>

            <button 
                onclick="/* Mostrar reporte moras */"
                class="flex items-start p-4 border-2 border-gray-200 rounded-xl hover:border-primary hover:bg-primary/5 transition text-left"
            >
                <div class="flex-shrink-0 w-12 h-12 bg-gray-100 rounded-lg flex items-center justify-center mr-4">
                    <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div>
                    <h3 class="text-sm font-semibold text-gray-900 mb-1">Moras y Retardos</h3>
                    <p class="text-xs text-gray-600">Alquileres vencidos, penalizaciones</p>
                </div>
            </button>
        </div>
    </div>

    <!-- Filters -->
    <div class="bg-white rounded-2xl shadow-card p-6 border border-gray-100 mb-6">
        <h3 class="text-sm font-semibold text-gray-900 mb-4">Filtros de Reporte</h3>
        
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div>
                <label for="fecha_desde" class="block text-xs font-medium text-gray-700 mb-2">Fecha Desde</label>
                <input 
                    type="date" 
                    id="fecha_desde"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-primary focus:border-primary"
                >
            </div>
            <div>
                <label for="fecha_hasta" class="block text-xs font-medium text-gray-700 mb-2">Fecha Hasta</label>
                <input 
                    type="date" 
                    id="fecha_hasta"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-primary focus:border-primary"
                >
            </div>
            <div>
                <label for="ciudad_reporte" class="block text-xs font-medium text-gray-700 mb-2">Ciudad</label>
                <select 
                    id="ciudad_reporte"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-primary focus:border-primary"
                >
                    <option value="">Todas</option>
                    <option value="La Paz">La Paz</option>
                    <option value="Santa Cruz">Santa Cruz</option>
                    <option value="Cochabamba">Cochabamba</option>
                </select>
            </div>
            <div class="flex items-end">
                <button 
                    onclick="/* Generar reporte */"
                    class="w-full px-4 py-2 bg-primary text-white text-sm font-medium rounded-lg hover:bg-primary/90 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2"
                >
                    Generar Reporte
                </button>
            </div>
        </div>
    </div>

    <!-- Report Preview - Inventario Example -->
    <div class="bg-white rounded-2xl shadow-card overflow-hidden border border-gray-100">
        <div class="px-6 py-4 border-b border-gray-200 flex items-center justify-between">
            <h3 class="text-lg font-semibold text-gray-900">Reporte de Inventario de Activos</h3>
            <div class="flex gap-2">
                <button 
                    onclick="/* Exportar Excel */"
                    class="inline-flex items-center px-3 py-2 border border-gray-300 text-sm font-medium rounded-lg text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-primary"
                >
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    Excel
                </button>
                <button 
                    onclick="/* Exportar PDF */"
                    class="inline-flex items-center px-3 py-2 border border-gray-300 text-sm font-medium rounded-lg text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-primary"
                >
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                    </svg>
                    PDF
                </button>
            </div>
        </div>

        <div class="p-6">
            <!-- Summary Cards -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
                <div class="bg-blue-50 rounded-lg p-4">
                    <p class="text-xs text-blue-600 font-medium uppercase">Total Activos</p>
                    <p class="text-2xl font-bold text-blue-900 mt-1">342</p>
                </div>
                <div class="bg-green-50 rounded-lg p-4">
                    <p class="text-xs text-green-600 font-medium uppercase">Disponibles</p>
                    <p class="text-2xl font-bold text-green-900 mt-1">298</p>
                </div>
                <div class="bg-yellow-50 rounded-lg p-4">
                    <p class="text-xs text-yellow-600 font-medium uppercase">En Uso</p>
                    <p class="text-2xl font-bold text-yellow-900 mt-1">32</p>
                </div>
                <div class="bg-red-50 rounded-lg p-4">
                    <p class="text-xs text-red-600 font-medium uppercase">Mantenimiento</p>
                    <p class="text-2xl font-bold text-red-900 mt-1">12</p>
                </div>
            </div>

            <!-- Table Preview -->
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead class="bg-gray-50 border-b border-gray-200">
                        <tr>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Categoría</th>
                            <th class="px-4 py-3 text-right text-xs font-medium text-gray-500 uppercase">Total</th>
                            <th class="px-4 py-3 text-right text-xs font-medium text-gray-500 uppercase">Disponible</th>
                            <th class="px-4 py-3 text-right text-xs font-medium text-gray-500 uppercase">En Uso</th>
                            <th class="px-4 py-3 text-right text-xs font-medium text-gray-500 uppercase">% Utilización</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3 font-medium text-gray-900">Mobiliario</td>
                            <td class="px-4 py-3 text-right">150</td>
                            <td class="px-4 py-3 text-right text-green-600 font-medium">132</td>
                            <td class="px-4 py-3 text-right text-yellow-600 font-medium">18</td>
                            <td class="px-4 py-3 text-right">12%</td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3 font-medium text-gray-900">Textil</td>
                            <td class="px-4 py-3 text-right">80</td>
                            <td class="px-4 py-3 text-right text-green-600 font-medium">72</td>
                            <td class="px-4 py-3 text-right text-yellow-600 font-medium">8</td>
                            <td class="px-4 py-3 text-right">10%</td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3 font-medium text-gray-900">Vajilla</td>
                            <td class="px-4 py-3 text-right">90</td>
                            <td class="px-4 py-3 text-right text-green-600 font-medium">78</td>
                            <td class="px-4 py-3 text-right text-yellow-600 font-medium">12</td>
                            <td class="px-4 py-3 text-right">13%</td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3 font-medium text-gray-900">Decoración</td>
                            <td class="px-4 py-3 text-right">22</td>
                            <td class="px-4 py-3 text-right text-green-600 font-medium">16</td>
                            <td class="px-4 py-3 text-right text-yellow-600 font-medium">6</td>
                            <td class="px-4 py-3 text-right">27%</td>
                        </tr>
                    </tbody>
                    <tfoot class="bg-gray-50 border-t-2 border-gray-300">
                        <tr>
                            <td class="px-4 py-3 font-bold text-gray-900">TOTAL</td>
                            <td class="px-4 py-3 text-right font-bold">342</td>
                            <td class="px-4 py-3 text-right font-bold text-green-600">298</td>
                            <td class="px-4 py-3 text-right font-bold text-yellow-600">44</td>
                            <td class="px-4 py-3 text-right font-bold">13%</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>

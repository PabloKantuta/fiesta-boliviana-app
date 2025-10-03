<x-app-layout>
    <x-slot name="header">Dashboard</x-slot>
    <x-slot name="title">Dashboard - Fiesta Bolivia</x-slot>

    <!-- KPIs Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <x-kpi-card 
            title="Ingresos del Mes" 
            value="Bs. 45,320.00" 
            icon="money"
            trend="+12.5%"
            :trendUp="true"
        />
        
        <x-kpi-card 
            title="Alquileres Activos" 
            value="28" 
            icon="box"
            trend="+8 nuevos"
            :trendUp="true"
        />
        
        <x-kpi-card 
            title="Activos Disponibles" 
            value="342" 
            icon="chart"
            trend="-5.2%"
            :trendUp="false"
        />
        
        <x-kpi-card 
            title="Clientes Activos" 
            value="156" 
            icon="users"
            trend="+23 este mes"
            :trendUp="true"
        />
    </div>

    <!-- Charts & Recent Activity -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
        <!-- Revenue Chart -->
        <div class="bg-white rounded-2xl shadow-card p-6 border border-gray-100">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-lg font-semibold text-gray-900">Ingresos Mensuales</h3>
                <select class="text-sm border border-gray-300 rounded-lg px-3 py-1.5 focus:ring-2 focus:ring-primary focus:border-primary">
                    <option>Últimos 6 meses</option>
                    <option>Último año</option>
                    <option>Todo el período</option>
                </select>
            </div>
            <div class="h-64 flex items-center justify-center text-gray-400 border-2 border-dashed border-gray-200 rounded-lg">
                <div class="text-center">
                    <svg class="w-12 h-12 mx-auto mb-2 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                    </svg>
                    <p class="text-sm">Gráfico de ingresos</p>
                    <p class="text-xs text-gray-500 mt-1">(Integrar con Chart.js)</p>
                </div>
            </div>
        </div>

        <!-- Top Packages -->
        <div class="bg-white rounded-2xl shadow-card p-6 border border-gray-100">
            <h3 class="text-lg font-semibold text-gray-900 mb-6">Paquetes Más Solicitados</h3>
            <div class="space-y-4">
                @php
                    $topPackages = [
                        ['name' => 'Paquete Boda Premium', 'count' => 45, 'revenue' => 'Bs. 18,500'],
                        ['name' => 'Paquete Cumpleaños Infantil', 'count' => 38, 'revenue' => 'Bs. 12,300'],
                        ['name' => 'Paquete Evento Corporativo', 'count' => 28, 'revenue' => 'Bs. 15,200'],
                        ['name' => 'Paquete Fiesta Teen', 'count' => 22, 'revenue' => 'Bs. 8,900'],
                    ];
                @endphp

                @foreach($topPackages as $package)
                    <div class="flex items-center justify-between pb-4 border-b border-gray-100 last:border-0">
                        <div class="flex-1">
                            <p class="text-sm font-medium text-gray-900">{{ $package['name'] }}</p>
                            <p class="text-xs text-gray-500 mt-1">{{ $package['count'] }} alquileres</p>
                        </div>
                        <div class="text-right">
                            <p class="text-sm font-semibold text-gray-900">{{ $package['revenue'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Recent Rentals & Upcoming Events -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Recent Rentals -->
        <div class="bg-white rounded-2xl shadow-card p-6 border border-gray-100">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-lg font-semibold text-gray-900">Alquileres Recientes</h3>
                <a href="{{ route('alquileres.index') }}" class="text-sm text-primary hover:text-primary/80 font-medium">
                    Ver todos →
                </a>
            </div>

            <div class="space-y-4">
                @php
                    $recentRentals = [
                        ['id' => 'ALQ-2025-089', 'client' => 'María González', 'event' => 'Boda', 'date' => '15/02/2025', 'status' => 'activo'],
                        ['id' => 'ALQ-2025-088', 'client' => 'Carlos Pérez', 'event' => 'Cumpleaños', 'date' => '12/02/2025', 'status' => 'pendiente'],
                        ['id' => 'ALQ-2025-087', 'client' => 'Ana Rodríguez', 'event' => 'Evento Corporativo', 'date' => '10/02/2025', 'status' => 'completado'],
                        ['id' => 'ALQ-2025-086', 'client' => 'Luis Morales', 'event' => 'Fiesta', 'date' => '08/02/2025', 'status' => 'completado'],
                    ];
                @endphp

                @foreach($recentRentals as $rental)
                    <div class="flex items-center justify-between p-4 hover:bg-gray-50 rounded-lg transition">
                        <div class="flex-1">
                            <div class="flex items-center gap-3">
                                <p class="text-sm font-medium text-gray-900">{{ $rental['id'] }}</p>
                                <x-status-badge :status="$rental['status']" />
                            </div>
                            <p class="text-sm text-gray-600 mt-1">{{ $rental['client'] }} - {{ $rental['event'] }}</p>
                            <p class="text-xs text-gray-500 mt-1">{{ $rental['date'] }}</p>
                        </div>
                        <a href="#" class="text-gray-400 hover:text-gray-600">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Upcoming Events -->
        <div class="bg-white rounded-2xl shadow-card p-6 border border-gray-100">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-lg font-semibold text-gray-900">Próximos Eventos</h3>
                <a href="{{ route('ordenes.index') }}" class="text-sm text-primary hover:text-primary/80 font-medium">
                    Ver calendario →
                </a>
            </div>

            <div class="space-y-4">
                @php
                    $upcomingEvents = [
                        ['date' => '05', 'month' => 'Feb', 'title' => 'Entrega - Boda María González', 'time' => '14:00 hrs', 'type' => 'entrega'],
                        ['date' => '07', 'month' => 'Feb', 'title' => 'Retiro - Evento Carlos Pérez', 'time' => '10:00 hrs', 'type' => 'retiro'],
                        ['date' => '10', 'month' => 'Feb', 'title' => 'Entrega - Cumpleaños Ana López', 'time' => '16:00 hrs', 'type' => 'entrega'],
                        ['date' => '12', 'month' => 'Feb', 'title' => 'Retiro - Evento Corporativo', 'time' => '09:00 hrs', 'type' => 'retiro'],
                    ];
                @endphp

                @foreach($upcomingEvents as $event)
                    <div class="flex items-start gap-4 p-3 hover:bg-gray-50 rounded-lg transition">
                        <div class="flex-shrink-0 w-14 text-center">
                            <p class="text-2xl font-bold text-gray-900">{{ $event['date'] }}</p>
                            <p class="text-xs text-gray-500 uppercase">{{ $event['month'] }}</p>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-gray-900 truncate">{{ $event['title'] }}</p>
                            <p class="text-xs text-gray-500 mt-1">{{ $event['time'] }}</p>
                            <span class="inline-block mt-2 px-2 py-1 text-xs rounded-full {{ $event['type'] === 'entrega' ? 'bg-blue-100 text-blue-700' : 'bg-green-100 text-green-700' }}">
                                {{ ucfirst($event['type']) }}
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>

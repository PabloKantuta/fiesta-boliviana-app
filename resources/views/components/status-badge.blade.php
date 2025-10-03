@props(['status' => 'pendiente'])

@php
    $variants = [
        'activo' => 'bg-accent/10 text-accent',
        'pendiente' => 'bg-warning/10 text-warning',
        'completado' => 'bg-primary/10 text-primary',
        'cancelado' => 'bg-danger/10 text-danger',
        'en_proceso' => 'bg-blue-100 text-blue-700',
        'disponible' => 'bg-accent/10 text-accent',
        'en_uso' => 'bg-yellow-100 text-yellow-700',
        'mantenimiento' => 'bg-orange-100 text-orange-700',
        'baja' => 'bg-gray-100 text-gray-600',
        'entregado' => 'bg-accent/10 text-accent',
        'retornado' => 'bg-blue-100 text-blue-700',
        'vencido' => 'bg-danger/10 text-danger',
    ];
    
    $labels = [
        'activo' => 'Activo',
        'pendiente' => 'Pendiente',
        'completado' => 'Completado',
        'cancelado' => 'Cancelado',
        'en_proceso' => 'En Proceso',
        'disponible' => 'Disponible',
        'en_uso' => 'En Uso',
        'mantenimiento' => 'Mantenimiento',
        'baja' => 'Baja',
        'entregado' => 'Entregado',
        'retornado' => 'Retornado',
        'vencido' => 'Vencido',
    ];
    
    $class = $variants[$status] ?? 'bg-gray-100 text-gray-600';
    $label = $labels[$status] ?? ucfirst($status);
@endphp

<span {{ $attributes->merge(['class' => "inline-flex items-center px-3 py-1 rounded-full text-xs font-medium {$class}"]) }}>
    {{ $slot->isEmpty() ? $label : $slot }}
</span>

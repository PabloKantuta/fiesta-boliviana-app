# Fiesta Bolivia - Documentación Frontend

## 📋 Resumen

Sistema de gestión de alquileres de paquetes decorativos para eventos con UI moderna construida en **Laravel Blade + Tailwind CSS**.

---

## 🎨 Estructura de Archivos Generados

### **Layouts**
- `resources/views/layouts/app.blade.php` - Layout principal con sidebar responsive

### **Componentes Reutilizables**
- `resources/views/components/kpi-card.blade.php` - Tarjetas de métricas con iconos y tendencias
- `resources/views/components/status-badge.blade.php` - Badges de estado (activo, pendiente, completado, etc.)
- `resources/views/components/empty-state.blade.php` - Estado vacío con llamado a acción
- `resources/views/components/toolbar.blade.php` - Barra de búsqueda y filtros reutilizable
- `resources/views/components/wizard-steps.blade.php` - Indicador visual de pasos para wizard

### **Páginas Principales**
- `resources/views/dashboard.blade.php` - Dashboard con KPIs y widgets
- `resources/views/paquetes/index.blade.php` - Catálogo de paquetes (grid de cards)
- `resources/views/paquetes/show.blade.php` - Detalle de paquete con items y precios
- `resources/views/alquileres/index.blade.php` - Lista de alquileres (tabla)
- `resources/views/alquileres/create.blade.php` - Wizard de 3 pasos para crear alquiler
- `resources/views/activos/index.blade.php` - Inventario con stats y tabla
- `resources/views/ordenes/index.blade.php` - Lista de órdenes logísticas
- `resources/views/ordenes/show.blade.php` - Detalle con timeline vertical
- `resources/views/listas-precios/index.blade.php` - Gestión de listas de precios
- `resources/views/reportes/index.blade.php` - Generador de reportes con preview

### **Configuración**
- `tailwind.config.js` - Tokens de diseño (colores, sombras)

---

## 🔗 Integración con Backend

### **Reemplazar Mock Data con Datos Reales**

#### Dashboard (`dashboard.blade.php`)
```php
// Reemplazar arrays PHP mock por:
@php
    $kpis = [
        'ingresos_mes' => App\Services\ReportService::getIngresosDelMes(),
        'alquileres_activos' => Alquiler::where('estado', 'activo')->count(),
        'activos_disponibles' => Activo::where('estado', 'disponible')->count(),
        'clientes_activos' => Cliente::whereHas('alquileres')->distinct()->count(),
    ];
    
    $recentRentals = Alquiler::with('cliente')->latest()->take(4)->get();
    $upcomingEvents = OrdenLogistica::where('fecha', '>=', now())->orderBy('fecha')->take(4)->get();
@endphp
```

#### Paquetes (`paquetes/index.blade.php`)
```php
// En el controlador:
public function index() {
    $paquetes = Paquete::with('precios')->paginate(12);
    return view('paquetes.index', compact('paquetes'));
}

// Luego en la vista eliminar el array mock y usar: @foreach($paquetes as $paquete)
```

#### Alquileres (`alquileres/index.blade.php`)
```php
// En el controlador:
public function index() {
    $alquileres = Alquiler::with(['cliente', 'detalles'])
        ->when(request('search'), fn($q) => $q->search(request('search')))
        ->when(request('status'), fn($q) => $q->where('estado', request('status')))
        ->latest()
        ->paginate(20);
    
    return view('alquileres.index', compact('alquileres'));
}
```

#### Wizard de Alquiler (`alquileres/create.blade.php`)
```php
// Paso 1-2-3: Almacenar datos en sesión o usar Livewire
public function create() {
    $clientes = Cliente::orderBy('nombre')->get();
    $paquetes = Paquete::with('precios')->where('activo', true)->get();
    $ciudades = Ciudad::all();
    
    return view('alquileres.create', compact('clientes', 'paquetes', 'ciudades'));
}

// Para mantener estado entre pasos, usar:
// - Session::put('alquiler_draft', $data)
// - O implementar con Livewire para reactividad real
```

#### Activos (`activos/index.blade.php`)
```php
public function index() {
    $activos = Activo::with('item')
        ->when(request('search'), fn($q) => $q->searchByCode(request('search')))
        ->when(request('status'), fn($q) => $q->where('estado', request('status')))
        ->paginate(50);
    
    $stats = [
        'total' => Activo::count(),
        'disponibles' => Activo::where('estado', 'disponible')->count(),
        'en_uso' => Activo::where('estado', 'en_uso')->count(),
        'mantenimiento' => Activo::where('estado', 'mantenimiento')->count(),
    ];
    
    return view('activos.index', compact('activos', 'stats'));
}
```

---

## ✅ Checklist de Calidad por Página

### **Dashboard** ✓
- [x] Responsive (mobile-first)
- [x] KPIs con iconos y tendencias visuales
- [x] Cards interactivos (hover states)
- [x] Links funcionales a secciones
- [x] Mock data estructurado para fácil reemplazo
- [x] Sin lógica de negocio

### **Catálogo de Paquetes** ✓
- [x] Grid responsive (1/2/3 columnas)
- [x] Cards con imágenes lazy-loading
- [x] Categorías visuales con badges
- [x] Toolbar con búsqueda
- [x] Empty state con CTA
- [x] Paginación accesible

### **Detalle de Paquete** ✓
- [x] Layout 2 columnas en desktop
- [x] Tabla de items responsive
- [x] Precios por ciudad
- [x] Navegación breadcrumb
- [x] Acciones desacopladas (onclick vacío)

### **Lista de Alquileres** ✓
- [x] Toolbar con múltiples filtros
- [x] Tabla sticky header
- [x] Badges de estado consistentes
- [x] Acciones con iconos (ver/editar/eliminar)
- [x] Paginación con info de resultados
- [x] Responsive: overflow-x en mobile

### **Wizard de Crear Alquiler** ✓
- [x] 3 pasos visuales con indicador
- [x] Navegación Anterior/Siguiente
- [x] Validación HTML5 (required, types)
- [x] Step 3: Resumen antes de confirmar
- [x] Formulario semántico con labels
- [x] Aria-labels en campos

### **Inventario de Activos** ✓
- [x] Stats cards superiores
- [x] Filtros por estado y categoría
- [x] Tabla con columna código (monospace)
- [x] Badges de categoría diferenciados
- [x] Acciones contextuales

### **Logística - Lista de Órdenes** ✓
- [x] Filtros por fecha y estado
- [x] Toggle vista Lista/Calendario (UI only)
- [x] Badges diferenciados Entrega/Retiro
- [x] Links a alquileres relacionados

### **Logística - Detalle de Orden** ✓
- [x] Layout 2 columnas (Timeline + Detalles)
- [x] Timeline vertical con estados
- [x] Estados visual: completado/actual/pendiente
- [x] Tabla de items con estado de preparación
- [x] Sticky sidebar en desktop
- [x] Responsive: stack en mobile

### **Listas de Precios** ✓
- [x] Grid de cards
- [x] Badges de vigencia/estado
- [x] Acciones ver/editar

### **Reportes** ✓
- [x] Selector de tipo de reporte
- [x] Filtros genéricos (fechas, ciudad)
- [x] Preview con tabla y stats
- [x] Botones exportar (Excel/PDF) sin lógica
- [x] Responsive tables

---

## 🎨 Tokens de Diseño (Tailwind)

### Colores
```javascript
'primary': '#2563eb'      // Azul para acciones principales
'accent': '#22c55e'       // Verde para estados positivos
'warning': '#f59e0b'      // Amarillo para alertas
'danger': '#ef4444'       // Rojo para errores/eliminación
'dark-bg': '#0b1220'      // Fondo sidebar oscuro
'card-bg': '#0f172a'      // Fondo cards oscuros (si aplica)
```

### Sombras
```javascript
'card': '0 10px 20px rgba(0, 0, 0, 0.25)'  // Sombra elevada para cards
```

### Radios
- Buttons: `rounded-lg` (8px)
- Cards: `rounded-2xl` (16px)
- Badges: `rounded-full`

---

## 🌐 Rutas Necesarias (web.php)

```php
// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Paquetes
Route::resource('paquetes', PaqueteController::class);

// Alquileres
Route::resource('alquileres', AlquilerController::class);
// Route::post('/alquileres/preview', [AlquilerController::class, 'preview'])->name('alquileres.preview'); // Paso intermedio wizard si aplica

// Activos
Route::resource('activos', ActivoController::class);

// Órdenes Logísticas
Route::resource('ordenes', OrdenController::class);

// Listas de Precios
Route::resource('listas-precios', ListaPrecioController::class);

// Reportes
Route::get('/reportes', [ReporteController::class, 'index'])->name('reportes.index');
```

---

## ♿ Accesibilidad Implementada

- ✅ Contraste AA en textos (gray-700+ sobre blanco)
- ✅ `aria-label` en botones de iconos
- ✅ `<label>` asociados a inputs (for/id)
- ✅ `aria-describedby` para mensajes de error (preparado)
- ✅ Focus visible con `focus:ring-2 focus:ring-primary`
- ✅ Navegación por teclado funcional
- ✅ Semántica HTML correcta (`<nav>`, `<main>`, `<table>`, etc.)
- ✅ `sr-only` para textos ocultos pero leíbles por screen readers

---

## 📱 Responsive Breakpoints

- **Mobile**: base (< 640px)
- **Tablet**: `md:` (768px+)
- **Desktop**: `lg:` (1024px+)

**Estrategia**:
- Sidebar oculto en mobile (`hidden lg:flex`)
- Grids: 1 col → 2 cols (md) → 3/4 cols (lg)
- Tablas: overflow-x-auto en mobile
- Forms: stack en mobile, grid en desktop

---

## 🚀 Próximos Pasos de Integración

1. **Crear Controladores** con métodos CRUD básicos
2. **Conectar modelos** Eloquent (ya existen en `app/Models/`)
3. **Implementar búsquedas** con scopes en modelos:
   ```php
   // Ejemplo en Alquiler.php
   public function scopeSearch($query, $term) {
       return $query->where('id', 'like', "%{$term}%")
                    ->orWhereHas('cliente', fn($q) => $q->where('nombre', 'like', "%{$term}%"));
   }
   ```
4. **Agregar paginación** Laravel estándar
5. **Flash messages** para success/error después de acciones
6. **Validación backend** en FormRequests
7. **Autorización** con Policies si aplica
8. **Imagenes reales** de paquetes (upload/storage)

---

## 🔧 Mejoras Opcionales (Futuro)

- **Livewire**: Para interactividad sin recargar (filtros en tiempo real, wizard reactivo)
- **Alpine.js**: Para modals, dropdowns, toggles sin backend
- **Chart.js / ApexCharts**: Gráficos reales en dashboard
- **DataTables / TanStack Table**: Tablas avanzadas con sorting/filtrado cliente
- **Exportación real**: Laravel Excel para reportes
- **Notificaciones**: Toast con Toastr.js o SweetAlert2
- **Calendar view**: FullCalendar para órdenes logísticas

---

## 📝 Notas Finales

### Sin Lógica de Negocio
Todas las vistas son **presentacionales**:
- Botones tienen `onclick="/* comentario */"` o vacío
- Formularios apuntan a rutas pero no procesan nada aún
- Cálculos (totales, descuentos) no se realizan en frontend

### Datos Mock Tipados
Los arrays PHP mock incluyen todos los campos que se renderizan:
```php
['id' => 1, 'nombre' => '...', 'estado' => 'activo']
```

### Reutilización de Componentes
Todos los componentes Blade admiten props:
```blade
<x-status-badge status="activo" />
<x-kpi-card title="..." value="..." icon="money" />
<x-toolbar :showDateFilter="true" :statusOptions="[...]" />
```

### Formato de Moneda
Siempre usar **Bs. XXXX.XX** (Bolivianos bolivianos).

---

## 🎯 Checklist de Deployment

- [ ] Compilar assets: `npm run build`
- [ ] Optimizar Tailwind: producción purga clases no usadas
- [ ] Configurar rutas nombradas en todos los `href="{{ route('...') }}"`
- [ ] Subir imágenes de paquetes a `/storage/app/public/`
- [ ] Ejecutar migraciones: `php artisan migrate`
- [ ] Seed data inicial: clientes, paquetes, ciudades
- [ ] Configurar autenticación (Breeze ya instalado)

---

**Desarrollado para: Fiesta Bolivia**  
**Stack: Laravel 11 + Blade + Tailwind CSS 3**  
**Fecha: Octubre 2025**  
**Versión: 1.0**

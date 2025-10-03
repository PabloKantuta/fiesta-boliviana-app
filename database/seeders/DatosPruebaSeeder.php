<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cliente;
use App\Models\Paquete;
use App\Models\Item;
use App\Models\Ciudad;
use App\Models\PrecioPaquete;

class DatosPruebaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. CREAR CIUDADES
        $ciudades = [
            ['nombre' => 'La Paz', 'region' => 'Altiplano', 'pais' => 'Bolivia'],
            ['nombre' => 'Santa Cruz', 'region' => 'Llanos', 'pais' => 'Bolivia'],
            ['nombre' => 'Cochabamba', 'region' => 'Valles', 'pais' => 'Bolivia'],
        ];

        foreach ($ciudades as $ciudad) {
            Ciudad::create($ciudad);
        }

        // 2. CREAR CLIENTES
        $clientes = [
            [
                'nombre' => 'María García López',
                'doc_id' => '1234567 LP',
                'telefono' => '70123456',
                'email' => 'maria.garcia@example.com',
                'ciudad' => 'La Paz',
                'direccion' => 'Av. 6 de Agosto #2345',
            ],
            [
                'nombre' => 'Carlos Mamani Quispe',
                'doc_id' => '7654321 SC',
                'telefono' => '75987654',
                'email' => 'carlos.mamani@example.com',
                'ciudad' => 'Santa Cruz',
                'direccion' => 'Calle Libertad #456',
            ],
            [
                'nombre' => 'Eventos XYZ S.R.L.',
                'doc_id' => '9988776 CB',
                'telefono' => '44567890',
                'email' => 'eventos@xyz.com',
                'ciudad' => 'Cochabamba',
                'direccion' => 'Av. América #789',
            ],
        ];

        foreach ($clientes as $cliente) {
            Cliente::create($cliente);
        }

        // 3. CREAR ITEMS
        $items = [
            ['nombre' => 'Silla Plástica Blanca', 'categoria' => 'Mobiliario', 'unidad_medida' => 'unidad'],
            ['nombre' => 'Mesa Rectangular 2m', 'categoria' => 'Mobiliario', 'unidad_medida' => 'unidad'],
            ['nombre' => 'Mantel Blanco 2x2m', 'categoria' => 'Textil', 'unidad_medida' => 'unidad'],
            ['nombre' => 'Toldo 3x3m', 'categoria' => 'Estructuras', 'unidad_medida' => 'unidad'],
            ['nombre' => 'Plato Hondo Blanco', 'categoria' => 'Vajilla', 'unidad_medida' => 'unidad'],
            ['nombre' => 'Vaso de Vidrio 300ml', 'categoria' => 'Vajilla', 'unidad_medida' => 'unidad'],
        ];

        foreach ($items as $item) {
            Item::create($item);
        }

        // 4. CREAR PAQUETES
        $paquetes = [
            [
                'nombre' => 'Paquete Básico',
                'estilo' => 'Casual',
                'capacidad' => 20,
                'descripcion' => 'Paquete básico para eventos pequeños (hasta 20 personas)',
                'activo' => true,
            ],
            [
                'nombre' => 'Paquete Familiar',
                'estilo' => 'Familiar',
                'capacidad' => 50,
                'descripcion' => 'Ideal para reuniones familiares (hasta 50 personas)',
                'activo' => true,
            ],
            [
                'nombre' => 'Paquete Empresarial',
                'estilo' => 'Corporativo',
                'capacidad' => 100,
                'descripcion' => 'Para eventos corporativos (hasta 100 personas)',
                'activo' => true,
            ],
        ];

        foreach ($paquetes as $paquete) {
            $p = Paquete::create($paquete);

            // Asignar items al paquete
            if ($p->nombre == 'Paquete Básico') {
                $p->items()->attach(1, ['cantidad_por_paquete' => 20]); // 20 sillas
                $p->items()->attach(2, ['cantidad_por_paquete' => 4]);  // 4 mesas
                $p->items()->attach(3, ['cantidad_por_paquete' => 4]);  // 4 manteles
            } elseif ($p->nombre == 'Paquete Familiar') {
                $p->items()->attach(1, ['cantidad_por_paquete' => 50]); // 50 sillas
                $p->items()->attach(2, ['cantidad_por_paquete' => 10]); // 10 mesas
                $p->items()->attach(3, ['cantidad_por_paquete' => 10]); // 10 manteles
                $p->items()->attach(4, ['cantidad_por_paquete' => 2]);  // 2 toldos
            } else {
                $p->items()->attach(1, ['cantidad_por_paquete' => 100]); // 100 sillas
                $p->items()->attach(2, ['cantidad_por_paquete' => 20]);  // 20 mesas
                $p->items()->attach(3, ['cantidad_por_paquete' => 20]);  // 20 manteles
                $p->items()->attach(4, ['cantidad_por_paquete' => 4]);   // 4 toldos
                $p->items()->attach(5, ['cantidad_por_paquete' => 100]); // 100 platos
                $p->items()->attach(6, ['cantidad_por_paquete' => 100]); // 100 vasos
            }

            // 5. CREAR PRECIOS PARA CADA PAQUETE
            if ($p->nombre == 'Paquete Básico') {
                PrecioPaquete::create([
                    'paquete_id' => $p->id,
                    'tipo' => 'alquiler_bidiario',
                    'monto' => 150.00,
                ]);
            } elseif ($p->nombre == 'Paquete Familiar') {
                PrecioPaquete::create([
                    'paquete_id' => $p->id,
                    'tipo' => 'alquiler_bidiario',
                    'monto' => 350.00,
                ]);
            } else {
                PrecioPaquete::create([
                    'paquete_id' => $p->id,
                    'tipo' => 'alquiler_bidiario',
                    'monto' => 750.00,
                ]);
            }
        }
    }
}

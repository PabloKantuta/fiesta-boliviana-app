<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contrato de Alquiler #{{ $alquiler->id }} - Sr Fiesta</title>
    <style>
        @media print {
            @page {
                margin: 2cm;
            }
            .no-print {
                display: none;
            }
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Arial', sans-serif;
            font-size: 12pt;
            line-height: 1.6;
            color: #333;
            max-width: 21cm;
            margin: 0 auto;
            padding: 1cm;
        }
        
        .header {
            text-align: center;
            margin-bottom: 2cm;
            border-bottom: 3px solid #2563eb;
            padding-bottom: 1cm;
        }
        
        .header h1 {
            font-size: 24pt;
            color: #2563eb;
            margin-bottom: 0.5cm;
        }
        
        .header p {
            font-size: 11pt;
            color: #666;
        }
        
        .contract-number {
            text-align: right;
            font-size: 14pt;
            font-weight: bold;
            margin-bottom: 1cm;
            color: #2563eb;
        }
        
        .section {
            margin-bottom: 1.5cm;
        }
        
        .section-title {
            font-size: 14pt;
            font-weight: bold;
            color: #2563eb;
            margin-bottom: 0.5cm;
            border-bottom: 2px solid #e5e7eb;
            padding-bottom: 0.2cm;
        }
        
        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0.5cm;
            margin-bottom: 0.5cm;
        }
        
        .info-item {
            margin-bottom: 0.3cm;
        }
        
        .info-label {
            font-weight: bold;
            color: #666;
            font-size: 10pt;
        }
        
        .info-value {
            color: #000;
            font-size: 11pt;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 0.5cm 0;
        }
        
        table th {
            background-color: #2563eb;
            color: white;
            padding: 0.3cm;
            text-align: left;
            font-size: 10pt;
        }
        
        table td {
            padding: 0.3cm;
            border-bottom: 1px solid #e5e7eb;
            font-size: 10pt;
        }
        
        table tr:last-child td {
            border-bottom: none;
        }
        
        .totals {
            margin-top: 0.5cm;
            text-align: right;
        }
        
        .totals-row {
            margin-bottom: 0.2cm;
            font-size: 11pt;
        }
        
        .totals-row.total {
            font-size: 14pt;
            font-weight: bold;
            color: #2563eb;
            margin-top: 0.3cm;
            padding-top: 0.3cm;
            border-top: 2px solid #2563eb;
        }
        
        .signatures {
            margin-top: 3cm;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2cm;
        }
        
        .signature-line {
            text-align: center;
            padding-top: 1cm;
            border-top: 2px solid #000;
        }
        
        .signature-label {
            font-weight: bold;
            margin-top: 0.3cm;
        }
        
        .terms {
            margin-top: 1.5cm;
            font-size: 9pt;
            color: #666;
            line-height: 1.4;
        }
        
        .terms h3 {
            font-size: 11pt;
            color: #2563eb;
            margin-bottom: 0.3cm;
        }
        
        .terms ul {
            margin-left: 0.8cm;
        }
        
        .terms li {
            margin-bottom: 0.2cm;
        }
        
        .print-button {
            position: fixed;
            top: 1cm;
            right: 1cm;
            padding: 0.5cm 1cm;
            background-color: #2563eb;
            color: white;
            border: none;
            border-radius: 0.3cm;
            font-size: 12pt;
            cursor: pointer;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        
        .print-button:hover {
            background-color: #1d4ed8;
        }
        
        .status-badge {
            display: inline-block;
            padding: 0.2cm 0.5cm;
            border-radius: 0.2cm;
            font-size: 10pt;
            font-weight: bold;
        }
        
        .status-pendiente { background-color: #fef3c7; color: #92400e; }
        .status-reservado { background-color: #dbeafe; color: #1e40af; }
        .status-entregado { background-color: #d1fae5; color: #065f46; }
        .status-devuelto { background-color: #e0e7ff; color: #3730a3; }
        .status-cancelado { background-color: #fee2e2; color: #991b1b; }
    </style>
</head>
<body>
    <button class="print-button no-print" onclick="window.print()">🖨️ Imprimir</button>

    <div class="header">
        <h1>Sr Fiesta</h1>
        <p>Alquiler de Mobiliario y Decoración para Eventos</p>
        <p>📞 +591 (2) 1234-5678 | 📧 info@fiestabolivia.com</p>
    </div>

    <div class="contract-number">
        CONTRATO DE ALQUILER #{{ str_pad($alquiler->id, 5, '0', STR_PAD_LEFT) }}
    </div>

    <!-- Información General -->
    <div class="section">
        <div class="section-title">INFORMACIÓN DEL CONTRATO</div>
        <div class="info-grid">
            <div class="info-item">
                <div class="info-label">Fecha de Contrato:</div>
                <div class="info-value">{{ \Carbon\Carbon::parse($alquiler->fecha_contrato)->format('d/m/Y') }}</div>
            </div>
            <div class="info-item">
                <div class="info-label">Estado:</div>
                <div class="info-value">
                    <span class="status-badge status-{{ $alquiler->estado }}">
                        {{ strtoupper($alquiler->estado) }}
                    </span>
                </div>
            </div>
            <div class="info-item">
                <div class="info-label">Fecha de Entrega:</div>
                <div class="info-value">{{ \Carbon\Carbon::parse($alquiler->fecha_entrega_prevista)->format('d/m/Y') }}</div>
            </div>
            <div class="info-item">
                <div class="info-label">Fecha de Devolución:</div>
                <div class="info-value">{{ \Carbon\Carbon::parse($alquiler->fecha_devolucion_prevista)->format('d/m/Y') }}</div>
            </div>
        </div>
    </div>

    <!-- Información del Cliente -->
    <div class="section">
        <div class="section-title">INFORMACIÓN DEL CLIENTE (ARRENDATARIO)</div>
        <div class="info-grid">
            <div class="info-item">
                <div class="info-label">Nombre Completo:</div>
                <div class="info-value">{{ $alquiler->cliente->nombre }}</div>
            </div>
            @if($alquiler->cliente->ci)
            <div class="info-item">
                <div class="info-label">C.I.:</div>
                <div class="info-value">{{ $alquiler->cliente->ci }}</div>
            </div>
            @endif
            <div class="info-item">
                <div class="info-label">Teléfono:</div>
                <div class="info-value">{{ $alquiler->cliente->telefono }}</div>
            </div>
            <div class="info-item">
                <div class="info-label">Email:</div>
                <div class="info-value">{{ $alquiler->cliente->email }}</div>
            </div>
        </div>
        <div class="info-item">
            <div class="info-label">Dirección del Evento:</div>
            <div class="info-value">{{ $alquiler->direccion_evento }}, {{ $alquiler->ciudad }}</div>
        </div>
    </div>

    <!-- Detalles del Alquiler -->
    <div class="section">
        <div class="section-title">DETALLE DE PAQUETES Y ARTÍCULOS</div>
        
        @foreach($alquiler->detalles as $detalle)
        <div style="margin-bottom: 1cm;">
            <h3 style="color: #2563eb; margin-bottom: 0.3cm; font-size: 12pt;">{{ $detalle->paquete->nombre }}</h3>
            
            <table>
                <thead>
                    <tr>
                        <th>Artículo</th>
                        <th style="text-align: center;">Cantidad</th>
                        <th style="text-align: right;">Precio Unitario</th>
                        <th style="text-align: right;">Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($detalle->paquete->items as $item)
                    <tr>
                        <td>{{ $item->nombre }}</td>
                        <td style="text-align: center;">{{ $item->pivot->cantidad_por_paquete }}</td>
                        <td style="text-align: right;">-</td>
                        <td style="text-align: right;">-</td>
                    </tr>
                    @endforeach
                    <tr style="background-color: #f9fafb; font-weight: bold;">
                        <td colspan="2">Precio por Período Bi-diario</td>
                        <td style="text-align: right;">Bs. {{ number_format($detalle->precio_bidiario_unit, 2) }}</td>
                        <td style="text-align: right;"></td>
                    </tr>
                    <tr style="background-color: #f9fafb; font-weight: bold;">
                        <td colspan="2">Cantidad de Períodos</td>
                        <td style="text-align: right;">{{ $detalle->num_bloques_contratados }}</td>
                        <td style="text-align: right;"></td>
                    </tr>
                    <tr style="font-weight: bold; background-color: #eff6ff;">
                        <td colspan="3">Subtotal Paquete</td>
                        <td style="text-align: right;">Bs. {{ number_format($detalle->subtotal_contrato, 2) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        @endforeach
    </div>

    <!-- Totales -->
    <div class="section">
        <div class="totals">
            <div class="totals-row">
                <strong>Subtotal Alquiler:</strong> Bs. {{ number_format($alquiler->subtotal, 2) }}
            </div>
            <div class="totals-row">
                <strong>Costo de Transporte:</strong> Bs. {{ number_format($alquiler->total - $alquiler->subtotal, 2) }}
            </div>
            <div class="totals-row total">
                <strong>TOTAL A PAGAR:</strong> Bs. {{ number_format($alquiler->total, 2) }}
            </div>
        </div>
    </div>

    @if($alquiler->observaciones)
    <!-- Observaciones -->
    <div class="section">
        <div class="section-title">OBSERVACIONES</div>
        <p style="font-size: 10pt; color: #666;">{{ $alquiler->observaciones }}</p>
    </div>
    @endif

    <!-- Términos y Condiciones -->
    <div class="terms">
        <h3>TÉRMINOS Y CONDICIONES</h3>
        <ul>
            <li>El cliente se compromete a devolver todos los artículos en las mismas condiciones en que fueron entregados.</li>
            <li>En caso de daño o pérdida de algún artículo, el cliente deberá cubrir el costo de reposición o reparación.</li>
            <li>La entrega y retiro de los artículos se realizará en las fechas establecidas en este contrato.</li>
            <li>El pago debe realizarse según lo acordado antes de la entrega de los artículos.</li>
            <li>Cualquier modificación a este contrato debe ser notificada con al menos 48 horas de anticipación.</li>
            <li>Los artículos alquilados son de uso exclusivo para el evento indicado en este contrato.</li>
        </ul>
    </div>

    <!-- Firmas -->
    <div class="signatures">
        <div class="signature-line">
            <div class="signature-label">Sr Fiesta</div>
            <div style="font-size: 9pt; color: #666;">Representante Legal</div>
        </div>
        <div class="signature-line">
            <div class="signature-label">{{ strtoupper($alquiler->cliente->nombre) }}</div>
            <div style="font-size: 9pt; color: #666;">Cliente / Arrendatario</div>
        </div>
    </div>

    <div style="margin-top: 2cm; text-align: center; font-size: 9pt; color: #999;">
        <p>Este documento fue generado electrónicamente el {{ now()->format('d/m/Y H:i') }}</p>
        <p>Para cualquier consulta, contáctenos al +591 (2) 1234-5678 o info@fiestabolivia.com</p>
    </div>
</body>
</html>

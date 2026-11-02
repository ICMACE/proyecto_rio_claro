# Análisis de la Operación Actual de Río Claro

## Objetivo

Comprender cómo opera actualmente la empresa Río Claro, identificar los puntos de desorden en la información y determinar oportunidades donde la Inteligencia Artificial puede apoyar sin sustituir al personal existente.

---

# Restricciones del Proyecto

La solución debe diseñarse considerando las siguientes restricciones de negocio:

## Presupuesto Limitado

La dirección únicamente autoriza un piloto inicial.

Por lo tanto:

- Cada servicio de IA debe justificarse.
- Se priorizarán soluciones de bajo costo.
- Se buscarán beneficios visibles en poco tiempo.

## Sin Personal Técnico

Los usuarios principales serán:

- Bodega
- Ventas
- Administración

La solución debe poder utilizarse desde:

- Computadora
- Celular
- Consultas por voz

## La Operación No Puede Detenerse

La empresa debe seguir vendiendo mientras se organiza la información.

Por lo tanto:

- No se reemplazarán sistemas actuales de forma inmediata.
- Se trabajará de manera gradual.
- Los datos se limpiarán progresivamente.

## Confianza en la IA

Existe preocupación respecto a que la IA:

- Reemplace personas.
- Cometa errores.
- Invente información.

Por ello se aplicará el siguiente principio:

```text
LA IA APOYA
LA PERSONA DECIDE
```

---

# Un Día Normal en Río Claro

Actualmente la operación depende principalmente de archivos Excel, correos electrónicos, llamadas telefónicas y mensajes de WhatsApp.

La información existe, pero está distribuida en múltiples lugares y formatos.

---

# Paso 1. Recepción de Facturas

Los proveedores envían facturas mediante:

- Correo electrónico
- PDF
- Fotografías por WhatsApp

## Situación Actual

Las facturas llegan a diferentes personas.

No existe una ubicación única para almacenarlas.

## Problemas Detectados

- Facturas duplicadas.
- Facturas perdidas.
- Nombres de archivo inconsistentes.
- Dificultad para localizarlas posteriormente.

### Ejemplos

```text
factura_final.pdf
factura_nueva.pdf
factura_ultima_ok.pdf
IMG_20261015.jpg
```

---

# Paso 2. Captura Manual de Facturas

Laura descarga las facturas y registra manualmente:

- Proveedor
- Fecha
- Folio
- Total
- RFC

en una hoja de Excel.

## Situación Actual

El proceso consume muchas horas cada semana.

## Problemas Detectados

- Errores de captura.
- Información incompleta.
- Retrasos administrativos.

---

# Paso 3. Administración del Inventario

Cada sucursal mantiene su propio archivo.

## Situación Actual

No existe un catálogo único de productos.

### Ejemplo

```text
CLORO 1L
CLORO LITRO
BLANQUEADOR 1000ML
```

Todos representan el mismo producto.

## Problemas Detectados

- Existencias inconsistentes.
- Productos duplicados.
- Reportes incorrectos.

---

# Paso 4. Atención a Clientes

Los clientes realizan consultas sobre:

- Existencia de productos.
- Pedidos.
- Horarios.
- Devoluciones.

## Situación Actual

Cada vendedor responde con la información disponible en su sucursal.

## Problemas Detectados

- Información distinta entre sucursales.
- Respuestas tardías.
- Falta de historial de consultas.

---

# Paso 5. Gestión de Quejas

Las reclamaciones se reciben mediante:

- WhatsApp
- Correo electrónico
- Llamadas telefónicas

## Situación Actual

No existe un sistema centralizado.

## Problemas Detectados

- Casos repetidos.
- Falta de seguimiento.
- Imposibilidad de medir indicadores.

---

# Paso 6. Elaboración de Reportes

Al finalizar cada mes, la dirección solicita:

- Ventas por sucursal.
- Ventas por producto.
- Existencias de inventario.

## Situación Actual

Cada sucursal genera sus propios reportes.

## Problemas Detectados

- Información contradictoria.
- Mucho tiempo de consolidación.
- Dificultad para tomar decisiones.

---

# Diagrama del Proceso Actual (AS-IS)

```text
                    RÍO CLARO HOY

          ┌────────────────────────────┐
          │      PROVEEDORES           │
          └─────────────┬──────────────┘
                        │
               PDF / Fotos / WhatsApp
                        │
                        ▼
             ┌───────────────────┐
             │     CORREOS       │
             │    PERSONALES     │
             └─────────┬─────────┘
                       │
                       ▼
               ┌───────────────┐
               │    LAURA      │
               │ Captura Excel │
               └───────┬───────┘
                       │
         ┌─────────────┼─────────────┐
         │             │             │
         ▼             ▼             ▼

   Inventario     Facturas       Reportes
    Excel          Excel         Mensuales

         ▲             ▲             ▲
         │             │             │

    Sucursal A    Sucursal B    Sucursal C

         ▲
         │
         ▼

      Clientes
(WhatsApp y llamadas)
```

---

# Principales Problemas Identificados

## 1. No Existe una Fuente Única de Verdad

Cada área mantiene sus propios archivos.

### Impacto

- Datos contradictorios.
- Decisiones incorrectas.

---

## 2. Procesos Altamente Manuales

Gran parte del tiempo se utiliza capturando información.

### Impacto

- Errores humanos.
- Baja productividad.

---

## 3. Información No Estructurada

Los datos se encuentran en:

- PDF
- Fotografías
- Correos
- WhatsApp

### Impacto

La información no puede consultarse fácilmente.

---

## 4. Ausencia de Historial

La información relevante no queda registrada.

### Impacto

- Difícil seguimiento.
- Pérdida de conocimiento organizacional.

---

# Plan Inicial para Poner Orden al Inventario

## Objetivo General

Crear una base confiable de productos e inventarios sin detener la operación diaria.

---

# Fase 1. Catálogo Maestro de Productos

## Objetivo

Eliminar productos repetidos.

### Actividades

1. Reunir todos los archivos Excel.
2. Consolidar los productos existentes.
3. Identificar nombres duplicados.
4. Crear un catálogo único.

### Ejemplo

```text
P001 - CLORO 1L
P002 - DETERGENTE INDUSTRIAL
P003 - JABÓN LÍQUIDO 500ML
```

### Herramienta de IA

Microsoft Copilot para Excel.

### Justificación

Ayuda a detectar nombres similares y productos duplicados sin necesidad de programación.

---

# Fase 2. Estandarización de Inventarios

## Objetivo

Utilizar la misma estructura en todas las sucursales.

### Formato Recomendado

```text
Código
Producto
Sucursal
Existencia
Última Actualización
```

### (Hojas Inventario y Catálogos) 
https://redporlaciberseguridad-my.sharepoint.com/:x:/g/personal/icmcastroe-ia_labmx_ai/IQA2dCXEYGFYT6iZ7cJMG5U6AZ3cgzeY9BTvlx4V_YezrY8?e=jzecKl 


## Ejemplo de Inventario Estandarizado

| Código | Producto | Unidad | Categoría | Sucursal | Existencia | Última Actualización |
|----------|----------|----------|----------|----------|----------:|----------|
| P001 | CLORO 1L | Pieza | Desinfección | León | 1250 | 2026-10-01 |
| P002 | CLORO 5L | Pieza | Desinfección | León | 320 | 2026-10-01 |
| P003 | DETERGENTE INDUSTRIAL 20L | Bidón | Limpieza | León | 85 | 2026-10-01 |
| P004 | JABÓN LÍQUIDO 500ML | Pieza | Higiene | León | 640 | 2026-10-01 |
| P005 | JABÓN LÍQUIDO 5L | Bidón | Higiene | León | 120 | 2026-10-01 |
| P006 | DESENGRASANTE INDUSTRIAL 5L | Bidón | Limpieza | León | 95 | 2026-10-01 |
| P007 | LIMPIADOR MULTIUSOS 1L | Pieza | Limpieza | León | 410 | 2026-10-01 |
| P008 | SANITIZANTE 1L | Pieza | Desinfección | León | 270 | 2026-10-01 |
| P009 | SANITIZANTE 20L | Bidón | Desinfección | León | 38 | 2026-10-01 |
| P010 | PAPEL HIGIÉNICO JUMBO | Rollo | Consumibles | León | 550 | 2026-10-01 |
| P011 | TOALLA INTERDOBLADA | Paquete | Consumibles | León | 430 | 2026-10-01 |
| P012 | SERVILLETA INDUSTRIAL | Paquete | Consumibles | León | 390 | 2026-10-01 |
| P013 | BOLSA NEGRA 90X120 | Paquete | Consumibles | León | 210 | 2026-10-01 |
| P014 | BOLSA TRANSPARENTE 60X90 | Paquete | Consumibles | León | 185 | 2026-10-01 |
| P015 | ESCOBA INDUSTRIAL | Pieza | Herramienta | León | 42 | 2026-10-01 |
| P016 | TRAPEADOR ALGODÓN INDUSTRIAL | Pieza | Herramienta | León | 57 | 2026-10-01 |
| P017 | CUBETA 20L | Pieza | Herramienta | León | 31 | 2026-10-01 |
| P018 | GUANTE DE NITRILO MEDIANO | Caja | Seguridad | León | 115 | 2026-10-01 |
| P019 | GUANTE DE NITRILO GRANDE | Caja | Seguridad | León | 127 | 2026-10-01 |
| P020 | CUBREBOCAS DESECHABLE | Caja | Seguridad | León | 205 | 2026-10-01 |
| P021 | DESINFECTANTE AMBIENTAL 1L | Pieza | Desinfección | León | 140 | 2026-10-01 |
| P022 | AROMATIZANTE AMBIENTAL 400ML | Pieza | Limpieza | León | 160 | 2026-10-01 |
| P023 | SHAMPOO PARA ALFOMBRAS 5L | Bidón | Limpieza | León | 42 | 2026-10-01 |
| P024 | LIMPIAVIDRIOS 1L | Pieza | Limpieza | León | 225 | 2026-10-01 |
| P025 | DESINCRUSTANTE PARA BAÑOS 5L | Bidón | Limpieza | León | 68 | 2026-10-01 |


## Ejemplo de normalización usando IA

Antes:

| Nombre encontrado |
|----------|
| CLORO LITRO |
| Cloro 1 Lt |
| Blanqueador 1000ml |
| CLORO 1L |
| Cloro doméstico litro |

Después:

| Código	|Nombre Estándar |
|----------|----------|
| P001	| CLORO 1L |

### Beneficio

Toda la empresa utiliza el mismo lenguaje para los productos.

---

# Fase 3. Digitalización de Facturas

## Objetivo

Reducir la captura manual.

### Herramienta de IA

Azure AI Document Intelligence.

### Flujo

```text
Factura PDF
      │
      ▼
Document Intelligence
      │
      ▼
Extracción de datos
      │
      ▼
Laura revisa
      │
      ▼
Guardar información
```

### Beneficio

Menos errores y ahorro de tiempo.

---

# Fase 4. Base de Conocimiento Empresarial

## Objetivo

Centralizar información importante.

### Información a Consolidar

- Catálogo de productos.
- Inventarios.
- Políticas.
- Procedimientos.
- Preguntas frecuentes.

### Herramienta de IA

Azure AI Search.

### Beneficio

Localizar información en segundos.

---

# Fase 5. Asistente de IA para Ventas y Bodega

## Objetivo

Permitir consultas simples mediante chat o voz.

### Herramientas

- Microsoft Copilot Studio.
- Azure AI Foundry.

### Consultas Esperadas

```text
¿Cuánto cloro hay disponible?

¿Qué proveedor vende detergente industrial?

¿Cuál es la política de devoluciones?

¿Dónde está el pedido 4501?
```

### Principio de Operación

```text
La IA responde.
La persona valida.
La empresa decide.
```

---

# Resultado Esperado del Piloto

## Situación Actual

```text
Excel separados
Facturas manuales
Información dispersa
Procesos lentos
```

## Situación Objetivo

```text
Catálogo único
Inventario organizado
Facturas digitalizadas
Información centralizada
Consultas por chat y voz
IA supervisada por personas
```

---

# Conclusión

Antes de implementar soluciones avanzadas de Inteligencia Artificial, Río Claro debe concentrarse en ordenar y centralizar su información crítica. El piloto propuesto busca obtener resultados rápidos y de bajo costo utilizando IA como herramienta de apoyo para inventarios, facturación y consulta de información, manteniendo siempre la supervisión humana sobre las decisiones de negocio.
# Proyecto AI-901 – Río Claro

# 03_Arquitectura_ToBe.md

## Objetivo

Definir la arquitectura objetivo (TO-BE) para el piloto de Inteligencia Artificial de Río Claro, mostrando cómo interactuarán los distintos componentes del negocio una vez implementada la solución.

---

# Visión General

Actualmente la información de Río Claro se encuentra distribuida entre archivos Excel, documentos PDF, correos y conocimiento del personal.

El objetivo del proyecto es centralizar la información y permitir consultas inteligentes mediante herramientas de Inteligencia Artificial, sin afectar la operación diaria de la empresa.

---

# Situación Actual (AS-IS)

Actualmente el flujo de información funciona de la siguiente manera:

```text
Proveedores
      │
      ▼
 Facturas PDF
 Facturas Imagen
      │
      ▼
Captura Manual
      │
      ▼
Archivos Excel

      ├── Inventarios
      ├── Proveedores
      ├── Reportes
      └── Consultas
```

### Problemas Identificados

- Captura manual de información.
- Inventarios dispersos.
- Múltiples archivos de control.
- Dependencia del conocimiento de los empleados.
- Tiempo elevado para localizar información.
- Riesgo de errores de captura.
- Dificultad para generar reportes.

---

# Arquitectura Objetivo (TO-BE)

La arquitectura propuesta busca mantener SharePoint como repositorio central y utilizar servicios de Inteligencia Artificial únicamente donde generen valor.

```text
                           PROVEEDORES
                                 │
                                 │
                         Facturas PDF
                         Facturas JPG
                                 │
                                 ▼
            Azure AI Document Intelligence
                                 │
                                 ▼
                    Datos Estructurados
                                 │
                                 ▼

┌───────────────────────────────────────────────┐
│                 SHAREPOINT                    │
│                                                │
│ Facturas                                       │
│ Inventarios                                    │
│ Proveedores                                    │
│ FAQ                                            │
│ Políticas                                      │
└───────────────────────────────────────────────┘
                                 │
                                 ▼
                      Azure AI Search
                                 │
                                 ▼
                     Azure AI Foundry
                                 │
                                 ▼
                        Agente Río Claro
                                 │
            ┌────────────────────┼───────────────────┐
            │                    │                   │
            ▼                    ▼                   ▼

        Bodega              Ventas           Administración
            │                    │                   │
            └────────────────────┴───────────────────┘
                                 │
                                 ▼
                      Consultas Inteligentes
```

---

# Componentes de la Solución

## 1. SharePoint

### Función

Actuar como repositorio central de información.

### Bibliotecas Existentes

```text
Facturas
FAQ
Inventarios
Políticas
Proveedores
```

### Beneficios

- Centralización documental.
- Fácil administración.
- Acceso controlado.
- Compatible con servicios Azure.

---

# 2. Inventario Maestro

## Función

Convertirse en la fuente oficial de inventario del proyecto.

### Información Disponible

```text
Código
Producto
Categoría
Unidad
Proveedor Principal
Sucursal
Existencia
Stock Mínimo
Stock Máximo
Última Actualización
```

### Beneficios

- Eliminación de productos duplicados.
- Estandarización de criterios.
- Consultas consistentes.

---

# 3. Catálogo de Proveedores

## Función

Mantener la información de abastecimiento de forma centralizada.

### Información Disponible

```text
ProveedorID
Nombre
RFC
Contacto
Teléfono
Correo
Productos
```

### Beneficios

- Trazabilidad de productos.
- Consultas rápidas.
- Relación producto-proveedor.

---

# 4. Azure AI Document Intelligence

## Función

Automatizar la captura de información desde facturas.

### Entradas

```text
PDF
JPG
PNG
Facturas escaneadas
```

### Salidas

```text
Proveedor
RFC
Fecha
Subtotal
IVA
Total
```

### Beneficios

- Reducción de captura manual.
- Menos errores administrativos.
- Mayor velocidad de registro.

---

# 5. Azure AI Search

## Función

Crear un índice de búsqueda sobre la información empresarial.

### Información a Indexar

```text
Inventarios
Proveedores
FAQ
Políticas
Facturas
```

### Beneficios

- Búsqueda centralizada.
- Recuperación rápida de información.
- Base para RAG.

---

# 6. Azure AI Foundry

## Función

Administrar los componentes de Inteligencia Artificial del proyecto.

### Responsabilidades

```text
Agentes
Modelos GPT
Conexiones
Prompts
Evaluaciones
```

### Beneficios

- Administración centralizada.
- Fácil integración con Azure AI Search.
- Escalabilidad futura.

---

# 7. Agente Inteligente Río Claro

## Función

Proporcionar una interfaz sencilla para consultar información empresarial.

---

## Ejemplos de Consultas

### Inventarios

```text
¿Cuánto inventario existe de Cloro Industrial 20L?
```

### Proveedores

```text
¿Quién suministra Desengrasante Industrial?
```

### Políticas

```text
¿Cuál es la política de devoluciones?
```

### Facturas

```text
¿Cuál fue la última factura recibida del proveedor PR001?
```

---

# Principio de IA Responsable

La Inteligencia Artificial actuará únicamente como herramienta de apoyo.

```text
IA GENERA INFORMACIÓN
          │
          ▼
USUARIO REVISA
          │
          ▼
SE TOMA DECISIÓN
```

---

# Beneficios Esperados

## Operativos

- Menor captura manual.
- Menos errores.
- Acceso rápido a información.

## Administrativos

- Mejor trazabilidad.
- Información centralizada.
- Reportes más consistentes.

## Tecnológicos

- Uso gradual de IA.
- Bajo impacto en la operación.
- Escalabilidad futura.

---

# Alcance del MVP

Durante el piloto únicamente se implementarán:

✅ SharePoint como repositorio documental

✅ Inventario Maestro

✅ Catálogo de Proveedores

✅ Azure AI Search

✅ Azure AI Foundry

✅ Azure AI Document Intelligence

✅ Agente Inteligente para consultas

---

# Fuera del Alcance del MVP

❌ ERP completo

❌ Automatización financiera

❌ Aplicación móvil personalizada

❌ Integraciones complejas con sistemas externos

❌ Analítica avanzada

---

# Resultado Esperado

Al finalizar el piloto, Río Claro contará con una plataforma capaz de:

```text
Buscar información empresarial.

Consultar inventarios.

Consultar proveedores.

Procesar facturas automáticamente.

Responder preguntas en lenguaje natural.

Mantener la supervisión humana sobre
todas las decisiones de negocio.
```

---

# Conclusión

La arquitectura propuesta permite resolver los principales problemas identificados durante el análisis inicial mediante una implementación gradual, de bajo costo y alineada a las restricciones del proyecto. La estrategia se enfoca primero en organizar la información y posteriormente en habilitar capacidades de Inteligencia Artificial para mejorar la eficiencia operativa de Río Claro sin reemplazar a los usuarios responsables del proceso.
# Proyecto Río Claro
# Guía de Configuración e Implementación del MVP en Azure

## Objetivo

Implementar una aplicación web empresarial para Río Claro utilizando Laravel y servicios de Inteligencia Artificial de Azure para:

- Gestión de productos.
- Gestión de proveedores.
- Registro de movimientos de inventario.
- Procesamiento inteligente de facturas.
- Consultas mediante IA.
- Consultas por voz.
- Auditoría de actividades.

---

# Arquitectura General

```text
Usuarios
    │
    ▼

Aplicación Laravel
(Azure App Service)

    │
    ├──────────────┐
    │              │
    ▼              ▼

Azure MySQL    Azure OpenAI

    │              │

    ▼              ▼

Productos      Clasificación
Facturas       de consultas
Proveedores
Movimientos

    │
    ▼

Azure Document Intelligence

    │
    ▼

Extracción de datos
de facturas

```

---

# Infraestructura Azure Utilizada

## Azure App Service

Servicio utilizado para hospedar la aplicación Laravel.

```text
Nombre:
rioclaro-web
```

Función:

```text
Hospedar la aplicación web pública.
```

---

## Azure Database for MySQL

Servicio utilizado como base de datos principal.

```text
Servidor:
rioclaro-web-server
```

Función:

```text
Productos
Proveedores
Facturas
Movimientos
Usuarios
Auditoría
```

---

## Azure OpenAI

Modelo utilizado:

```text
gpt-5-nano
```

Función:

```text
Clasificación de intenciones.
```

Ejemplos:

```text
¿Qué productos necesitan reposición?

→ inventario
```

```text
¿Cuántas facturas existen?

→ facturas
```

---

## Azure AI Document Intelligence

Recurso:

```text
rioclaro-docintel
```

Modelo:

```text
Prebuilt Invoice
```

Función:

```text
Extraer automáticamente:

Proveedor
Folio
Fecha
Subtotal
IVA
Total
```

---

# Desarrollo de la Aplicación

## Framework

```text
Laravel 12
```

---

## Frontend

```text
Bootstrap 4.6

Material Icons
```

---

## Módulos Implementados

### Dashboard

Indicadores principales:

- Productos registrados.
- Facturas registradas.
- Productos con stock bajo.
- Compras del mes.
- Movimientos recientes.

---

### Proveedores

Funciones:

- Alta.
- Consulta.
- Relación con productos.

---

### Productos

Funciones:

- Alta.
- Consulta.
- Historial.
- Existencias.

---

### Movimientos de Inventario

Tipos:

```text
ENTRADA

SALIDA

AJUSTE
```

Impacto:

```text
Actualización automática de stock.
```

---

### Facturas

Flujo:

```text
Usuario
    │
    ▼

Sube PDF

    │
    ▼

Document Intelligence

    │
    ▼

Extracción de datos

    │
    ▼

Validación Humana

    │
    ▼

Guardar Factura
```

---

### Auditoría

Eventos registrados:

```text
LOGIN
LOGOUT

PROVEEDOR_CREADO

PRODUCTO_CREADO

MOVIMIENTO_REGISTRADO

FACTURA_CARGADA

FACTURA_ANALIZADA

FACTURA_GUARDADA

CONSULTA_IA
```

---

### Asistente IA

Función:

```text
Responder consultas sobre
inventario, facturas,
proveedores y movimientos.
```

---

### Asistente Voz

Función:

```text
Consulta por voz desde navegador.
```

Flujo:

```text
Usuario habla

↓

Speech Recognition

↓

GPT-5 Nano

↓

Herramienta

↓

Respuesta

↓

Speech Synthesis
```

---

# Base de Datos

## Tabla Productos

```text
codigo
nombre
categoria
unidad
stock_actual
stock_minimo
stock_maximo
proveedor_id
```

---

## Tabla Proveedores

```text
codigo
nombre
rfc
telefono
correo
contacto
```

---

## Tabla Facturas

```text
folio
proveedor_id
fecha_factura
subtotal
iva
total
archivo
estado
```

---

## Tabla Movimientos

```text
producto_id
tipo
cantidad
usuario_id
observaciones
```

---

## Tabla Auditoría

```text
user_id

modulo

accion

entidad

entidad_id

detalle

ip
```

---

# Configuración Azure MySQL

Variables configuradas:

```env
DB_CONNECTION=mysql

DB_HOST=rioclaro-web-server.mysql.database.azure.com

DB_PORT=3306

DB_DATABASE=rioclaro

DB_USERNAME=xxxxxx

DB_PASSWORD=xxxxxx
```

---

## SSL

Variable requerida:

```env
MYSQL_ATTR_SSL_CA=/etc/ssl/certs/ca-certificates.crt
```

Configuración en:

```php
config/database.php
```

```php
'options' => extension_loaded('pdo_mysql')
    ? array_filter([
        \PDO::MYSQL_ATTR_SSL_CA =>
            env('MYSQL_ATTR_SSL_CA'),
    ])
    : [],
```

---

# Configuración Azure OpenAI

Variables:

```env
AZURE_OPENAI_ENDPOINT=
https://rioclaro-mvp-resource.services.ai.azure.com/openai/v1

AZURE_OPENAI_KEY=
XXXX

AZURE_OPENAI_MODEL=
gpt-5-nano
```

---

# Configuración Document Intelligence

Variables:

```env
AZURE_DOC_INTELLIGENCE_ENDPOINT=
https://rioclaro-docintel.cognitiveservices.azure.com/

AZURE_DOC_INTELLIGENCE_KEY=
XXXX
```

---

# Herramientas de IA

## InventoryTool

Consulta:

```text
Productos con stock bajo.
```

---

## InvoiceTool

Consulta:

```text
Facturas registradas.
Compras del mes.
```

---

## SupplierTool

Consulta:

```text
Proveedores registrados.
```

---

## MovementTool

Consulta:

```text
Último movimiento.
```

---

## PolicyTool

Pendiente de integración con:

```text
Azure AI Search

FAQ_RioClaro.md

PoliticaInventarios.md

PoliticaCompras.md

PoliticaFacturacion.md
```

---

# Problemas Encontrados Durante la Implementación

## Azure MySQL Privado

Problema:

```text
Connection timed out.
```

Causa:

```text
Complejidad de conectividad mediante VNet privada.
```

Solución adoptada:

```text
Crear un servidor MySQL público para el MVP.
```

---

## SSL MySQL

Problema:

```text
Connections using insecure transport are prohibited.
```

Solución:

```text
MYSQL_ATTR_SSL_CA
```

configurado en Laravel.

---

## Azure App Service Linux

Problema:

```text
Rutas Laravel amigables
(/login, /dashboard)
```

no funcionan correctamente.

Actualmente:

```text
La aplicación requiere acceso mediante:

/index.php
```

hasta concluir la optimización del Document Root.

---

# Notas a Considerar

## No modificar directamente

```text
routes/web.php
```

para intentar resolver problemas de App Service.

Las rutas Laravel funcionan correctamente.

---

## No almacenar credenciales

Nunca almacenar:

```text
API Keys

Passwords

Tokens
```

dentro del repositorio Git.

Utilizar siempre:

```text
Variables de entorno Azure.
```

---

## Facturas

Actualmente se almacenan en:

```text
storage/app/public
```

Mejora futura:

```text
Azure Blob Storage.
```

---

## IA

Actualmente GPT se utiliza para:

```text
Clasificación de intención.
```

Mejora futura:

```text
Generación de respuestas naturales.
```

---

## Azure AI Search

Pendiente integrar:

```text
FAQ

Políticas

Procedimientos
```

con:

```text
Agente Río Claro
```

para responder preguntas documentales.

---

# Estado Actual del Proyecto

✅ Azure App Service

✅ Azure MySQL

✅ Azure OpenAI

✅ Azure Document Intelligence

✅ Dashboard

✅ Productos

✅ Proveedores

✅ Movimientos

✅ Facturas

✅ Auditoría

✅ Asistente IA

✅ Asistente Voz

✅ Despliegue Productivo en Azure

---

# Próximos Pasos Recomendados

## Infraestructura

```text
Corregir Document Root de App Service.
```

---

## Almacenamiento

```text
Azure Blob Storage.
```

---

## IA

```text
Azure AI Search + PolicyTool.
```

---

## Experiencia de Usuario

```text
Respuestas naturales generadas por GPT.
```

---

# Conclusión

El MVP de Río Claro demuestra la integración exitosa de una aplicación Laravel con servicios de Inteligencia Artificial de Microsoft Azure para automatizar la captura de facturas, gestionar inventarios, mantener trazabilidad mediante auditoría y ofrecer consultas inteligentes por texto y voz, manteniendo siempre la supervisión humana sobre los procesos de negocio.
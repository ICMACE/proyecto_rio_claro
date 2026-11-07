# 🌊 Proyecto Río Claro - Plataforma MVP de Gestión e Inteligencia Artificial

Este repositorio contiene la documentación y código fuente del **Piloto de Modernización Operativa para Río Claro (Proyecto AI-901)**. El objetivo principal es centralizar la información dispersa de la empresa (inventarios, proveedores, facturas y políticas) e integrar capacidades de **Inteligencia Artificial en Microsoft Azure** para optimizar la toma de decisiones sin sustituir la supervisión humana.

---

## 📌 Principio Operativo

```text
LA IA APOYA ──► LA PERSONA DECIDE ──► LA EMPRESA ACTÚA
```

---

## 🛠️ Stack de Desarrollo

### **Backend & Frontend Web**
* **Framework:** Laravel 12 (PHP)
* **Frontend UI:** Bootstrap 4.6 & Material Icons
* **Interfaz de Voz:** Web Speech API (`SpeechRecognition` & `SpeechSynthesis`)
* **Base de Datos:** Azure Database for MySQL (Flexible Server)

### **Servicios de Inteligencia Artificial & Cloud (Microsoft Azure)**
* **Hospedaje Web:** Azure App Service (Linux Environment)
* **Procesamiento Documental (OCR/IA):** Azure AI Document Intelligence (Modelo *Prebuilt Invoice*)
* **Motor de IA Generativa & LLM:** Azure OpenAI Service (Modelo `gpt-5-nano`)
* **Indexación y Búsqueda Conversacional:** Azure AI Search
* **Gestión de Agentes y Modelos:** Azure AI Foundry

### **Repositorio y Documentación Empresarial**
* **Repositorio Primario:** Microsoft SharePoint
* **Formatos de Documentación:** Markdown (`.md`), Excel (`.xlsx`), PDF/Imágenes.

---

## 🤖 ¿En qué secciones se utilizó Inteligencia Artificial?

La Inteligencia Artificial se integró estratégicamente en puntos donde aportaba el mayor valor operativo, reduciendo la carga manual de trabajo:

### 1. 🧾 Digitalización y Extracción de Datos de Facturas
* **Servicio:** Azure AI Document Intelligence (*Prebuilt Invoice*)
* **Uso:** Eliminación del registro manual de facturas enviadas en PDF o imágenes. Extrae automáticamente campos clave (*Proveedor, Folio, Fecha, Subtotal, IVA, Total*) para su revisión previa al guardado en base de datos.

### 2. 💬 Asistente Conversacional Empresarial (Chat IA)
* **Servicios:** Azure OpenAI (`gpt-5-nano`) + Azure AI Foundry + Azure AI Search
* **Uso:** Clasificación de intenciones y ejecución de consultas en lenguaje natural (*RAG - Retrieval-Augmented Generation*). Permite al personal de ventas, bodega y administración consultar stock bajo, compras del mes, detalles de proveedores y políticas operativas.

### 3. 🎙️ Consultas por Voz en Tiempo Real
* **Servicios:** Web Speech API + Azure OpenAI (`gpt-5-nano`)
* **Uso:** Interfaz manos libres que permite dictar preguntas desde dispositivos móviles o computadoras, procesar la intención con el LLM, consultar la base de datos y sintetizar la respuesta en voz.

### 4. 📊 Normalización y Estandarización de Catálogos (Fase Preparatoria)
* **Servicio:** Microsoft Copilot para Excel
* **Uso:** Agrupación y limpieza de productos duplicados o mal nombrados entre sucursales para consolidar el **Inventario Maestro** y el **Catálogo Centralizado de Proveedores**.

---

## 📊 Arquitectura del Sistema (TO-BE)

```text
               ┌──────────────────────────────────────────────┐
               │         PROVEEDORES (Facturas PDF/JPG)      │
               └──────────────────────┬───────────────────────┘
                                      │
                                      ▼
                      Azure AI Document Intelligence
                                      │
                                      ▼
┌───────────────────────────────────────────────────────────────────────────┐
│                           APLICACIÓN WEB LARAVEL                          │
│                            (Azure App Service)                            │
│                                                                           │
│  ┌─────────────────────────┐               ┌──────────────────────────┐  │
│  │   Azure Database MySQL  │               │   Azure OpenAI Service   │  │
│  │ (Inventario/Proveedores)│               │  (Clasificación e Intent)│  │
│  └────────────┬────────────┘               └────────────┬─────────────┘  │
└───────────────┼─────────────────────────────────────────┼─────────────────┘
                │                                         │
                ▼                                         ▼
   ┌─────────────────────────────────────────────────────────────────────┐
   │                        AZURE AI FOUNDRY / SEARCH                    │
   │               (Base de Conocimiento: FAQ, Políticas, Inventario)    │
   └──────────────────────────────────┬──────────────────────────────────┘
                                      │
                                      ▼
                    ┌──────────────────────────────────┐
                    │      AGENTE INTELIGENTE RÍO CLARO│
                    │      (Interfaz Texto y Voz)      │
                    └─────────────────┬────────────────┘
                                      │
            ┌─────────────────────────┼─────────────────────────┐
            ▼                         ▼                         ▼
         Bodega                    Ventas                 Administración
```

---

## 📂 Estructura del Repositorio Documental

```text
RioClaro-AI901/
├── 01 Analisis.md                      # Análisis operativo AS-IS, problemas y plan de IA
├── 02 MVP.md                           # Preparación de datos, Inventario Maestro y Proveedores
├── 03 Arquitectura.md                  # Definición de la arquitectura objetivo TO-BE
├── 04 Implementacion_Infraestructura.md# Configuración de RG y Azure AI Foundry
├── 05 BaseConocimiento.md              # Definición de FAQ y políticas operativas
├── 06 ImplementacionBaseConocimiento.md# Indexación en Azure AI Search para RAG
└── 07 Puesta en marcha.md              # Guía de implementación y despliegue del MVP en Laravel
```

---

## 📈 Módulos Implementados en el MVP

1. **Dashboard Operativo:** Indicadores clave de inventario, facturas registradas y compras del mes.
2. **Gestión de Productos e Inventarios:** Registro de existencias con actualización en tiempo real por movimientos de entrada, salida y ajustes.
3. **Catálogo de Proveedores:** Trazabilidad completa de productos y sus suministradores principales.
4. **Módulo de Facturación Inteligente:** Carga de PDFs/JPGs con procesamiento OCR automático y validación humana.
5. **Asistente Virtual (Texto y Voz):** Consultas conversacionales de stock, facturas y procedimientos.
6. **Sistema de Auditoría:** Registro pormenorizado de eventos (`LOGIN`, `FACTURA_CARGADA`, `CONSULTA_IA`, etc.).

---

## 🔒 Auditoría y Seguridad
* **SSL Encriptado:** Conexión segura a Azure Database for MySQL.
* **Manejo de Secretos:** Configuración mediante Variables de Entorno en Azure App Service (nunca expuestas en Git).
* **Supervisión Humana:** Ningún proceso de IA autoriza o guarda compras de forma autónoma sin la confirmación de un operador.
# PROYECTO TO-DO LIST

**Objetivo General:** Desarrollar una aplicación web integral para la gestión de tareas,
permitiendo registrar, listar, editar y eliminar tareas.

## Requerimientos Funcionales

### 1. Gestión de Tareas

- Crear una tarea con:

1. Título
2. Descripción
3. Una categoría
4. Una o varias etiquetas
5. Estado (si la tarea ya fue realizada o no)

- Editar una tarea
- Ver la tarea
- Eliminar una tarea
- Listar todas las tareas

### 2. Gestión de Categorías

- Crear nueva categoría

1. Nombre

- Editar una categoría
- Ver la categoría
- Eliminar una categoría
- Listar categorías disponibles

### 3. Gestión de Etiquetas (Tags)

- Crear nueva etiqueta

1. Nombre

- Editar una etiqueta
- Ver la etiqueta
- Eliminar una etiqueta
- Listar etiquetas disponibles

### 4. Interfaz Web

- Formularios con validación
- Vistas amigables usando Blade
- Navegación entre secciones

## Requerimientos No Funcionales

- **Simplicidad:** No usar autenticación de usuarios (se implementará en el siguiente
  proyecto).
- **Accesibilidad básica:** Navegable desde dispositivos móviles (responsive) y
  escritorio.
- **Sin autenticación:** No se maneja login ni sesiones.
- **Persistencia:** Las tareas se guardan en base de datos (mysql en laragon).

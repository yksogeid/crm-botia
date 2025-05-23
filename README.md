<p align="center"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></p>

# CRM BOTIA

## Acerca del Proyecto

CRM BOTIA es un panel administrativo especializado para la gestión y entrenamiento de chatbots de IA basados en N8N. Desarrollado con Laravel 12 y FilamentPHP, este sistema está diseñado específicamente para administrar, monitorear y optimizar los datos de entrenamiento de la IA, facilitando el análisis y mejora continua de las interacciones del chatbot.

### Características Principales

- **Panel Administrativo Moderno**: Interfaz intuitiva construida con FilamentPHP para gestionar datos de entrenamiento
- **Gestión de Mensajes N8N**: Administración y monitoreo de conversaciones del chatbot
- **Análisis de Interacciones**: Clasificación y etiquetado de interacciones (humano/IA)
- **Base de Datos Dual**: Soporte para PostgreSQL y MySQL para almacenamiento de datos de entrenamiento
- **Seguridad Robusta**: Implementación de políticas de acceso y protección CSRF
- **API Integration**: Integración con la plataforma N8N para el entrenamiento del chatbot

## Requisitos del Sistema

- PHP 8.x
- Composer
- MySQL
- Extensiones PHP requeridas por Laravel 12

## Instalación

1. Clonar el repositorio:
```bash
git clone https://github.com/yksogeid/crm-botia.git
cd crm-botia
```

2. Instalar dependencias:
```bash
composer install
```

3. Configurar el entorno:
```bash
cp .env.example .env
php artisan key:generate
```

4. Configurar la base de datos en el archivo .env

5. Ejecutar migraciones:
```bash
php artisan migrate
```



## Uso

1. Iniciar el servidor de desarrollo:
```bash
php artisan serve
```

2. Acceder al panel administrativo:
- URL: `http://localhost:8000/admin`
- Credenciales por defecto:
  - Email: admin@example.com
  - Password: password

## Características Detalladas

### Panel Administrativo (FilamentPHP)
- Gestión de datos de entrenamiento
- Dashboard con métricas de rendimiento del chatbot
- Interfaz responsive y moderna para análisis de conversaciones

### Gestión de Mensajes N8N
- Clasificación de interacciones (humano/IA)
- Etiquetado y categorización de conversaciones
- Seguimiento de calidad de respuestas

### Sistema de Análisis
- Evaluación de efectividad del entrenamiento
- Identificación de patrones de conversación
- Métricas de rendimiento del chatbot

## Seguridad

- Autenticación robusta
- Control de acceso basado en roles
- Protección contra CSRF
- Validación de datos

## Licencia

Este proyecto está licenciado bajo la Licencia MIT - ver el archivo [LICENSE](LICENSE) para más detalles.

## Soporte

Para soporte y consultas, por favor crear un issue en el repositorio o contactar al equipo de desarrollo.
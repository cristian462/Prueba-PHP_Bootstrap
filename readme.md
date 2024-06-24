# Proyecto de Prueba: Aplicación Web Básica en PHP y Bootstrap

## Descripción
Este proyecto es una aplicación web básica que permite a los usuarios registrarse, iniciar sesión y ver su nombre y fecha de registro. La aplicación está desarrollada utilizando PHP, MySQL, HTML5, CSS, Bootstrap 4 y JavaScript y JQuery.

## Índice
1. [Descripción](#descripción)
2. [Requisitos](#requisitos)
3. [Instalación](#instalación)
4. [Uso](#uso)

## Requisitos
Para ejecutar este proyecto, necesitarás:
- Docker

## Instalación

### Paso 1: Clonar el Repositorio
Clona este repositorio en tu máquina local utilizando Git.
```bash
git clone https://github.com/tu_usuario/nombre_del_proyecto.git
```

### Paso 2: Despliegue de Docker
Teniendo Docker instalado ejecutar desde la raiz del proyecto
``` bash
docker-compose up -d --build
```

### Paso 3: Modificar archivo host
#### Desde Windows acceder a la ruta:
```
C:\Windows\System32\drivers\etc
```
#### Desde linux/mac:
```bash
/etc/hosts
```

Añadir la siguiente linea en el archivo host:
```
127.0.0.1 app.local
```

### Paso 3: Acceda al navegador
Entre en:
```
http://app.local
```

## Uso

Puede acceder a phpmyadmin en:
```
http://app.local:8080
```
Usuario:
```
root
```
Password:
```
rootpassword
```

Puede eliminar la ejecución de los contenedores de docker con el siguiente comando:
```bash
docker-compose down
```

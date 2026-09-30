# Práctica 7 — Laravel con Docker

Aplicación Laravel (login, registro y dashboard) servida con Apache y PHP, MariaDB y phpMyAdmin.

| Servicio | URL | Notas |
|---|---|---|
| Aplicación | http://localhost:8080 | Registro en `/register`, login en `/login` |
| phpMyAdmin | http://localhost:8081 | Usuario `root`, contraseña `root`, base `laraveldb` |

Esas credenciales son solo para este laboratorio local.

## Requisitos

Docker con Docker Compose.

## Puesta en marcha

```bash
git clone <url-del-repositorio>
cd practica7-lamp-laravel-docker
docker compose up --build
```

El primer arranque tarda varios minutos: el contenedor copia `.env`, instala las dependencias de PHP (`composer install`), genera `APP_KEY`, corre las migraciones y compila el CSS con Vite. Cuando el log diga que Apache está en el puerto 80, abre http://localhost:8080.

Para detener los contenedores:

```bash
docker compose down
```

## Permisos de archivos

La imagen usa el UID 1000 para escribir en `src/`. Si los archivos quedan con otro dueño, crea un `.env` en la raíz del proyecto (no se sube a Git) con tu usuario de Linux:

```bash
id -u
id -g
```

```
HOST_UID=1000
HOST_GID=1000
```

Vuelve a construir con `docker compose up --build`.

## Qué no está en el repositorio

`src/.env`, `src/vendor`, `src/node_modules` y `src/public/build` se generan en cada máquina. Cada alumno obtiene su propia `APP_KEY` en el primer arranque.

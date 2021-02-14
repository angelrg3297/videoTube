# VideoTube

## Angel Rodriguez Gomez


### Instalar
Paso 1: Clonar el repositorio

```bash
git clone ...
```

Paso 2:  Ejecutar composer para bajar las dependecias
```bash
composer install
```

Paso 3: Copiar archivo .env.example .env
```bash
cp .env.example .env
```

Paso 4: Crear base de datos
```sql
CREATE DATABASE videotube;
```

Paso 5: Configurar el archivo .env con tus credenciales de base de datos
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=videotube
DB_USERNAME=root
DB_PASSWORD=
```

Paso 6: Ejecutar las migraciones de laravel
```bash
php artisan migrate
```

Paso 7: Generar informacion de prueba
```bash
php artisan db:seed
```
Paso 8: Ejecutar passport
```bash
php artisan passport:install
```
Paso 9: Generar GrantToken
```bash
php artisan passport:client --password
```

Paso 10: Ejecutar Storage
```bash
php artisan storage:link
```
http://videotube.com


# Utiles

## Debug
dd($variable); // muestra el contenido de una variable y corta la ejecucion

## Borrar cache
php artisan cache:clear
php artisan route:clear
php artisan view:clear


# HTTP Status
https://developer.mozilla.org/en-US/docs/Web/HTTP/Status
# PAW-2024
Repositorio que aloja trabajos practicos de Programacion en Ambiente Web (11086) - UNLU 2024

TP1: Maquetado y construccion del documento HTML: <br>
Se resolvio un sitio para una cadena de hamburguesas que permite
realizar una reserva de una mesa, ver el listado de hamburguesas 
disponibles (incluyendo la hamburguesa del mes), tambien se cuenta
con una sección para registrarse y loguearse que permitira realizar
la compra

Entorno de desarrollo: VSCode, <br>
Sistema Operativo: Windows 11

Instrucciones para configurar-instalacion

1. Instalar todas las dependencias

´´´
composer update
composer install
´´´

2. Crear un archivo .env, este tendra los configuracion necesaria para conectar a la base de datos

3. Copia el contenido que esta en .env.example en .env, modificiando username y password acorde a las configuraciones de su MySql

4. LLevar a cabo los migrates con el siguiente comando

´´´
phinx migrate -e development
´´´

5. Levantar el proyecto

´´´
php -S localhost:8888 -t public
´´´

6. En el caso que se quiera levantar en un servidor publico, ejecute el siguiente comando

´´´
./ngrok http http://localhost:8888/
´´´

Figma: https://www.figma.com/file/XK3M3D3Ikt8jG1kdT5zQEW/LMJR-(Chiv)---TP1(PAW)?type=design&node-id=58%3A486&mode=design&t=9VBFG6YhUoPuYjwA-1

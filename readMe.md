En este proyecto realizaré un generador de CVs usando php, html, css y sql.

ESTRUCTURA PLANIFICADA DEL PROYECTO:
Aún no lo he empezado, pero he investigado y llegado a la conclusión de que necesitaré los siguientes archivos:

- **index.php:** Página principal de la aplicación. mostrará un listado (historial) de todas las versiones de CVs guardadas, con botones para visualizar o crear nuevas versiones.

- **crear.php:** Contiene el formulario HTML dinámico donde el usuario introduce sus datos personales, sube su foto y añade múltiples experiencias laborales o estudios.

- **guardar.php:** Archivo de lógica (backend), que recibirá los datos enviados por el formulario mediante un POST, gestionando la subida de la imagen al servidor e insertando la información en las tablas correspondientes.

- **ver.php:** Página de visualización final, que recibirá un ID, recuperará los datos de la base de datos y generará el CV en un   formato limpio diseñado para imprimir o guardar como PDF.

- **style.css:** Hoja de estilos que define la apariencia visual

- **uploads/:** Carpeta del servidor donde se almacenan físicamente los archivos de imagen (fotos de perfil por ejemplo) subidos por los usuarios.

- **db.sql:** Script SQL necesario para la instalación, que contiene las sentencias para crear la base de datos y las tablas relacionales (cvs, experiencia, formacion). Se debe importar en phpMyAdmin.

- **db.php:** Archivo de configuración que establece la conexión con la base de datos MySQL. Se incluye en el resto de archivos para permitir el acceso a los datos.

Nota: Obviamente esta estructura es susceptiva a cambios a medida que desarrollaré el proyecto.
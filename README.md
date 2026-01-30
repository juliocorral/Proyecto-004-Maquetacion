# REGLAS DE INSTALACIÓN DEL PROYECTO

## 1. Descargar el proyecto de Github (clonarlo en el VSCode local)
## 2. Eliminar la carpeta .git (carpeta oculta) en caso de existir. Recuerda configurar tu explorador de archivos para ver los archivos y carpetas ocultos.
## 3. Instalar las dependencias de composer (PHP) y npm (JS)

### Instalación de dependencias Javascript
```bash
npm install
```

### Instalación de dependencias PHP
```bash
composer update
```

## 4. Creación del archivo enviroment (.env)
   
Debemos añadir esta configuración de variables:
```bash
# CREDENCIALES DE PHP MAILER (envioPhpMailer.php)
USERNAME={usuario del correo desde el que se envia, suele ser el email}
PASS={clave de esa cuenta de correo}
HOST={servidor de correo saliente SMTP}
 
# CONFIGURACIÓN DE CORREOS DE ESTE PROYECTO (gestionForm.php)
EMAIL_WEB={correo desde el que se envia}
EMAIL_ADMIN={correo destinatario del admin de la web}
```

## 5. Levantar servidor/es

Para poder arrancar el proyecto en modo desarrollo (dev mode) debemos utilizar dos terminales. Se levantara en el local en el puerto 8000 (con proxy al 3000)

En la primera hacemos:
### Levantar servidor PHP
```bash
php -S localhost:8880
```

En la segunda hacemos:
### Ejecutar proyecto en modo desarrollo
```bash
npm run dev 
```

## 6. Para ver la página acceder en el navegador a **localhost:3000**

## 7. Una vez finalizado el proyecto para subirlo a producción se ejecutará el comando:

### Ejecutar proyecto en modo producción
```bash
npm run build 
```

Subimos despues los archivos necesarios al servidor.
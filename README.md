# imgLoader
Carga basica de imagenes con PHP. Apoyandose en la libreria **simpleimage** de **abeautifulsite** para agregar un fondo blanco a la imagen y acomodarla al mismo ancho x alto.

## Ejemplos
Cargar archivos basicos e istanciar la clase **Img()**.
```
<?
require_once 'abeautifulsite/simpleimage.php';
require_once 'class.img.php';

$img = new Img();

```
Cargar una imagen.

```
$img->Load("image.jpg");
```
La clase **Load()** acepta 3 parametros, siendo los ultimos 2 opcionales:
```
/*
* $filename = Archivo a ser cargado
*
* $destino (opcional) = Ubicacion de destino
*
* $nombre  (opcional) = Nombre final del archivo 
*/

$img->load("image.jpg","imagenes/thumbs","producto.jpg");
```

##Requerimientos
- PHP 5.6+
- [Extension GD](http://php.net/manual/en/book.image.php)

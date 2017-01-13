<?
require_once 'abeautifulsite/simpleimage.php';

class Img{
	private $error = NULL;
	private $name;

	//Validar si el archivo es de un formato de imagen valido.
	protected function check($filename){
		$info = getimagesize($filename);

		//Extensiones validas.
		$valid = array('image/gif','image/jpeg','image/png');

	  return in_array($info['mime'], $valid);
	}

	//Asignar un nombre al azar
	protected function get_type($filename){
    return preg_replace('/^.*\./', '', $filename);
	}

	//Asignar un nombre al azar
	protected function rename($filename){
		//Tomar la extension de la imagen
		$ext = $this->get_type($filename);

		//Generar un nombre aleatorio y agregar la extension.
		$filename = sha1(mt_rand().time()).".".$ext;

		return $filename;
	}

	/*Cargar la imagen:
	*
	*	$filename = Archivo a ser cargado
	*
	*	$destino (opcional) = Ubicacion de destino
	*
	*	$nombre  (opcional) = Nombre del archivo 
	*/
	public function load($filename,$destino = NULL,$name = NULL){

		//Verifica si es archivo es una imagen valida
		if($this->check($filename)){

			$img    = new abeautifulsite\SimpleImage();

			//Crear fondo blanco de la imagen
			$fondo  = new abeautifulsite\SimpleImage(null, 417, 417, '#fff');

			//Se carga la imagen a la clase
			$img->load($filename);

			//Se adapta la imagen a 417px cuadrados
			$img->best_fit(417,417);

			//Se le coloca el fondo blanco a la imagen cargada
			$fondo->overlay($img, 'center', 1,0,0);

			//Si la variable $name existe, se asigna ese nombre a la imagen. Si no, se genera uno aleatorio
			$this->name = isset($name) ? $name : $this->rename($filename);

			if($destino){
				$fondo->save($destino."/".$this->name);
			}else{
				$fondo->save($this->name);
			}

		}else{

			$this->error = "Archivo no valido.";

		}

		return $this;
	}

}
<?php

	require_once('functions.php');

	class Register{

		private $usuario;
		private $clave;	
		private $connectionDB;
		private $result_register;

		public function __construct($usuario, $clave){
			$this->usuario = secure_data($usuario);
			$this->clave= secure_data($clave);
			$this->clave = $clave;
			$this->connectionDB = connectionDB();

			try{
				if($this->check_usuario_exists()){
						$this->result_register = false;
				} else {
						$this->create_user();
						$this->result_register = true;
				}
			} catch(Exception $e){
				die('ERROR: '. $e->getMessage());
			}
		}

		private function check_usuario_exists(){
			$stmt = $this->connectionDB->prepare('SELECT * FROM usuarios WHERE usuario=:usuario');
			$stmt->bindParam(':usuario',$this->usuario);
			$stmt->execute();

			$result = $stmt->fetch();

			if(isset($result['usuario'])){
	            return true;
	        } else {
	            return false;
	        }
		}

		private function create_user(){
			$stmt = $this->connectionDB->prepare('INSERT INTO usuarios (usuario, clave ) VALUES (:usuario,:clave)');
			$stmt->bindParam(':usuario',$this->usuario);
			$stmt->bindParam(':clave',$this->clave);
			$stmt->execute();
		}

		public function get_confirmation(){
			if($this->result_register){
				return 'Usuario creado con éxito';
			} else {
				return 'El usuario ya existe en el sistema';
			}
		}

	}

?>
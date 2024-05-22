<?php
    require_once('functions.php');

    class Login{
        private $usuario;
        private $clave;
        private $connectionDB;

        public function __construct($usuario, $clave)
        {
            $this->usuario = secure_data($usuario);
            $this->clave = secure_data($clave);
            $this->connectionDB = connectionDB();

            if($this->check_usuario_exists()){
                 $passInDB = $this->get_pass_in_db();
                 $auth = password_verify($this->clave,$passInDB);
                 if($auth){
                    ob_start();
                    session_start();
                    $_SESSION['usuario'] = $this->usuario;
                    $_SESSION['valid'] = true;
                    header('Location: home.php');
                 } else {
                    header('Location: index.php');
                 }
            } else {
                header('Location: index.php');
            }


        }

        private function check_usuario_exists(){
			$stmt = $this->connectionDB->prepare('SELECT * FROM usuario WHERE usuario=:usuario');
			$stmt->bindParam(':usuario',$this->usuario);
			$stmt->execute();

			$result = $stmt->fetch();

			if(isset($result['usuario'])){
	            return true;
	        } else {
	            return false;
	        }
		}

        private function get_pass_in_db(){
            $stmt = $this->connectionDB->prepare('SELECT * FROM usuario WHERE usuario=:usuario');
            $stmt->bindParam(':email',$this->usuario);
            $stmt->execute();

            $result = $stmt->fetch();

            return $result['clave'];
        }
    }

?>
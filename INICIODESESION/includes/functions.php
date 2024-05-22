<?php
		function secure_data($data){
			$data = trim($data);
	        $data = stripslashes($data);
	        $data = htmlspecialchars($data);

	        return $data;
		}

       function hash_clave($clave){
			return md5($clave);
		}

        function connectionDB(){
            $host = 'localhost';
            $dbName = 'iniciosesiondb';
            $user = 'root';
            $pass = '';
            $hostDB = 'mysql:host='.$host.';dbname='.$dbName.';';

            try{
                $connection = new PDO($hostDB,$user,$pass);
                $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                return $connection;
            } catch(PDOException $e){
                die('ERROR: '.$e->getMessage());
            }
        }

?>
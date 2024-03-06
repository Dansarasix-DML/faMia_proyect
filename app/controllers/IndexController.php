<?php
    /**
     * @author Daniel Marín López
     * @version 0.01a
     * 
     */

    namespace App\Controllers;
    
    class IndexController extends BaseController {

        public function IndexAction() {
            require "../app/config/users.php";
            require "../lib/funciones.php";

            session_start();
            //Cargamos variables
            $user=$pass="";

            if (isset($_POST["elaborar"])) {
                $directorio = "../files/";
                $file = $_POST["archivo"];
        
                list($init, $fecha, $hora, $estado) = explode("_", $file);
        
                rename($directorio.$file, $directorio."{$init}_{$fecha}_{$hora}_elaborada.txt");
            }
        
            if (isset($_POST["borrar"])) {
                $directorio = "../files/";
                $file = $_POST["archivo"];
        
                unlink($directorio.$file);
            }


            if (!isset($_SESSION["auth"])) {
                $_SESSION["auth"] = false;
                $_SESSION["user"] = "Invitado";

            }  

            $auth = $_SESSION["auth"];
            $user = $_SESSION["user"];

            $procesaForm = false;

            if (isset($_POST["enviar"])) {
                //procesamos formulario
                $procesaForm = true;
                $_SESSION["user"] = $_POST["usuario"];
                $_SESSION["passwd"] = $_POST["passwd"];
                $data = $this->AunthenticateAction();
            }   
            
            $data = array("user" => $_SESSION["user"], "auth" => $_SESSION["auth"]);

            if ($_SESSION["auth"]) {
                $this->renderHTML("../views/comandas_index.php", $data);
            } else {
                $this->renderHTML("../views/login_index.php", $data);
            }
            
        }

        private function AunthenticateAction() {
            $user = testInput($_POST["usuario"]);
            $pass = testInput($_POST["passwd"]);


            foreach (USERS as $usuario) {
                if ($user == $usuario->getUser() && $pass == $usuario->getPasswd()) {
                    $_SESSION["auth"] = true;
                    $_SESSION["user"] = $usuario->getUser();
                }
            }

            $data = array("user" => $_SESSION["user"], "auth" => $_SESSION["auth"]);
            return $data;
        }


        public function CierreSesion(){
            session_start();

            session_unset();

            session_destroy();

            header("location: http://famia.com");
        }        

    }

?>
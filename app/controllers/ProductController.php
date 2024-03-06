<?php
    /**
     * @author Daniel Marín López
     * @version 0.01a
     * 
     */

    namespace App\Controllers;

    use App\Models\Pizza;
    use App\Models\Bebida;
    use App\Models\Postre;

    
    class ProductController extends BaseController {

        public function PizzasAction() {
            include "../app/config/products.php";

            session_start();
            $procesaForm = false;

            if(!isset($_SESSION["pedido"])){
                $_SESSION["pedido"] = [];
            }

            if (isset($_POST["envio"])) {
                $procesaForm = true;
                $pedido = $_SESSION["pedido"];

                $id = $_POST["key"];
                $nombre = PRODUCTOS["pizzas"][$id]["nombre"];
                $tamano = $_POST["tamano"];
                $precio = PRODUCTOS["pizzas"][$id]["precio"][$tamano];
                $cantidad = $_POST["cantidad"];

                // $pedido[] = array(
                //     "id" => $id, 
                //     "tipo" => "pizza",
                //     "tamano" => $tamano, 
                //     "cantidad" => $cantidad);

                $pedido[] = new Pizza($id, $nombre, $tamano, $precio, $cantidad);
                
                $_SESSION["pedido"] = $pedido;
                
            }

            $data = array("pizzas" => PRODUCTOS["pizzas"]);

            $this->renderHTML("../views/pizzas_index.php", $data);
            // var_dump($pedido);
        }

        public function BebidasAction() {
            include "../app/config/products.php";
            
            session_start();
            $procesaForm = false;

            if(!isset($_SESSION["pedido"])){
                $_SESSION["pedido"] = [];
            }

            if (isset($_POST["envio"])) {
                $procesaForm = true;
                $pedido = $_SESSION["pedido"];

                $id = $_POST["key"];
                $nombre = PRODUCTOS["bebidas"][$id]["nombre"];
                $precio = PRODUCTOS["bebidas"][$id]["precio"];
                $cantidad = $_POST["cantidad"];

                $pedido[] = new Bebida($id, $nombre, $precio, $cantidad);
                
                $_SESSION["pedido"] = $pedido;
            }

            $data = array("bebidas" => PRODUCTOS["bebidas"]);

            $this->renderHTML("../views/bebidas_index.php", $data);
        }
        public function PostresAction() {
            include "../app/config/products.php";

            session_start();
            $procesaForm = false;

            if(!isset($_SESSION["pedido"])){
                $_SESSION["pedido"] = [];
            }
        
            if (isset($_POST["envio"])) {
                $procesaForm = true;
                $pedido = $_SESSION["pedido"];
        
                $id = $_POST["key"];
                $nombre = PRODUCTOS["postres"][$id]["nombre"];
                $precio = PRODUCTOS["postres"][$id]["precio"];
                $cantidad = $_POST["cantidad"];
        
                $pedido[] = new Postre($id, $nombre, $precio, $cantidad);
                
                $_SESSION["pedido"] = $pedido;

            }

            $data = array("postres" => PRODUCTOS["postres"]);

            $this->renderHTML("../views/postres_index.php", $data);
        }

    }

    
?>
<?php
    /**
     * @author Daniel Marín López
     * @version 0.01a
     * 
     */

    namespace App\Controllers;
    
    class CarritoController extends BaseController {

        private function CarritoSesion() {
            session_start();
            $total = 0;
            $ultimoPedido = [];
    
            if (!isset($_SESSION["pedido"])) {
                $_SESSION["pedido"] = [];
            }

            $pedido = $_SESSION["pedido"];

            return array($pedido, $total);
        }

        private function descargaFichero($dir, $file) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . $file . '"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($dir . $file));
            readfile($dir . $file);
            unlink($dir . $file); 
        }
    
        function generarTicket($pedido) {
            $dir = "../files/";
            $total = 0;
            date_default_timezone_set("Europe/Lisbon");
            $fechaHoraActual = date('Y-m-d_H-i-s');
            $file = "ticket_" . $fechaHoraActual . ".txt";
            $handle = fopen(($dir . $file), "w");
        
            if ($handle === false) {
                die("No se pudo abrir el archivo");
            }
        
            $text = "--- Pedido realizado el " . date('d/m/Y \a \l\a\s H:i:s') . " ---\n";
            $text .= "· Descripción - Unidades - Precio - Total\n";
        
            foreach ($pedido as $producto) {
                // $tipo = ($producto["tipo"] == "pizza") ?
                //     "pizzas" : (($producto["tipo"] == "bebida") ?
                //         "bebidas" : "postres");
                $nombre = $producto->getNombre();
                $precio = $producto->getPrecio();
                $cantidad = $producto->getCantidad();
                $total += $precio * $cantidad;
                $text .= "· " . $nombre . " - " . $cantidad . " - " . $precio . " € - " . $precio * $cantidad . " €\n";
            }
            $text .= "--- EL TOTAL A PAGAR ES: " . $total . "€ ---";
            fwrite($handle, $text);
            fclose($handle);
            $this->descargaFichero($dir, $file);
            session_write_close();
        }
        
    
        function generarComanda($pedido) {
            $dir = "../files/";
            $total = 0;
            date_default_timezone_set("Europe/Lisbon");
            $fechaHoraActual = date('Y-m-d_H-i-s');
            $file = "comanda_" . $fechaHoraActual . "_pendiente.txt";
            $handle = fopen(($dir . $file),"w");
    
            if ($handle === false) {
                die("No se pudo abrir el archivo");
            }
    
            $text = "--- Comanda realizada el ".date('d/m/Y \a \l\a\s H:i:s')." ---\n";
            $text .= "· Descripción - Unidades - Precio - Total\n";
    
            foreach ($pedido as $producto) {
                if (get_class($producto) == "App\Models\Pizza") {
                    $nombre = $producto->getNombre();
                    $precio = $producto->getPrecio();
                    $cantidad = $producto->getCantidad();
                    $total += $precio*$cantidad;
                    $text .= "· ".$nombre." - ".$cantidad." - ".$precio." € - ".$precio*$cantidad." €\n";
                }
            }
            $text .= "---";
            fwrite($handle, $text);
            fclose($handle);
            session_write_close();
            
        }

        private function TramitarPedido($pedido) {
            $longitud = count($pedido);
            $ultimoPedido = array_reverse(array_slice($pedido, $longitud - 3, 3));
            setcookie("ultimoPedido", json_encode($ultimoPedido), time()+3600);
            $this->generarComanda($pedido);  
            $this->generarTicket($pedido);
            // header("Location: pizzas.php");
            exit;
        }

        public function CarritoAction() {
            $datos = $this->CarritoSesion();
            $procesaForm = false;

            if (isset($_POST["tramite"])) {
                $procesaForm = true;
                $this->TramitarPedido($datos[0]);
            }
            
            if (isset($_POST["cierre"])) {
                $procesaForm = true;
                session_unset();
                session_destroy();
                header("Location: http://famia.com/pizzas");
            }

            $data = array('pedido' => $datos[0], 'total' => $datos[1]);
            $this->renderHTML("../views/carrito_index.php", $data);

        }
    }

?>
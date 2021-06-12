<?php

require_once 'models/pedido.php';

class pedidoController {

    public function hacer() {


        require_once 'views/pedido/hacer.php';
    }

    public function add() {

        if (isset($_SESSION['identity'])) {
            //guardar el pedido
            $usuario_id = $_SESSION['identity']->id;
            $provincia = isset($_POST['provincia']) ? $_POST['provincia'] : false;
            $ciudad = isset($_POST['ciudad']) ? $_POST['ciudad'] : false;
            $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : false;

            $stats = Helpers::statsCarrito();
            $coste = $stats['total'];

            if ($provincia && $ciudad && $direccion) {

                $pedido = new Pedido();
                $pedido->setProvincia($provincia);
                $pedido->setDireccion($direccion);
                $pedido->setLocalidad($ciudad);
                $pedido->setUsuario_id($usuario_id);
                $pedido->setCoste($coste);

                $save = $pedido->save();
                //guardar linea de pedido
                $save_linea = $pedido->save_linea();

                if ($save && $save_linea) {
                    $_SESSION['pedido'] = 'complete';
                } else {
                    $_SESSION['pedido'] = 'failed';
                }
            } else {
                $_SESSION['pedido'] = 'failed';
            }
            
            header('Location:'.base_url.'pedido/confirmado');
        } else {
            //redirigir
            header('Location:' . base_url);
        }
    }
    
    public function confirmado() {
        
        if(isset($_SESSION['identity'])) {
            $identity = $_SESSION['identity'];
            $pedido = new Pedido();
            $pedido->setUsuario_id($identity->id);
            
            $pedido = $pedido->getOneByUser();
            
            $productos_pedido = new Pedido();
            $productos = $productos_pedido->getByPedido($pedido->id);
        }
        
        
        require_once 'views/pedido/confirmado.php';
    }
    
    public function mis_pedidos() {
        
        Helpers::isIdentity();
        
        $pedido = new Pedido();
        $pedido->setUsuario_id($_SESSION['identity']->id);
        $pedidos = $pedido->getAllByUser();
        
        require_once 'views/pedido/mis_pedidos.php';
    }
    
    public function detalle() {
        Helpers::isIdentity();
        if(isset($_GET['id'])) {
            $id = $_GET['id'];

            $pedido = new Pedido();
            $pedido->setId($id);
            $pedido = $pedido->getOne();
            
            $productos_pedido = new Pedido();
            $productos = $productos_pedido->getByPedido($id);
            
            
            require_once 'views/pedido/detalle.php';
            
        }else {
            header('Location:'.base_url.'pedido/mis_pedidos');
        }
        
        
    }
    
    public function gestion() {
        Helpers::isAdmin();
        $gestion = true;
        
        $pedido = new Pedido();
        $pedidos = $pedido->getAll();
        
        require_once 'views/pedido/mis_pedidos.php';
    }

}

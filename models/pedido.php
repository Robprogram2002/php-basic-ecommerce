<?php

class Pedido {
    private $id;
    private $usuario_id;
    private $provincia;
    private $localidad;
    private $direccion;
    private $coste;
    private $estado;
    private $fecha;
    private $hora;
    private $db;
    
    function __construct() {
        $this->db = Database::connect();
    }
    /*Metodos para trabajar con la base de datos*/
    
    function getId() {
        return $this->id;
    }

    function getUsuario_id() {
        return $this->usuario_id;
    }

    function getProvincia() {
        return $this->provincia;
    }

    function getLocalidad() {
        return $this->localidad;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function getCoste() {
        return $this->coste;
    }

    function getEstado() {
        return $this->estado;
    }

    function getFecha() {
        return $this->fecha;
    }

    function getHora() {
        return $this->hora;
    }

    function setId($id): void {
        $this->id = $id;
    }

    function setUsuario_id($usuario_id): void {
        $this->usuario_id = $usuario_id;
    }

    function setProvincia($provincia): void {
        $this->provincia = $this->db->real_escape_string($provincia);
    }

    function setLocalidad($localidad): void {
        $this->localidad = $this->db->real_escape_string($localidad);
    }

    function setDireccion($direccion): void {
        $this->direccion = $this->db->real_escape_string($direccion);
    }

    function setCoste($coste): void {
        $this->coste = $coste;
    }

    function setEstado($estado): void {
        $this->estado = $estado;
    }

    function setFecha($fecha): void {
        $this->fecha = $fecha;
    }

    function setHora($hora): void {
        $this->hora = $hora;
    }

        
    public function save() {
        $sql = "INSERT INTO pedidos (`id`, `usuario_id`, `provincia`, `localidad`, `direccion`, `coste`, `estado`, `fecha`, `hora`) VALUES(NULL,{$this->getUsuario_id()},'{$this->getProvincia()}','{$this->getLocalidad()}','{$this->getDireccion()}',{$this->getCoste()},'confirm',CURDATE(),CURTIME());";
        $save = $this->db->query($sql);
        
        $result = false;
        
        if($save) {
            $result = true;
        }
        
        return $result;
    }
    
    public function save_linea() {
        $sql = "SELECT LAST_INSERT_ID() AS 'pedido';";
        $query = $this->db->query($sql);
        $pedido_id = $query->fetch_object()->pedido;
        
        foreach ($_SESSION['carrito'] as $elemento){  
            $producto = $elemento['producto'];
            
            $insert = "INSERT INTO lineas_pedidos VALUES(NULL, {$pedido_id}, {$producto->id}, {$elemento['unidades']});" ;
            $save = $this->db->query($insert);
            
        }
        
        $result = false;
        if ($save) {
            $result = true;
        }
        
        return $result;
        
    }


    public function getAll() {
        $products = $this->db->query("SELECT * FROM pedidos ORDER BY id DESC;");
        return  $products;
    }
    
    public function getOneByUser() {
        $sql = "SELECT p.id, p.coste FROM pedidos p  WHERE p.usuario_id = {$this->getUsuario_id()} ORDER BY id DESC LIMIT 1;";
        $pedido = $this->db->query($sql);
        return  $pedido->fetch_object();
    }
    
    public function getAllByUser() {
        $sql = "SELECT * FROM pedidos p  WHERE p.usuario_id = {$this->getUsuario_id()} ORDER BY id DESC ;";
        $pedido = $this->db->query($sql);
        return  $pedido;
    }
    
    public function getByPedido($id) {
        $sql = "SELECT pr.*, lp.unidades FROM productos pr INNER JOIN lineas_pedidos lp ON pr.id = lp.producto_id WHERE lp.pedido_id = {$id};";
        $productos = $this->db->query($sql);
        
        return $productos;
    }
    
    public function getOne() {
        $producto = $this->db->query("SELECT * FROM pedidos WHERE id = {$this->getId()};");
        return $producto->fetch_object(); 
    }
}
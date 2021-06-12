<?php


class Producto {
    private $id;
    private $nombre;
    private $categoria_id;
    private $descripcion;
    private $precio;
    private $stock;
    private $oferta;
    private $db;
    private $fecha;
    private $imagen;
            
    function __construct() {
        $this->db = Database::connect();
    }
    
    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getCategoria_id() {
        return $this->categoria_id;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getPrecio() {
        return $this->precio;
    }

    function getStock() {
        return $this->stock;
    }

    function getOferta() {
        return $this->oferta;
    }

    function getFecha() {
        return $this->fecha;
    }

    function getImagen() {
        return $this->imagen;
    }

    function setId($id): void {
        $this->id = $this->db->real_escape_string($id);
    }

    function setNombre($nombre): void {
        $this->nombre = $this->db->real_escape_string($nombre);
    }

    function setCategoria_id($categoria_id): void {
        $this->categoria_id = $this->db->real_escape_string($categoria_id);
    }

    function setDescripcion($descripcion): void {
        $this->descripcion = $this->db->real_escape_string($descripcion);
    }

    function setPrecio($precio): void {
        $this->precio = $this->db->real_escape_string($precio);
    }

    function setStock($stock): void {
        $this->stock = $this->db->real_escape_string($stock);
    }

    function setOferta($oferta): void {
        $this->oferta = $this->db->real_escape_string($oferta);
    }

    function setFecha($fecha): void {
        $this->fecha = $this->db->real_escape_string($fecha);
    }

    function setImagen($imagen): void {
        $this->imagen = $this->db->real_escape_string($imagen);
    }

    public function getAll() {
        $products = $this->db->query("SELECT * FROM productos ORDER BY id DESC;");
        return  $products;
    }
    
    public function getByCategoria() {
        $products = $this->db->query("SELECT p.*, c.nombre AS 'catnombre' FROM productos p INNER JOIN categorias c ON c.id = p.categoria_id WHERE p.categoria_id = {$this->getCategoria_id()} ORDER BY id DESC;");
        return  $products;
    }
    
    public function getOne() {
        $product = $this->db->query("SELECT * FROM productos WHERE id = {$this->getId()};");
        return  $product->fetch_object();
    }
    
    public function getRandom($limit) {
        $productos = $this->db->query("SELECT * FROM productos ORDER BY RAND() LIMIT $limit;");
        return $productos;
    }
    
    public function save() {
        $sql = "INSERT INTO productos VALUES(null,'{$this->getNombre()}', '{$this->getDescripcion()}', '{$this->getPrecio()}',{$this->getCategoria_id()},{$this->getStock()},null,CURDATE(),'{$this->getImagen()}');";
        $save = $this->db->query($sql);
        
        
        $result = false;
        if($save) {
            $result = true;
        }
        
        return $result;
    }
    
    public function edit() {
        $sql = "UPDATE productos SET nombre = '{$this->getNombre()}', descripcion =  '{$this->getDescripcion()}',precio = '{$this->getPrecio()}', categoria_id = {$this->getCategoria_id()}, stock = {$this->getStock()}, imagen = '{$this->getImagen()}' WHERE id ={$this->getId()};";
        $save = $this->db->query($sql);


        $result = false;
        if($save) {
            $result = true;
        }

            return $result;
    }
    
    public function delete() {
        $sql = "DELETE FROM productos WHERE id={$this->id};";
        $delete = $this->db->query($sql);
        
        $result = false;
        if($delete) {
            $result = true;
        }
        
        return $result;
    }
}
<?php
require_once 'models/categoria.php';
require_once 'models/producto.php';

class categoriaController {
    
    public function index() {
        Helpers::isAdmin();
        $categoria = new Categoria();
        $categorias = $categoria->getAll();
        
        require_once 'views/categoria/index.php';
    }
    
    public function crear() {
        Helpers::isAdmin();
        require_once 'views/categoria/crear.php';
    }
    
    public function save() {
        Helpers::isAdmin();
        
        if(isset($_POST) && isset($_POST['nombre'])) {
            //guardar la nueva categoria
            $categoria = new Categoria();
            $categoria->setNombre($_POST['nombre']);
            $save = $categoria->save();
        }
        
        header('Location:'.base_url.'categoria/index');
    }
    
    public function ver() {
        if(isset($_GET['id'])){
            
            //conseguir categoria
            $id = $_GET['id'];
            $categoria = new Categoria();
            $categoria->setId($id);
            $one = $categoria->getOne();
            
            //conseguir porductos
            $producto = new Producto();
            $producto->setCategoria_id($id);
            $productos = $producto->getByCategoria();
        }
        require_once 'views/categoria/ver.php';
    }
}


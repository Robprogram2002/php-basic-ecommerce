<?php

class Usuario {
    private $id;
    private $nombre;
    private $apellidos;
    private $email;
    private $password;
    private $imagen;
    private $rol;
    private $db;
    
    function __construct() {
        $this->db = Database::connect();
    }
    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getApellidos() {
        return $this->apellidos;
    }

    function getEmail() {
        return $this->email;
    }

    function getPassword() {
        return password_hash($this->password, PASSWORD_BCRYPT, ['cost'=> 5]);
    }

    function getImagen() {
        return $this->imagen;
    }

    function getRol() {
        return $this->rol;
    }

    function getDb() {
        return $this->db;
    }

    
    function setId($id): void {
        $this->id = $id;
    }

    function setNombre($nombre): void {
        $this->nombre = $this->db->real_escape_string($nombre);
    }

    function setApellidos($apellidos): void {
        $this->apellidos = $this->db->real_escape_string($apellidos);
    }

    function setEmail($email): void {
        $this->email = $this->db->real_escape_string($email);
    }

    function setPassword($password): void {
        $this->password = $this->db->real_escape_string($password);
    }

    function setImagen($imagen): void {
        $this->imagen = $imagen;
    }

    function setRol($rol): void {
        $this->rol = $this->db->real_escape_string($rol);
    }

    /*Metodos para trabajar con la base de datos*/
    
    public function save() {
        $sql = "INSERT INTO usuarios VALUES(null,'{$this->getNombre()}','{$this->getApellidos()}','{$this->getEmail()}','{$this->getPassword()}','user',null);";
        $save = $this->db->query($sql);
        
        $result = false;
        if($save) {
            $result = true;
        }
        
        return $result;
    }
    
    public function login() {
        //comprobar si existe el usuario
        $email = $this->email;
        $password = $this->password;
        var_dump($password);
        
        $sql = "SELECT * FROM usuarios WHERE email = '$email';";
        $login = $this->db->query($sql);
        $result = false;
        
        if($login && $login->num_rows == 1) {
            $usuario = $login->fetch_object();
            
            //verificar contraseña
            $verify = password_verify($password, $usuario->password);
            
            if($verify) {
                $result = $usuario;
            }
        }
        
        return $result;
     }
       
}
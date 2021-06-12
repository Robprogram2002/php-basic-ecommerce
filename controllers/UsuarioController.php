<?php

require_once 'models/usuario.php';

class usuarioController {

    //cargar la vista de registro
    public function register() {        
        require_once 'views/usuario/register.php';
    }
    
    //procesar el registro
    public function save() {
        if(isset($_POST)) {
            $usuario = new Usuario();
            $usuario->setNombre($_POST['nombre']);
            $usuario->setApellidos($_POST['apellidos']);
            $usuario->setEmail($_POST['email']);
            $usuario->setPassword($_POST['password']);
            
            $save = $usuario->save();
            
            if($save) {
                $_SESSION['register'] = 'complete';
            }else {
                $_SESSION['register'] = 'imcomplete';
            }
        }else {
            $_SESSION['register'] = 'imcomplete';
        }
        header('Location:'.base_url.'usuario/register');
    }
    
    public function login() {
        if(isset($_POST)) {
            //identificar al usuario
            //comprobar al usuario
            $usuario = new Usuario();
            $usuario->setEmail($_POST['email']);
            $usuario->setPassword($_POST['password']);
            $identificado = $usuario->login();
            
            if($identificado && is_object($identificado)) {
                $_SESSION['identity'] = $identificado;
                
                if($identificado->rol == 'admin') {
                    $_SESSION['admin'] = true;
                }
            }else {
                $_SESSION['error_login'] = 'identificacion fallida';
            }
        }
        
        header('Location:'.base_url);
    }
    
    public  function logout() {
        
        if(isset($_SESSION['identity'])) {
            unset($_SESSION['identity']);
        }
        
        if(isset($_SESSION['admin'])) {
            unset($_SESSION['admin']);
        }
        
        header('Location:'.base_url);
    }
 }

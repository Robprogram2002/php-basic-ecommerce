<?php 
 session_start();
 require_once 'autoLoad.php';
 require_once 'helpers/functions.php';
 require_once 'config/DB.php';
 require_once 'config/parameters.php';
 require_once 'views/layout/header.php';
 require_once 'views/layout/sidebar.php';

 
 function show_error() {
     $error = new errorController();
     $error->index();
 }

if(isset($_GET['controller'])) {
    $controller_name = $_GET['controller'].'Controller';
}elseif (!isset($_GET['controller']) && !isset($_GET['action'])) {
    $controller_name = controller_default;
    
}else {
     show_error();   
}

if(class_exists($controller_name)) {
    $controlador = new $controller_name;
    
    if(isset($_GET['action']) && method_exists($controlador, $_GET['action'])) {
        $action = $_GET['action'];
        $controlador->$action();
    }elseif (!isset($_GET['controller']) && !isset($_GET['action'])) {
        $default = action_default;
        $controlador->$default();
    }else {
        show_error(); 
    }
}else {
    show_error(); 
}

require_once 'views/layout/footer.php';
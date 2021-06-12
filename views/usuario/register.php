<h1>Registrarse</h1>
<?php 
    if(isset($_SESSION['register']) && $_SESSION['register'] == 'complete'):?>
    <p  class="alert_green">Tua registro se ha completado con exito</p>
<?php elseif (isset($_SESSION['register']) && $_SESSION['register'] == 'imcomplete'):?>
    <p  class="alert_red">Tua registro no se ha podido completar con exito</p>
<?php endif;?>
<?php Helpers::deleteSession('register');?>    
<form method="POST" action="<?=base_url?>usuario/save">
    <label for="nombre">Nombre: </label>
    <input type="text" name="nombre" required="required"/>
    
    <label for="apellido">Apellido: </label>
    <input type="text" name="apellidos" required="required"/>
    
    <label for="email">Email: </label>
    <input type="email" name="email" required="required"/>
    
    <label for="password">Contraseña: </label>
    <input type="password" name="password" required="required"/>
    
    <input type="submit" value="Registrarse">
</form>

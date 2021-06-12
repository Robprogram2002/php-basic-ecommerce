
<!--Barra lateral-->
<aside id="lateral">
    
    <div class="block_aside" id="login">
    <?php if(isset($_SESSION['error_login'])): ?>
    <strong class="alert_red"><?=$_SESSION['error_login'] ?></strong>
    <?php endif;?>
    
    <?php if(!isset($_SESSION['identity'])): ?>
        <h2 style="margin-left: 4rem;">Inicia sesion!</h2>
        <form method="POST" action="<?=base_url?>usuario/login">
            <label for="emial">Email: </label>
            <input type="email" name="email">
            <label for="password">Password: </label>
            <input type="password" name="password">

            <input type="submit" value="Enviar">
        </form>
    <?php else: ?>
        <h3><?=$_SESSION['identity']->nombre?>  <?=$_SESSION['identity']->apellidos?></h3>
        <h3>Email: <?=$_SESSION['identity']->email?></h3>
        <a href="<?=base_url?>carrito/index" style="text-decoration: none;"><h3 style="padding: 10px 0;">Mi carrito</h3></a>
        <div id="user_panel">
            <a href="<?=base_url?>pedido/mis_pedidos">Mis pedidos</a>
            <?php if(isset($_SESSION['admin'])): ?>
            <a href="<?=base_url?>categoria/index" >Gestionar Categorias</a>
            <a href="<?=base_url?>pedido/gestion" >Gestionar pedidos</a>
            <a href="<?=base_url?>producto/gestion" >Gestionar productos</a>
            <?php endif; ?>
            <a href="<?=base_url?>usuario/logout">Cerrar session</a>
        </div>
    <?php endif;  Helpers::deleteSession('error_login')?>
    </div>
</aside>
<!-- Contenido Princiapl-->
<div id="central">
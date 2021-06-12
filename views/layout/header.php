<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>ShirShopy</title>
        <link rel="stylesheet" href="<?=base_url?>/assets/css/styles.css">
    </head>
    <body>
        <!--Cabecera-->
        <header id="header">
            <div id="logo">
                <img src="<?=base_url?>assets/img/camiseta.png">
                <a href="<?=base_url?>">Tienda de camisetas</a>     
            </div>
        </header>
        
        <!--Menu-->
        <nav id="menu">
            <?php $categorias = Helpers::showCategoria(); ?>
            <ul>
  
                <li>
                    <a href="<?=base_url?>">Inicio</a>
                </li>
                <?php while ($cat = $categorias->fetch_object()): ?>  
                <li>
                    <a href="<?=base_url?>categoria/ver&id=<?=$cat->id?>"><?=$cat->nombre?></a>
                </li>
                <?php endwhile;?>
            </ul>
        </nav>
        
        <div id="content">
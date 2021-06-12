<h1>Gestion de Productos</h1>

<a href="<?=base_url?>producto/crear" class="button button-small"> Crear Producto </a>

<?php if(isset($_SESSION['producto']) && $_SESSION['producto'] == 'complete'): ?>
<strong class="alert_green">El producto se ha añadido al inventario correctamente</strong>
<?php elseif(isset($_SESSION['producto']) && $_SESSION['producto'] !== 'complete'): ?>
<strong class="alert_red">El producto no se ha podido introducir al inventario exitosamente</strong>
<?php endif; ?>
<?php Helpers::deleteSession('producto') ?>
<?php if(isset($_SESSION['delete']) && $_SESSION['delete'] == 'complete'): ?>
<strong class="alert_green">El producto se ha eliminado del inventario correctamente</strong>
<?php elseif(isset($_SESSION['delete']) && $_SESSION['delete'] !== 'complete'): ?>
<strong class="alert_red">El producto no se ha podido eliminar del inventario exitosamente</strong>
<?php endif; ?>
<?php Helpers::deleteSession('delete') ?>
<table>
    <tr>
        <th>ID</th>
        <th>NOMBRE</th>
        <th>DESCRIPCION</th>
        <th>PRECIO</th>
        <th>CATEGORIA_ID</th>
        <th>STOCK</th>
        <th>FECHA</th>
        
    </tr>
    <?php while ($prod = $productos->fetch_object()):  ?>
    <tr>
        <td><?= $prod->id;?></td>
        <td><?= $prod->nombre;?></td>
        <td><?= $prod->descripcion;?></td>
        <td><?= $prod->precio;?></td>
        <td><?= $prod->categoria_id;?></td>
        <td><?= $prod->stock;?></td>
        <td><?= $prod->fecha;?></td>
        <td>
            <a href="<?=base_url?>producto/editar&id=<?=$prod->id?>" class="button button-gestion">Editar</a>
            <a href="<?=base_url?>producto/eliminar&id=<?=$prod->id?>" class="button button-gestion button-red">Eliminar</a>
        </td>
    </tr>
    <?php endwhile;?>
</table>
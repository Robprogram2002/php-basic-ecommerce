<h1>Carrito de la compra</h1>

<table>
    <tr>
        <th>Imagen</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Unidades</th>
        <th>Eliminar</th>
    </tr>
    <?php foreach ($carrito as $indice => $elemento):  
        $producto = $elemento['producto'];?>
        
    <tr>
        <td><img class="img_carrito" src="<?=base_url?>uploads/images/<?=$producto->imagen?>"></td>
        <td><a href="<?=base_url?>producto/ver&id=<?=$producto->id?>"><?=$producto->nombre?></a></td>
        <td><?=$producto->precio?></td>
        <td>
                <?=$elemento['unidades']?>
            <div class="updown-unidades">
                <a href="<?=base_url?>carrito/up&index=<?=$indice?>" class="button">+</a>
                <a href="<?=base_url?>carrito/down&index=<?=$indice?>" class="button">-</a>         
            </div>

        </td>
        <td><a href="<?=base_url?>carrito/remove&index=<?=$indice?>" class="button button-carrito button-red">Eliminar</a></td>
    </tr>
    
    <?php endforeach; ?>
        
</table>
<br>
<div class="delete-carrito">
<a href="<?=base_url?>carrito/deleteAll" class="button button-delete button-red">Vaciar carrito</a>
</div>
<div class="total-carrito">
    <?php $stats = Helpers::statsCarrito(); ?>
    <h3>Precio Total: <?=$stats['total']?>$</h3>
    <a href="<?=base_url?>pedido/hacer" class="button button-pedido">Hacer Pedido</a>
</div>
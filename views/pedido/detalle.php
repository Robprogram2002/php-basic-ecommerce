<h1>Detalle del pedido </h1>
<?php if (isset($pedido)): ?>
    <br>
    <h3>>> Informacion del Pedido</h3><br>
    <p><strong>Numero de Pedido: </strong> <?= $pedido->id ?>  </p>
    <p><strong>Total a pagar:</strong>  <?= $pedido->coste ?> $</p>
    <p><strong>Fecha y hora:</strong>  <?= $pedido->fecha ?>    /   <?=$pedido->hora?></p>
    <br>
    <h3>>> Detalles de envio</h3><br>
    <p><strong>Provincia: </strong> <?= $pedido->provincia ?>  </p>
    <p><strong>Localidad: </strong> <?= $pedido->localidad ?>  </p>
    <p><strong>Direccion: </strong> <?= $pedido->direccion ?>  </p><br>
    <h3>>> Productos incluidos en el pedido</h3><br>

    <table>
        <tr>
            <th>Imagen</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Unidades</th>
        </tr>
        <?php while ($producto = $productos->fetch_object()): ?>
            <tr>
                <td><img class="img_carrito" src="<?= base_url ?>uploads/images/<?= $producto->imagen ?>"></td>
                <td><a style="text-decoration: none;" href="<?= base_url ?>producto/ver&id=<?= $producto->id ?>"><?= $producto->nombre ?></a></td>
                <td><?= $producto->precio ?></td>
                <td><?= $producto->unidades ?></td>
            </tr>
        <?php endwhile; ?>
    </table>


<?php endif; ?>
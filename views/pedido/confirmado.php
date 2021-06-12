<?php if (isset($_SESSION['pedido']) && $_SESSION['pedido'] == 'complete'): ?>
    <h1>Tu pedido se ha completado</h1>
    <p>
        Tu pedido se ha completado de forma exitosa, una vez que realices 
        la transferencia bancaria con el coste del pedido, sera procesado y enviado
    </p>
    <?php if (isset($pedido)): ?>
    <br>
    <h3>Informacion del Pedido</h3><br>
        <p><strong>Numero de Pedido: </strong> <?= $pedido->id ?>  </p>
        <p><strong>Total a pagar:</strong>  <?= $pedido->coste ?> </p>
        <br>
        <h4>Productos incluidos en el pedido</h4><br>
        <?php while ($producto = $productos->fetch_object()): ?>
        <ul style="margin-left: 2rem">
                <li>
                    <p><strong>Nombre: </strong><?= $producto->nombre ?></p>
                    <p><strong>Precio: </strong><?= $producto->precio ?>  -  X<?= $producto->unidades ?></p><br>
                </li>
            </ul>
        <?php endwhile; ?>

    <?php endif; ?>


<?php elseif (isset($_SESSION['pedido']) && $_SESSION['pedido'] != 'complete'): ?>
    <h1>Tu pedido NO se ha completado con exito :(</h1>
<?php endif; ?>


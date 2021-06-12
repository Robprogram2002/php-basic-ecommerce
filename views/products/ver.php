<?php
if (!isset($one)) {
    header('Location:' . base_url);
}
?>

<h1><?= $one->nombre ?></h1>
<div id="detail-product">
    <div class="image" style="height: 500px; margin-bottom: 2rem; padding-bottom: 2rem;">
        <?php if ($one->imagen != null): ?>
            <img src="<?= base_url ?>uploads/images/<?= $one->imagen ?>">
        <?php else: ?>
            <img src="<?= base_url ?>assets/img/camiseta.png">
        <?php endif; ?>
    </div>
    <div class="data">
        <p class="description"><?= $one->descripcion ?></p>
        <p class="price"><?= $one->precio ?>$</p>
        <a href="<?=base_url?>carrito/add&id=<?=$pro->id?>" class="button">Comprar</a>        
    </div>

</div>



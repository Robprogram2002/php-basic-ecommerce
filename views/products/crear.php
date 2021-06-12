<?php if(isset($edit) && isset($one) && is_object($one)): ?>
<h1>Edita el producto "<?= $one->nombre?>"</h1>
<?php $url = base_url."producto/save&id=".$one->id; ?>

<?php else:?>
<h1>Añade un nuevo producto</h1>
<?php $url = base_url."producto/save"; ?>
<?php endif;?>

<form action="<?= $url?>" method="POST" enctype="multipart/form-data">
    <label for="nombre">Nombre: </label>
    <input type="text" name="nombre" value="<?= isset($one) && is_object($one) ? $one->nombre : ''; ?>"> 
    
    <label for="descripcion">Descripcion: </label>
    <input type="text" name="descripcion" value="<?= isset($one) && is_object($one) ? $one->descripcion : ''; ?>"> 
    
    <label for="categoria">Categoria: </label>
    <?php $categorias = Helpers::showCategoria(); ?>
    <select name="categoria">
        <?php while($cat = $categorias->fetch_object()): ?>
        <option value="<?=$cat->id?>" <?= isset($one) && is_object($one) && $cat->id == $one->categoria_id ? 'selected' : ''; ?>>
            <?=$cat->nombre?>
        </option>
        <?php endwhile; ?>
    </select>
    
    <label for="precio">Precio: </label>
    <input type="text" name="precio" value="<?= isset($one) && is_object($one) ? $one->precio : ''; ?>"> 
    
    <label for="stock">Stock: </label>
    <input type="number" name="stock" value="<?= isset($one) && is_object($one) ? $one->stock : ''; ?>"> 
    
    <label for="imagen">Imagen: </label>
    <?php if(isset($one) && is_object($one) && !empty($one->imagen)):?>
    <img src="<?=base_url?>uploads/images/<?=$one->imagen?>" class="thumb">
    <?php endif; ?>
    <input type="file" name="imagen"> 
    
    <input type="submit" value="Guardar">
</form>
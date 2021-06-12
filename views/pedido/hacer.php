<?php if(isset($_SESSION['identity'])): ?>
<h1>Hacer pedido</h1>
<p>
    <a href="<?=base_url?>carrito/index">Ver los productos</a>
</p>
<br>
<h3>Direccion para el envio:</h3>
<form action="<?=base_url?>pedido/add" method="POST">
    <label for="provincia">Provincia: </label>
    <input type="text" name="provincia" required="required">
    
    <label for="ciudad">Ciudad: </label>
    <input type="text" name="ciudad" required="required">
    
    <label for="direccion">Direccion: </label>
    <input type="text" name="direccion" required="required">
    
    <input type="submit" value="Confirmar pedido">
</form>





<?php else :?>
<h1>Identificate</h1>
<p>Necesitas estar logeado para realizar un pedido. Por favor, identificate</p>
<?php endif; ?>

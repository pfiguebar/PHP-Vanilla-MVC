<div class="header">
    <h2> <?= $respuesta['form']['title']; ?> </h2>
</div>
<form method="post" action="/editar_producto.php" enctype="multipart/form-data">
    <div>
        <img src="productos/pizza.jpg" alt="Pizza de Muzzarela">
        <label for="imagen">Imagen:</label>
        <input type="file" id="imagen" name="imagen" accept="image/*">
    </div>
    <div>
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" placeholder="Nombre del producto" autocomplete="off" value="Pizza de Muzzarela">
    </div>
    <div>
        <label>Categoria:</label>
        <div>
            <label><input type="checkbox" name="categoria" value="pizza" checked>Pizza</label>  
            <label><input type="checkbox" name="categoria" value="bebida">Bebida</label>                       
        </div>
    </div>
    <div>
        <label for="estado">Estado:</label>
        <select name="estado" id="estado">
            <option selected value="activo">Activo</option>
            <option value="inactivo">Inactivo</option>
        </select>
    </div>
    <div class="buttons">
        <button type="submit"> <?= $respuesta['form']['button']; ?> </button>
        <button type="button" onclick="window.location.href='/productos'">Cancelar</button>
    </div>
    
</form>     
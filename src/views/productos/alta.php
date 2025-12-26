<div class="header">
    <h2>Alta Producto</h2>
</div>
<form method="post" action="/alta_producto.php" enctype="multipart/form-data">
    <div>
        <label for="imagen">Imagen:</label>
        <input type="file" id="imagen" name="imagen" accept="image/*">
    </div>
    <div>
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" placeholder="Nombre del producto" autocomplete="off">
    </div>
    <div>
        <label>Categoria:</label>
        <div>
            <label><input type="checkbox" name="categoria" value="pizza">Pizza</label>  
            <label><input type="checkbox" name="categoria" value="bebida">Bebida</label>                       
        </div>
    </div>
    <div>
        <label for="estado">Estado:</label>
        <select name="estado" id="estado">
            <option value="activo">Activo</option>
            <option value="inactivo">Inactivo</option>
        </select>
    </div>
    <div class="buttons">
        <button type="submit">Agregar producto</button>
        <button type="button" onclick="window.location.href='/productos'">Cancelar</button>
    </div>
    
</form>   
<div class="header">
    <h2> <?= $respuesta['form']['title']; ?> </h2>
</div>
<form method="post" action="<?= $respuesta['form']['action']; ?>" enctype="multipart/form-data">
       
    <div>
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" placeholder="Nombre del producto" autocomplete="off" value="<?= isset($respuesta['form']['values']) ? $respuesta['form']['values']->getNombre() : ''; ?>">
    </div>
    
    <div>
        <label for="descripcion">Descripcion:</label>
        <input type="text" id="descripcion" name="descripcion" placeholder="Descripcion del producto" autocomplete="off" value="<?= isset($respuesta['form']['values']) ? $respuesta['form']['values']->getDescripcion() : ''; ?>">
    </div>

    <div>
        <label for="precio">Precio:</label>
        <input type="text" id="precio" name="precio" placeholder="Precio del producto" autocomplete="off" value="<?= isset($respuesta['form']['values']) ? $respuesta['form']['values']->getPrecio() : ''; ?>">
    </div>
     
    <div>
        <img src="productos/pizza.jpg" alt="Pizza de Muzzarela">
        <label for="imagen">Imagen:</label>
        <input type="file" id="imagen" name="imagen" accept="image/*">
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
            <option selected value="1">Activo</option>
            <option value="0">Inactivo</option>
        </select>
    </div>
    
    <div class="buttons">
        <button type="submit"> <?= $respuesta['form']['button']; ?> </button>
        <button type="button" onclick="window.location.href='/productos'">Cancelar</button>
    </div>
    
</form>     
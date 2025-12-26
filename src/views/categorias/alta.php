<div class="header">
    <h2>Alta Categorias</h2>
</div>
<form method="post" action="/alta_categoria.php">              
    <div>
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" placeholder="Nombre del producto" autocomplete="off">
    </div>               
    <div class="buttons">
        <button type="submit">Agregar Categoria</button>
        <button type="button" onclick="window.location.href='/categorias'">Cancelar</button>
    </div>
    
</form>     
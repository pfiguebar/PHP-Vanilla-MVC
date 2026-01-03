<div class="header">
    <h2> <?= $respuesta['form']['title']; ?> </h2>
</div>
<form method="post" action="<?= $respuesta['form']['action']; ?>">               
    <div>
        <label for="categoria">Categoria:</label>
        <input type="text" id="categoria" name="categoria" placeholder="Nombre de categoria" autocomplete="off" value="<?= isset($respuesta['form']['values']) ? $respuesta['form']['values']->getCategoria() : ''; ?>">
    </div>                
    <div class="buttons">
        <button type="submit"> <?= $respuesta['form']['button']; ?> </button>
        <button type="button" onclick="window.location.href='/categorias'">Cancelar</button>
    </div>
    
</form>   
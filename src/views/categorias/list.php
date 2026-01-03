<div class="header">
    <h2>Listado Categorias</h2>
    <a href="/categorias/new">Agregar Categoria</a>
</div>

<?php if (isset($_GET['error']) && $_GET['error'] === 'no-encontrado'): ?>
    <div class="error">
        Categoria no encontrada.
    </div>
<?php endif; ?>

<table>
    <thead>
        <tr>                        
            <th>Categoria</th>                                        
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>

        <?php foreach($respuesta['categorias'] as $c): ?>
        <tr>                       
            <td> <?= $c->getCategoria() ?> </td>                       
            <td>
                <a href="/categorias/<?= $c->getId() ?>/edit">Editar</a>
                <a href="/categorias/<?= $c->getId() ?>/delete">Eliminar</a>
            </td>
        </tr>
        <?php endforeach; ?>
      
    </tbody>
</table>
<div class="header">
    <h2>Listado Categorias</h2>
    <a href="/categorias/new">Agregar Categoria</a>
</div>
<table>
    <thead>
        <tr>                        
            <th>Nombre</th>                                        
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
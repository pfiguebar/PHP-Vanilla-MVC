<div class="header">
    <h2>Listado Productos</h2>
    <a href="/productos/new">Agregar Producto</a>
</div>

<?php if (isset($_GET['error']) && $_GET['error'] === 'no-encontrado'): ?>
    <div class="error">
        Producto no encontrado.
    </div>
<?php endif; ?>

<table>
    <thead>
        <tr>            
            <th>Producto</th>                            
            <th>Descripcion</th>
            <th>Precio</th>
            <th>Imagen</th>
            <th>Fecha Alta</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($respuesta['productos'] as $p): ?>
        <tr>                       
            <td> <?= $p->getProducto() ?> </td>  
            <td> <?= $p->getDescripcion() ?> </td>
            <td> <?= $p->getPrecio() ?> </td>
            <td> <img src="<?= $p->getImagen() ?>" alt="<?= $p->getProducto() ?>" width="50"> </td> 
            <td> <?= $p->getFechaAlta() ?> </td>
            <td> <?= $p->getEstado() ?> </td>                     
            <td>
                <a href="/productos/<?= $p->getId() ?>/edit">Editar</a>
                <a href="/productos/<?= $p->getId() ?>/delete">Eliminar</a>
            </td>
        </tr>
        <?php endforeach; ?>
       
    </tbody>
</table>     
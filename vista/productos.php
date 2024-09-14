<?php
require_once '../dbx.php';
require_once '../classes/Producto.php';

// Iniciar la sesión
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../login.php");
    exit();
}

?>
<div class="container">
    <h1 class="mt-4">Gestión de Productos</h1>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createProductModal">
        Nuevo Producto
    </button>
    
    <div id="resultado"></div>

    <table id="tabladatos" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Código</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Impuestos</th>
                <th>Número de Serie</th>
                <th>Stock</th>
                <th>Categoría ID</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody><!-- Las filas se llenarán con AJAX --></tbody>
    </table>

    <!-- Modal para crear producto -->
    <div class="modal fade" id="createProductModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Crear Producto</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="crearProductoForm">
                        <div class="mb-3">
                            <label for="codigoProducto" class="form-label">Código del Producto</label>
                            <input type="text" class="form-control" id="codigoProducto" name="codigoProducto" required>
                        </div>
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                        </div>
                        <div class="mb-3">
                            <label for="descripcion" class="form-label">Descripción</label>
                            <input type="text" class="form-control" id="descripcion" name="descripcion" required>
                        </div>
                        <div class="mb-3">
                            <label for="precio" class="form-label">Precio</label>
                            <input type="number" step="0.01" class="form-control" id="precio" name="precio" required>
                        </div>
                        <div class="mb-3">
                            <label for="impuestos" class="form-label">Impuestos</label>
                            <input type="number" step="0.01" class="form-control" id="impuestos" name="impuestos" required>
                        </div>
                        <div class="mb-3">
                            <label for="numeroSerie" class="form-label">Número de Serie</label>
                            <input type="text" class="form-control" id="numeroSerie" name="numeroSerie" required>
                        </div>
                        <div class="mb-3">
                            <label for="stock" class="form-label">Stock</label>
                            <input type="number" class="form-control" id="stock" name="stock" required>
                        </div>
                        <div class="mb-3">
                            <label for="categoriaId" class="form-label">ID de Categoría</label>
                            <select class="form-control" id="categoriaId" name="categoriaId" required>
                                <!-- Las opciones se cargarán aquí dinámicamente -->
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Guardar Producto</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para editar producto -->
    <div class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="editProductModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editProductModalLabel">Editar Producto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editProductoForm">
                        <input type="text" id="editCodigoProducto" name="editCodigoProducto">
                        <div class="mb-3">
                            <label for="editNombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="editNombre" name="editNombre" required>
                        </div>
                        <div class="mb-3">
                            <label for="editDescripcion" class="form-label">Descripción</label>
                            <input type="text" class="form-control" id="editDescripcion" name="editDescripcion" required>
                        </div>
                        <div class="mb-3">
                            <label for="editPrecio" class="form-label">Precio</label>
                            <input type="number" step="0.01" class="form-control" id="editPrecio" name="editPrecio" required>
                        </div>
                        <div class="mb-3">
                            <label for="editImpuestos" class="form-label">Impuestos</label>
                            <input type="number" step="0.01" class="form-control" id="editImpuestos" name="editImpuestos" required>
                        </div>
                        <div class="mb-3">
                            <label for="editNumeroSerie" class="form-label">Número de Serie</label>
                            <input type="text" class="form-control" id="editNumeroSerie" name="editNumeroSerie" required>
                        </div>
                        <div class="mb-3">
                            <label for="editStock" class="form-label">Stock</label>
                            <input type="number" class="form-control" id="editStock" name="editStock" required>
                        </div>
                        <div class="mb-3">
                            <label for="editCategoriaId" class="form-label">Categoría</label>
                            <select class="form-control" id="editCategoriaId" name="editCategoriaId" required>
                                <!-- Las opciones se cargarán aquí dinámicamente -->
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Actualizar Producto</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<script src="js/productos.js"></script>

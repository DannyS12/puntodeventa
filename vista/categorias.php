<?php
require_once '../dbx.php';
require_once '../classes/Categoria.php';

// Iniciar la sesión
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../login.php");
    exit();
}

?>
<div class="container">
    <h1 class="mt-4">Gestión de Categorías</h1>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createCategoryModal">
        Nuevo
    </button>
    <!-- <form id="crearCategoriaForm">
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre de la Categoría</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
        <button type="submit" class="btn btn-primary">Crear Categoría</button>
    </form> -->
    <div id="resultado"></div>
    <!-- <div id="listado-categorias"></div> -->
    <table id="tabladatos" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody><!-- Las filas se llenarán con AJAX --></tbody>
    </table>

    <div class="modal fade" id="createCategoryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="crearCategoriaForm">
                        <div class="mb-3">
                            <label for="createCategoryName" class="form-label">Nombre de la Categoría</label>
                            <input type="text" class="form-control" id="nombre" name="nombre}" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar Categoría</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editCategoryModal" tabindex="-1" aria-labelledby="editCategoryModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editCategoryModalLabel">Editar Categoría</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editCategoryForm">
                        <div class="mb-3">
                            <label for="editCategoryName" class="form-label">Nombre de la Categoría</label>
                            <input type="text" class="form-control" id="editCategoryName" name="editCategoryName" required>
                            <input type="hidden" id="editCategoryId" name="editCategoryId">
                        </div>
                        <button type="submit" class="btn btn-primary">Actualizar Categoría</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<script src="js/categorias.js"></script>
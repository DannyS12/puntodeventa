<?php
require_once '../dbx.php';
require_once '../classes/Banco.php';

// Iniciar la sesión
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../login.php");
    exit();
}

?>
<div class="container">
    <h1 class="mt-4">Gestión de Bancos</h1>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createBankModal">
        Nuevo
    </button>
    <div id="resultado"></div>
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

    <div class="modal fade" id="createBankModal" tabindex="-1" aria-labelledby="createBankModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createBankModalLabel">Crear Nuevo Banco</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="crearBancoForm">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre del Banco</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar Banco</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editBankModal" tabindex="-1" aria-labelledby="editBankModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editBankModalLabel">Editar Banco</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editBankForm">
                        <div class="mb-3">
                            <label for="editBankName" class="form-label">Nombre del Banco</label>
                            <input type="text" class="form-control" id="editBankName" name="editBankName" required>
                            <input type="hidden" id="editBankId" name="editBankId">
                        </div>
                        <button type="submit" class="btn btn-primary">Actualizar Banco</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<script src="js/bancos.js"></script>
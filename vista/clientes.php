<?php
require_once '../dbx.php';
require_once '../classes/Cliente.php';

// Iniciar la sesión
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../login.php");
    exit();
}

?>
<div class="container">
    <h1 class="mt-4">Gestión de Clientes</h1>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createClientModal">
        Nuevo
    </button>
    <div id="resultado"></div>
    <table id="tabladatos" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>Email</th>
                <th>Sexo</th>
                <th>NIT</th>
                <th>CUI</th>
                <th>Seguro Médico</th>
                <th>Número de Póliza</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody><!-- Las filas se llenarán con AJAX --></tbody>
    </table>

    <div class="modal fade" id="createClientModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo Cliente</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="crearClienteForm">
                        <div class="mb-3">
                            <label for="createClientName" class="form-label">Nombre del Cliente</label>
                            <input type="text" class="form-control" id="createClientName" name="createClientName" required>
                        </div>
                        <div class="mb-3">
                            <label for="createClientAddress" class="form-label">Dirección</label>
                            <input type="text" class="form-control" id="createClientAddress" name="createClientAddress" required>
                        </div>
                        <div class="mb-3">
                            <label for="createClientPhone" class="form-label">Teléfono</label>
                            <input type="text" class="form-control" id="createClientPhone" name="createClientPhone" required>
                        </div>
                        <div class="mb-3">
                            <label for="createClientEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="createClientEmail" name="createClientEmail" required>
                        </div>
                        <div class="mb-3">
                            <label for="createClientSex" class="form-label">Sexo</label>
                            <select class="form-control" id="createClientSex" name="createClientSex" required>
                                <option value="M">Masculino</option>
                                <option value="F">Femenino</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="createClientNIT" class="form-label">NIT</label>
                            <input type="text" class="form-control" id="createClientNIT" name="createClientNIT" required>
                        </div>
                        <div class="mb-3">
                            <label for="createClientCUI" class="form-label">CUI</label>
                            <input type="text" class="form-control" id="createClientCUI" name="createClientCUI" required>
                        </div>
                        <div class="mb-3">
                            <label for="createClientInsurance" class="form-label">Seguro Médico</label>
                            <input type="text" class="form-control" id="createClientInsurance" name="createClientInsurance" required>
                        </div>
                        <div class="mb-3">
                            <label for="createClientPolicyNumber" class="form-label">Número de Póliza</label>
                            <input type="text" class="form-control" id="createClientPolicyNumber" name="createClientPolicyNumber" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar Cliente</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary">Guardar cambios</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editClientModal" tabindex="-1" aria-labelledby="editClientModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editClientModalLabel">Editar Cliente</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editClientForm">
                        <div class="mb-3">
                            <label for="editClientName" class="form-label">Nombre del Cliente</label>
                            <input type="text" class="form-control" id="editClientName" name="editClientName" required>
                        </div>
                        <div class="mb-3">
                            <label for="editClientAddress" class="form-label">Dirección</label>
                            <input type="text" class="form-control" id="editClientAddress" name="editClientAddress" required>
                        </div>
                        <div class="mb-3">
                            <label for="editClientPhone" class="form-label">Teléfono</label>
                            <input type="text" class="form-control" id="editClientPhone" name="editClientPhone" required>
                        </div>
                        <div class="mb-3">
                            <label for="editClientEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="editClientEmail" name="editClientEmail" required>
                        </div>
                        <div class="mb-3">
                            <label for="editClientSex" class="form-label">Sexo</label>
                            <select class="form-control" id="editClientSex" name="editClientSex" required>
                                <option value="M">Masculino</option>
                                <option value="F">Femenino</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="editClientNIT" class="form-label">NIT</label>
                            <input type="text" class="form-control" id="editClientNIT" name="editClientNIT" required>
                        </div>
                        <div class="mb-3">
                            <label for="editClientCUI" class="form-label">CUI</label>
                            <input type="text" class="form-control" id="editClientCUI" name="editClientCUI" required>
                        </div>
                        <div class="mb-3">
                            <label for="editClientInsurance" class="form-label">Seguro Médico</label>
                            <input type="text" class="form-control" id="editClientInsurance" name="editClientInsurance" required>
                        </div>
                        <div class="mb-3">
                            <label for="editClientPolicyNumber" class="form-label">Número de Póliza</label>
                            <input type="text" class="form-control" id="editClientPolicyNumber" name="editClientPolicyNumber" required>
                        </div>
                        <input type="hidden" id="editClientId" name="editClientId">
                        <button type="submit" class="btn btn-primary">Actualizar Cliente</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<script src="js/clientes.js"></script>

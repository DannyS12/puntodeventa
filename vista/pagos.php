<?php
require_once '../dbx.php';
require_once '../classes/Pago.php';

// Iniciar la sesión
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../login.php");
    exit();
}
?>

<div class="container">
    <h1 class="mt-4">Gestión de Pagos</h1>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createPaymentModal">
        Nuevo Pago
    </button>
    
    <div id="resultado"></div>

    <table id="tabladatos" class="display" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Venta ID</th>
                <th>Fecha</th>
                <th>Forma de Pago</th>
                <th>Monto</th>
                <th>Saldo Pendiente</th>
                <th>Banco ID</th>
                <th>Número de Referencia</th>
                <th>Usuario ID</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody><!-- Las filas se llenarán con AJAX --></tbody>
    </table>

    <!-- Modal para crear pago -->
    <div class="modal fade" id="createPaymentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Crear Pago</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="crearPagoForm">
                        <div class="mb-3">
                            <label for="ventaId" class="form-label">Venta ID</label>
                            <input type="number" class="form-control" id="ventaId" name="ventaId" required>
                        </div>
                        <div class="mb-3">
                            <label for="fecha" class="form-label">Fecha</label>
                            <input type="date" class="form-control" id="fecha" name="fecha" required>
                        </div>
                        <div class="mb-3">
                            <label for="formaPago" class="form-label">Forma de Pago</label>
                            <select class="form-control" id="formaPago" name="formaPago" required>
                                <option value="bancos">Bancos</option>
                                <option value="efectivo">Efectivo</option>
                                <option value="deposito">Depósito</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="monto" class="form-label">Monto</label>
                            <input type="number" step="0.01" class="form-control" id="monto" name="monto" required>
                        </div>
                        <div class="mb-3">
                            <label for="saldoPendiente" class="form-label">Saldo Pendiente</label>
                            <input type="number" step="0.01" class="form-control" id="saldoPendiente" name="saldoPendiente" required>
                        </div>
                        <div class="mb-3">
                            <label for="bancoId" class="form-label">Banco ID</label>
                            <select class="form-control" id="bancoId" name="bancoId" required>
                                <!-- Las opciones se cargarán aquí dinámicamente -->
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="numeroReferencia" class="form-label">Número de Referencia</label>
                            <input type="text" class="form-control" id="numeroReferencia" name="numeroReferencia">
                        </div>
                        <div class="mb-3">
                        <label for="usuarioId" class="form-label">Usuario</label>
                            <select class="form-control" id="usuarioId" name="usuarioId" required>
                                <!-- Las opciones se cargarán aquí dinámicamente -->
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Guardar Pago</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para editar pago -->
    <div class="modal fade" id="editPaymentModal" tabindex="-1" aria-labelledby="editPaymentModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editPaymentModalLabel">Editar Pago</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editPagoForm">
                        <input type="hidden" id="editPagoId" name="editPagoId">
                        <div class="mb-3">
                            <label for="editVentaId" class="form-label">Venta ID</label>
                            <input type="number" class="form-control" id="editVentaId" name="editVentaId" required>
                        </div>
                        <div class="mb-3">
                            <label for="editFecha" class="form-label">Fecha</label>
                            <input type="date" class="form-control" id="editFecha" name="editFecha" required>
                        </div>
                        <div class="mb-3">
                            <label for="editFormaPago" class="form-label">Forma de Pago</label>
                            <select class="form-control" id="editFormaPago" name="editFormaPago" required>
                                <option value="bancos">Bancos</option>
                                <option value="efectivo">Efectivo</option>
                                <option value="deposito">Depósito</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="editMonto" class="form-label">Monto</label>
                            <input type="number" step="0.01" class="form-control" id="editMonto" name="editMonto" required>
                        </div>
                        <div class="mb-3">
                            <label for="editSaldoPendiente" class="form-label">Saldo Pendiente</label>
                            <input type="number" step="0.01" class="form-control" id="editSaldoPendiente" name="editSaldoPendiente" required>
                        </div>
                        <div class="mb-3">
                            <label for="editBancoId" class="form-label">Banco ID</label>
                            <select class="form-control" id="editBancoId" name="editBancoId" required>
                                <!-- Las opciones se cargarán aquí dinámicamente -->
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="editNumeroReferencia" class="form-label">Número de Referencia</label>
                            <input type="text" class="form-control" id="editNumeroReferencia" name="editNumeroReferencia">
                        </div>
                        <div class="mb-3">
                            <label for="editUsuarioId" class="form-label">Usuario</label>
                            <select class="form-control" id="editUsuarioId" name="editUsuarioId" required>
                                <!-- Las opciones se cargarán aquí dinámicamente -->
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Actualizar Pago</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="js/pagos.js"></script>

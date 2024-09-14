$(document).ready(function() {
    // Inicializar DataTable
    $('#tabladatos').DataTable({
        "language": {
            "url": "json/es_es.json"
        },
        lengthMenu: [
            [10, 20, 50, -1],
            [10, 20, 50, "Todos"]
        ],
    });

    // Función para cargar pagos
    function cargarPagos() {
        $.ajax({
            url: '../ajax/pago_listar.php',  // Archivo que lista los pagos
            type: 'GET',
            success: function(data) {
                $('#tabladatos tbody').html(data);
                $('#tabladatos').DataTable();
            },
            error: function(xhr, status, error) {
                console.error('Error al cargar los pagos:', error);
            }
        });
    }

    // Cargar pagos al inicio
    cargarPagos();

    // Formulario para crear pagos
    $("#crearPagoForm").on("submit", function(e) {
        e.preventDefault();
        let ventaId = $("#ventaId").val();
        let fecha = $("#fecha").val();
        let formaPago = $("#formaPago").val();
        let monto = $("#monto").val();
        let saldoPendiente = $("#saldoPendiente").val();
        let bancoId = $("#bancoId").val();
        let numeroReferencia = $("#numeroReferencia").val();
        let usuarioId = $("#usuarioId").val();

        $.ajax({
            type: "POST",
            url: "../ajax/pago_crear.php",  // Archivo que crea un pago
            data: { 
                ventaId: ventaId,
                fecha: fecha,
                formaPago: formaPago,
                monto: monto,
                saldoPendiente: saldoPendiente,
                bancoId: bancoId,
                numeroReferencia: numeroReferencia,
                usuarioId: usuarioId,
                crear: true
            },
            success: function(response) {
                $('#resultado').html(response);
                $('#crearPagoForm')[0].reset();
                $('#createPagoModal').modal('hide');
                cargarPagos();
            },
            error: function() {
                alert("Ocurrió un error al procesar la solicitud.");
            }
        });
    });

    // Abrir modal para editar pagos
    $('#tabladatos').on('click', '.btn-editar', function() {
        var id = $(this).data('id');
        var ventaId = $(this).data('ventaid');
        var fecha = $(this).data('fecha');
        var formaPago = $(this).data('formapago');
        var monto = $(this).data('monto');
        var saldoPendiente = $(this).data('saldopendiente');
        var bancoId = $(this).data('bancoid');
        var numeroReferencia = $(this).data('numeroreferencia');
        var usuarioId = $(this).data('usuarioid');

        $('#editId').val(id);
        $('#editVentaId').val(ventaId);
        $('#editFecha').val(fecha);
        $('#editFormaPago').val(formaPago);
        $('#editMonto').val(monto);
        $('#editSaldoPendiente').val(saldoPendiente);
        $('#editBancoId').val(bancoId);
        $('#editNumeroReferencia').val(numeroReferencia);
        $('#editUsuarioId').val(usuarioId);

        $('#editPagoModal').modal('show');
    });

    // Formulario para editar pagos
    $("#editPagoForm").on("submit", function(e) {
        e.preventDefault();
        let id = $("#editId").val();
        let ventaId = $("#editVentaId").val();
        let fecha = $("#editFecha").val();
        let formaPago = $("#editFormaPago").val();
        let monto = $("#editMonto").val();
        let saldoPendiente = $("#editSaldoPendiente").val();
        let bancoId = $("#editBancoId").val();
        let numeroReferencia = $("#editNumeroReferencia").val();
        let usuarioId = $("#editUsuarioId").val();

        $.ajax({
            type: "POST",
            url: "../ajax/pago_actualizar.php",  // Archivo que actualiza un pago
            data: { 
                id: id,
                ventaId: ventaId,
                fecha: fecha,
                formaPago: formaPago,
                monto: monto,
                saldoPendiente: saldoPendiente,
                bancoId: bancoId,
                numeroReferencia: numeroReferencia,
                usuarioId: usuarioId,
                actualizar: true
            },
            success: function(response) {
                alert("Pago actualizado correctamente");
                $('#editPagoForm')[0].reset();
                $('#editPagoModal').modal('hide');
                $('#resultado').html(response);
                cargarPagos();
            },
            error: function() {
                alert("Ocurrió un error al actualizar el pago.");
            }
        });
    });

    // Eliminar pagos
    $("#tabladatos").on("click", ".btn-eliminar", function() {
        var id = $(this).data('id');
    
        if (confirm("¿Estás seguro de que quieres eliminar este pago?")) {
            $.ajax({
                type: "POST",
                url: "../ajax/pago_eliminar.php",  // Archivo que elimina un pago
                data: { id: id, eliminar: true },
                success: function(response) {
                    $('#resultado').html(response);
                    cargarPagos(); // Recargar la tabla de pagos
                },
                error: function() {
                    alert("Ocurrió un error al eliminar el pago.");
                }
            });
        }
    });

    // Cargar opciones para categorías (u otros datos relevantes)
    $(document).ready(function() {
        // Cargar formas de pago, bancos, etc., según sea necesario
        $.ajax({
            url: '../ajax/pago_actualizar.php',  // Ruta que carga bancos
            type: "GET",
            success: function(data) {
                $('#editBancoId ').html(data);  // Colocar las opciones en el select
            },
            error: function(xhr, status, error) {
                console.error("Error al cargar los bancos:", error);
            }
        });

        $.ajax({
            url: '../ajax/pago_crear.php',  // Ruta que carga bancos
            type: "GET",
            success: function(data) {
                $('#bancoId').html(data);  // Colocar las opciones en el select
            },
            error: function(xhr, status, error) {
                console.error("Error al cargar los bancos:", error);
            }
        });
    });
    
    $(document).ready(function() {
        // Cargar usuarios en el select
        $.ajax({
            url: '../ajax/usuario_listar.php',
            type: 'GET',
            success: function(data) {
                $('#usuarioId').html(data);
            },
            error: function(xhr, status, error) {
                console.error('Error al cargar los usuarios:', error);
            }
        });
        $.ajax({
            url: '../ajax/usuario_listar.php',
            type: 'GET',
            success: function(data) {
                $('#editUsuarioId').html(data);
            },
            error: function(xhr, status, error) {
                console.error('Error al cargar los usuarios:', error);
            }
        });
    });
});

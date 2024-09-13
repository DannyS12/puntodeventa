$(document).ready(function() {
   
    $('#tabladatos').DataTable({
        "language": {
            "url": "json/es_es.json"
        },
        lengthMenu: [
            [10, 20, 50, -1],
            [10, 20, 50, "Todos"]
        ],         
    });

    function cargarClientes() {
        $.ajax({
            url: '../ajax/cliente_listar.php',
            type: 'GET',
            success: function(data) {
                $('#tabladatos tbody').html(data);
                $('#tabladatos').DataTable();
            },
            error: function(xhr, status, error) {
                console.error('Error al cargar los clientes:', error);
            }
        });
    }

    cargarClientes();

    $("#crearClienteForm").on("submit", function(e) {
        e.preventDefault(); 
        let nombre = $("#createClientName").val();
        let direccion = $("#createClientAddress").val();
        let telefono = $("#createClientPhone").val();
        let email = $("#createClientEmail").val();
        let sexo = $("#createClientSex").val();
        let nit = $("#createClientNIT").val();
        let cui = $("#createClientCUI").val();
        let seguroMedico = $("#createClientInsurance").val();
        let numeroPoliza = $("#createClientPolicyNumber").val();

        $.ajax({
            type: "POST",
            url: "../ajax/cliente_crear.php",
            data: {
                nombre: nombre,
                direccion: direccion,
                telefono: telefono,
                email: email,
                sexo: sexo,
                nit: nit,
                cui: cui,
                seguroMedico: seguroMedico,
                numeroPoliza: numeroPoliza,
                crear: true
            },
            success: function(response) {
                $('#resultado').html(response);
                $('#crearClienteForm')[0].reset();
                $('#createClientModal').modal('hide');
                cargarClientes();
            },
            error: function() {
                alert("Ocurrió un error al procesar la solicitud.");
            }
        });
    });
    
    $('#tabladatos').on('click', '.btn-editar', function() {
        console.log($(this).data('seguroMedico')); 
        var id = $(this).data('id');
        var nombre = $(this).data('nombre');
        var direccion = $(this).data('direccion');
        var telefono = $(this).data('telefono');
        var email = $(this).data('email');
        var sexo = $(this).data('sexo');
        var nit = $(this).data('nit');
        var cui = $(this).data('cui');
        var seguroMedico = $(this).data('seguro');
        var numeroPoliza = $(this).data('poliza');
        
        $('#editClientId').val(id);
        $('#editClientName').val(nombre);
        $('#editClientAddress').val(direccion);
        $('#editClientPhone').val(telefono);
        $('#editClientEmail').val(email);
        $('#editClientSex').val(sexo);
        $('#editClientNIT').val(nit);
        $('#editClientCUI').val(cui);
        $('#editClientInsurance').val(seguroMedico);
        $('#editClientPolicyNumber').val(numeroPoliza);
        $('#editClientModal').modal('show');
    });

    $("#editClientForm").on("submit", function(e) {
        e.preventDefault();
        let id = $("#editClientId").val();
        let nombre = $("#editClientName").val();
        let direccion = $("#editClientAddress").val();
        let telefono = $("#editClientPhone").val();
        let email = $("#editClientEmail").val();
        let sexo = $("#editClientSex").val();
        let nit = $("#editClientNIT").val();
        let cui = $("#editClientCUI").val();
        let seguroMedico = $("#editClientInsurance").val();
        let numeroPoliza = $("#editClientPolicyNumber").val();
    
        $.ajax({
            type: "POST",
            url: "../ajax/cliente_actualizar.php",
            data: {
                id: id,
                nombre: nombre,
                direccion: direccion,
                telefono: telefono,
                email: email,
                sexo: sexo,
                nit: nit,
                cui: cui,
                seguroMedico: seguroMedico,
                numeroPoliza: numeroPoliza,
                actualizar: true
            },
            success: function(response) {
                alert("Cliente actualizado correctamente");
                $('#editClientForm')[0].reset();
                $('#editClientModal').modal('hide'); // Cerrar el modal después de actualizar
                $('#resultado').html(response);
                cargarClientes(); // Recargar la tabla de clientes
            },
            error: function() {
                alert("Ocurrió un error al actualizar el cliente.");
            }
        });
    });

    $("#tabladatos").on("click", ".btn-eliminar", function() {
        let id = $(this).data("id");
    
        if (confirm("¿Estás seguro de que quieres eliminar este cliente?")) {
            $.ajax({
                type: "POST",
                url: "../ajax/cliente_eliminar.php",
                data: { id: id, eliminar: true },
                success: function(response) {
                    $('#resultado').html(response);
                    cargarClientes(); // Recargar la tabla de clientes
                },
                error: function() {
                    alert("Ocurrió un error al eliminar el cliente.");
                }
            });
        }
    });
});

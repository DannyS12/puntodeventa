$(document).ready(function() {
    function cargarBancos() {
        if ($.fn.DataTable.isDataTable('#tabladatos')) {
            $('#tabladatos').DataTable().destroy();
        }
    
        $.ajax({
            url: '../ajax/banco_listar.php',
            type: 'GET',
            success: function(data) {
                $('#tabladatos tbody').html(data);
    
                $('#tabladatos').DataTable({
                    "language": {
                        "url": "json/es_es.json"
                    },
                    lengthMenu: [
                        [10, 20, 50, -1],
                        [10, 20, 50, "Todos"]
                    ]
                });
            },
            error: function(xhr, status, error) {
                console.error('Error al cargar los bancos:', error);
            }
        });
    }

    cargarBancos();

    $("#crearBancoForm").on("submit", function(e) {
        e.preventDefault(); 
        let nombre = $("#nombre").val();

        $.ajax({
            type: "POST",
            url: "../ajax/banco_crear.php",
            data: { nombre: nombre, crear: true },
            success: function(response) {
                $('#resultado').html(response);
                $('#crearBancoForm')[0].reset();
                $('#createBankModal').modal('hide');
                cargarBancos();
            },
            error: function() {
                alert("Ocurrió un error al procesar la solicitud.");
            }
        });
    });
    
    $('#tabladatos').on('click', '.btn-editar', function() {
        var id = $(this).data('id');
        var nombre = $(this).data('nombre');
        $('#editBankId').val(id);
        $('#editBankName').val(nombre);
        $('#editBankModal').modal('show');
    });

    $("#editBankForm").on("submit", function(e) {
        e.preventDefault();
        let id = $("#editBankId").val();
        let nombre = $("#editBankName").val();
    
        $.ajax({
            type: "POST",
            url: "../ajax/banco_actualizar.php",
            data: { id: id, nombre: nombre, actualizar: true },
            success: function(response) {
                alert("Banco actualizado correctamente");
                $('#editBankForm')[0].reset();
                $('#editBankModal').modal('hide'); 
                $('#resultado').html(response);
                cargarBancos(); 
            },
            error: function() {
                alert("Ocurrió un error al actualizar el banco.");
            }
        });
    });

    $("#tabladatos").on("click", ".btn-eliminar", function() {
        let id = $(this).data("id");
    
        if (confirm("¿Estás seguro de que quieres eliminar este banco?")) {
            $.ajax({
                type: "POST",
                url: "../ajax/banco_eliminar.php",
                data: { id: id, eliminar: true },
                success: function(response) {
                    $('#resultado').html(response);
                    cargarBancos(); 
                },
                error: function() {
                    alert("Ocurrió un error al eliminar el banco.");
                }
            });
        }
    });
});
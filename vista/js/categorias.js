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

    function cargarCategorias() {
        $.ajax({
            url: '../ajax/categoria_listar.php',
            type: 'GET',
            success: function(data) {
                $('#tabladatos tbody').html(data);
                $('#tabladatos').DataTable();
            },
            error: function(xhr, status, error) {
                console.error('Error al cargar las categorías:', error);
            }
        });
    }

    cargarCategorias();

    $("#crearCategoriaForm").on("submit", function(e) {
        e.preventDefault(); 
        let nombre = $("#nombre").val();

        $.ajax({
            type: "POST",
            url: "../ajax/categoria_crear.php",
            data: { nombre: nombre, crear: true },
            success: function(response) {
                $('#resultado').html(response);
                $('#crearCategoriaForm')[0].reset();
                $('#createCategoryModal').modal('hide');
                cargarCategorias();
            },
            error: function() {
                alert("Ocurrió un error al procesar la solicitud.");
            }
        });
    });
    
    $('#tabladatos').on('click', '.btn-editar', function() {
        var id = $(this).data('id');
        var nombre = $(this).data('nombre');
        $('#editCategoryId').val(id);
        $('#editCategoryName').val(nombre);
        $('#editCategoryModal').modal('show');
    });

    $("#editCategoryForm").on("submit", function(e) {
        e.preventDefault();
        let id = $("#editCategoryId").val();
        let nombre = $("#editCategoryName").val();
    
        $.ajax({
            type: "POST",
            url: "../ajax/categoria_actualizar.php",
            data: { id: id, nombre: nombre, actualizar: true },
            success: function(response) {
                alert("Categoría actualizada correctamente");
                $('#editCategoryForm')[0].reset();
                $('#editCategoryModal').modal('hide'); // Cerrar el modal después de actualizar
                $('#resultado').html(response);
                cargarCategorias(); // Recargar la tabla de categorías
            },
            error: function() {
                alert("Ocurrió un error al actualizar la categoría.");
            }
        });
    });

    $("#tabladatos").on("click", ".btn-eliminar", function() {
        let id = $(this).data("id");
    
        if (confirm("¿Estás seguro de que quieres eliminar esta categoría?")) {
            $.ajax({
                type: "POST",
                url: "../ajax/categoria_eliminar.php",
                data: { id: id, eliminar: true },
                success: function(response) {
                    $('#resultado').html(response);
                    cargarCategorias(); // Recargar la tabla de categorías
                },
                error: function() {
                    alert("Ocurrió un error al eliminar la categoría.");
                }
            });
        }
    });
});


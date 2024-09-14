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

    // Función para cargar productos
    function cargarProductos() {
        $.ajax({
            url: '../ajax/producto_listar.php',
            type: 'GET',
            success: function(data) {
                $('#tabladatos tbody').html(data);
                $('#tabladatos').DataTable();
            },
            error: function(xhr, status, error) {
                console.error('Error al cargar los productos:', error);
            }
        });
    }

    // Cargar productos al inicio
    cargarProductos();

    // Formulario para crear productos
    $("#crearProductoForm").on("submit", function(e) {
        e.preventDefault();
        let codigoProducto = $("#codigoProducto").val();
        let nombre = $("#nombre").val();
        let descripcion = $("#descripcion").val();
        let precio = $("#precio").val();
        let impuestos = $("#impuestos").val();
        let numeroSerie = $("#numeroSerie").val();
        let stock = $("#stock").val();
        let categoriaId = $("#categoriaId").val();

        $.ajax({
            type: "POST",
            url: "../ajax/producto_crear.php",
            data: { 
                codigoProducto: codigoProducto,
                nombre: nombre,
                descripcion: descripcion,
                precio: precio,
                impuestos: impuestos,
                numeroSerie: numeroSerie,
                stock: stock,
                categoriaId: categoriaId,
                crear: true
            },
            success: function(response) {
                $('#resultado').html(response);
                $('#crearProductoForm')[0].reset();
                $('#createProductModal').modal('hide');
                cargarProductos();
            },
            error: function() {
                alert("Ocurrió un error al procesar la solicitud.");
            }
        });
    });






    
    // Abrir modal para editar productos
    $('#tabladatos').on('click', '.btn-editar', function() {
        var codigoProducto = $(this).data('codigoproducto');
        var nombre = $(this).data('nombre');
        var descripcion = $(this).data('descripcion');
        var precio = $(this).data('precio');
        var impuestos = $(this).data('impuestos');
        var numeroSerie = $(this).data('numeroserie');
        var stock = $(this).data('stock');
        var categoriaId = $(this).data('categoriaid');

        $('#editCodigoProducto').val(codigoProducto);
        $('#editNombre').val(nombre);
        $('#editDescripcion').val(descripcion);
        $('#editPrecio').val(precio);
        $('#editImpuestos').val(impuestos);
        $('#editNumeroSerie').val(numeroSerie);
        $('#editStock').val(stock);
        $('#editCategoriaId').val(categoriaId);

        $('#editProductModal').modal('show');
    });

    // Formulario para editar productos
    $("#editProductoForm").on("submit", function(e) {
        e.preventDefault();
        let codigoProducto = $("#editCodigoProducto").val();
        let nombre = $("#editNombre").val();
        let descripcion = $("#editDescripcion").val();
        let precio = $("#editPrecio").val();
        let impuestos = $("#editImpuestos").val();
        let numeroSerie = $("#editNumeroSerie").val();
        let stock = $("#editStock").val();
        let categoriaId = $("#editCategoriaId").val();

        $.ajax({
            type: "POST",
            url: "../ajax/producto_actualizar.php",
            data: { 
                codigoProducto: codigoProducto,
                nombre: nombre,
                descripcion: descripcion,
                precio: precio,
                impuestos: impuestos,
                numeroSerie: numeroSerie,
                stock: stock,
                categoriaId: categoriaId,
                actualizar: true
            },
            success: function(response) {
                alert("Producto actualizado correctamente");
                $('#editProductoForm')[0].reset();
                $('#editProductModal').modal('hide');
                $('#resultado').html(response);
                cargarProductos();
            },
            error: function() {
                alert("Ocurrió un error al actualizar el producto.");
            }
        });
    });

    // Eliminar productos
    $("#tabladatos").on("click", ".btn-eliminar", function() {
        var codigoProducto = $(this).data('codigoproducto');
    
        if (confirm("¿Estás seguro de que quieres eliminar esta categoría?")) {
            $.ajax({
                type: "POST",
                url: "../ajax/producto_eliminar.php",
                data: { codigoProducto: codigoProducto, eliminar: true },
                success: function(response) {
                    $('#resultado').html(response);
                    cargarProductos(); // Recargar la tabla de categorías
                },
                error: function() {
                    alert("Ocurrió un error al eliminar la categoría.");
                }
            });
        }
    });

    $(document).ready(function() {
        // Cargar categorías en el select
        $.ajax({
            url: '../ajax/producto_actualizar.php',  // Ruta a tu archivo PHP que carga las categorías
            type: "GET",
            success: function(data) {
                $('#editCategoriaId').html(data);  // Colocar las opciones en el select
            },
            error: function(xhr, status, error) {
                console.error("Error al cargar las categorías:", error);
            }
        });
    });

    $(document).ready(function() {
        // Cargar categorías en el select
        $.ajax({
            url: '../ajax/producto_crear.php',  // Ruta a tu archivo PHP que carga las categorías
            type: "GET",
            success: function(data) {
                $('#categoriaId').html(data);  // Colocar las opciones en el select
            },
            error: function(xhr, status, error) {
                console.error("Error al cargar las categorías:", error);
            }
        });
    });
    

});

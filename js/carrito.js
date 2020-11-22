$(document).ready(function() {
    $('#carrito-compras-tienda').load("process/carrito.php");
    $(".botonCarrito").click(function(){
        $('#carrito-compras-tienda').load("process/carrito.php?precio="+$(this).val());
        $('.modal-carrito').modal('show');
    });
    $(".carrito-button-nav").click(function(){
        $("#container-carrito-compras").animate({height: 'toggle'},200);
    });
});

function quitar(id) {
    $('#carrito-compras-tienda').load("process/carrito.php?precio="+id+'&accion=quitar');
}

function agregar(id) {
    $('#carrito-compras-tienda').load("process/carrito.php?precio="+id+'&accion=agregar');

}

function eliminar(id) {
    $('#carrito-compras-tienda').load("process/carrito.php?precio="+id+'&accion=eliminar');
    toastr.success('Eliminado del carrito correctamente')
}
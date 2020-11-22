$(document).ready(function() {
    $('#carrito-compras-tienda').load("process/carrito.php");
    $(".botonCarrito").click(function(){
        alert($(this).val())
        $('#carrito-compras-tienda').load("process/carrito.php?precio="+$(this).val());
        toastr.info('Are you the 6 fingered man?')
        $('.modal-carrito').modal('show');
    });
    $(".carrito-button-nav").click(function(){
        $("#container-carrito-compras").animate({height: 'toggle'},200);
    });
});

function quitar(id) {
    console.log('quitar '+id)
}

function agregar(id) {
    console.log('agregar '+id)

}

function eliminar(id) {

}
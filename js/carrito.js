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

function cerrarModalPago(event) {
    let nc= $("input[id=pay-number-card]").val()
    let date= $("input[id=pay-date]").val()
    let cvc= $("input[id=pay-cvc]").val()
    let names= $("input[id=pay-names]").val()

    // console.log({nc,date,cvc})
    if (nc.length >0 && date.length >0 && cvc.length >0 && names.length >0){
        $('#myModalPago').modal('hide')
    }else {
        toastr.warning('Complete todos los campos del formulario','Atencion!')
    }

}


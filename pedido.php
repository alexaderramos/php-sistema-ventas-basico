<!DOCTYPE html>
<html lang="es">
<head>
    <title>Pedido</title>
    <?php include './inc/link.php'; ?>
</head>
<body id="container-page-index">
<?php include './inc/navbar.php'; ?>
<section id="container-pedido">
    <div class="container">
        <div class="page-header">
            <h1>Confirmar pedido</h1>
        </div>
        <br><br><br>
        <div class="row">
            <div class="col-xs-12 col-sm-6">
                <img class="img-responsive center-all-contens" src="assets/img/CatTechnology-logo.png"
                     style="opacity: .4">
            </div>
            <div class="col-xs-12 col-sm-6">
                <div id="form-compra">
                    <form action="process/confirmcompra.php" method="post" role="form" class="FormCatElec"
                          data-form="save">
                        <?php
                        if (!$_SESSION['nombreUser'] == "" && !$_SESSION['claveUser'] == "") {
                            echo '
                                        <h2 class="text-center">¿Confirmar pedido?</h2>
                                        <p class="text-center">Para confirmar tu pedido presiona el botón confirmar</p>
                                        <br>
                                        <img class="img-responsive center-all-contens" src="assets/img/shopping-cart.png">
                                          <input type="hidden" name="clien-name" value="' . $_SESSION['nombreUser'] . '">
                                          <input type="hidden" name="clien-pass" value="' . $_SESSION['claveUser'] . '">
                                          <input type="hidden"  name="clien-number" value="log">
                                        <br>
                                        <!--p class="text-center"><button class="btn btn-success" type="submit">Confirmar</button></p-->
                                        <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#myModalPago">
                                        <i class="fa fa-credit-card"></i> Completar compra 
                                        </button>
                                    ';
                        } else {
                            echo '
                                        <h3 class="text-center">¿Confirmar el pedido?</h3>
                                        <p>
                                            Para confirmar tu compra debes haber iniciar sesión o introducir tu nombre de usuario
                                            y contraseña con la cual te registraste en <span class="tittles-pages-logo">Cat Technology</span>.
                                        </p>
                                        <br>
                                      <div class="form-group">
                                        <div class="input-group">
                                          <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                          <input class="form-control all-elements-tooltip" type="text" placeholder="Ingrese su nombre" required name="clien-name" data-toggle="tooltip" data-placement="top" title="Ingrese su nombre" pattern="[a-zA-Z]{1,9}" maxlength="9">
                                        </div>
                                      </div>
                                      <br>
                                      <div class="form-group">
                                        <div class="input-group">
                                          <div class="input-group-addon"><i class="fa fa-lock"></i></div>
                                          <input class="form-control all-elements-tooltip" type="password" placeholder="Introdusca su contraseña" required name="clien-pass" data-toggle="tooltip" data-placement="top" title="Introdusca su contraseña">
                                        </div>
                                      </div>
                                      <input type="hidden"  name="clien-number" value="notlog">
                                      <br>
                                     <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#myModalPago">
                                    <i class="fa fa-credit-card"></i> Completar compra 
                                    </button>
                                      <p class="text-center"><!--button class="btn btn-success" type="submit">Confirmar</button--></p>
                                    ';
                        }
                        echo '
<div class="modal fade" id="myModalPago" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title" id="myModalLabel">
<div class="row">
                            <h3 class="text-center">Ingresar método de Pago</h3>
                            <div class="inlineimage"> <img class="img-responsive images" src="https://cdn0.iconfinder.com/data/icons/credit-card-debit-card-payment-PNG/128/Mastercard-Curved.png"> <img class="img-responsive images" src="https://cdn0.iconfinder.com/data/icons/credit-card-debit-card-payment-PNG/128/Discover-Curved.png"> <img class="img-responsive images" src="https://cdn0.iconfinder.com/data/icons/credit-card-debit-card-payment-PNG/128/Paypal-Curved.png"> <img class="img-responsive images" src="https://cdn0.iconfinder.com/data/icons/credit-card-debit-card-payment-PNG/128/American-Express-Curved.png"> </div>
                        </div>
</h4>
</div>
<div class="modal-body">
<div class="row">
    <div class="col-xs-12">
        <div class="form-group"> <label>NUMERO DE TARJETA</label>
            <div class="input-group"> 
            <input name="numero" id="pay-number-card" type="tel" required class="form-control" placeholder="Número de tarjeta valido" /> <span class="input-group-addon"><span class="fa fa-credit-card"></span></span> </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-7 col-md-7">
        <div class="form-group"> <label><span class="hidden-xs">EXPIRACION</span><span class="visible-xs-inline">EXP</span> FECHA</label> 
        <input name="expira" id="pay-date" required type="tel" class="form-control" placeholder="MM / YY" /> </div>
    </div>
    <div class="col-xs-5 col-md-5 pull-right">
        <div class="form-group"> <label>CV</label> 
        <input name="cvc" id="pay-cvc" type="tel" required class="form-control" placeholder="CVC" /> </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <div class="form-group"> <label>NOMBRES COMPLETOS</label>
         <input name="nombres" id="pay-names" type="text" class="form-control" required placeholder="Nombre del dueño de la tarjeta" /> </div>
    </div>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
<button type="submit" onclick="cerrarModalPago(event)"  class="btn btn-success">Pagar ahora</button>
</div>
</div>
</div>
</div>
                        ';
                        ?>
                        <div class="ResForm" style="width: 100%; text-align: center; margin: 0;"></div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</section>
<?php include './inc/footer.php'; ?>
</body>
</html>
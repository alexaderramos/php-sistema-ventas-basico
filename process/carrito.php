<?php
error_reporting(E_PARSE);
include '../library/configServer.php';
include '../library/consulSQL.php';
session_start();
$suma = 0;
/**
 * precio es un alias para el id
 */
if (isset($_GET['precio'])) {
    $id = $_GET['precio'];

    //verificamos si hay elementos en el carrito de compras
    $cont = $_SESSION['contador'];

    if ($cont > 0) {
        $flag = true;
        for ($i = 0; $i < $cont; $i++) {
            $prod_id = $_SESSION['producto'][$i];
            if ($id == $prod_id) {
                $_SESSION['cantidad'][$i]++;
                $flag = false;
                break;
            }
        }
        if ($flag) {
            $_SESSION['producto'][$cont] = $_GET['precio'];
            $_SESSION['cantidad'][$cont] = 1;
            $_SESSION['contador']++;
        }

    } else {
        $_SESSION['producto'][$cont] = $_GET['precio'];
        $_SESSION['cantidad'][$cont] = 1;
        $_SESSION['contador']++;
    }


}
echo '<div class="panel" style="color: #000000">';
echo '<table class="table table-bordered table-hover">';
$cab = "
<tr>
<th>Nombre</th>
<th>Precio</th>
<th>Cantidad</th>
</tr>
";
echo $cab;
for ($i = 0; $i < $_SESSION['contador']; $i++) {
    $consulta = ejecutarSQL::consultar("select * from producto where CodigoProd='" . $_SESSION['producto'][$i] . "'");
    while ($fila = mysqli_fetch_array($consulta)) {
        echo "<tr>
                    <td>" . $fila['NombreProd'] . "</td>
                    <td> " . $fila['Precio'] . "</td>
                    <td>
                    <button onclick='quitar(" . $_SESSION['producto'][$i] . ")' class='btn btn-sm btn-primary'><i class='fa fa-minus'></i></button> 
                    <span style='padding-right: 5px; padding-left: 5px'> " . $_SESSION['cantidad'][$i] . "</span>
                    <button onclick='agregar(" . $_SESSION['producto'][$i] . ")' class='btn btn-sm btn-primary'><i class='fa fa-plus'></i></button>
                    <button onclick='eliminar(" . $_SESSION['producto'][$i] . ")' class='btn btn-danger btn-sm'><i class='fa fa-trash'></i></button>
                    </td>
            </tr>";
        $suma += $fila['Precio'];
    }
}
echo "<tr><td>Subtotal</td><td>$" . number_format($suma, 2) . "</td></tr>";
echo "</table>";
echo '</div>';
$_SESSION['sumaTotal'] = $suma;
<?php
session_start();
include "../../../lib/template.inc";
include "../../../lib/link_msq.php";
include "../../../lib/check.php";
include "../../../lib/functions.php";

$t = new Template('../templates');
$t->set_file(array(
	"ver"			=> "ver_report.html", 
	"un"			=> "un_registro.html",
	));

/* -- VARIABLES GENERALES -- */
$rela_systuri02 = isset($_POST['rela_systuri02']) ? $_POST['rela_systuri02'] : '';

// Si se recibe una localidad seleccionada, aplica el filtro
$filtro = ($rela_systuri02 != "") ? " WHERE sys_turi_03_cab_puntos_historicos.rela_systuri02 = '$rela_systuri02'" : "";

$qr = "
    SELECT *
    FROM sys_turi_03_cab_puntos_historicos
    INNER JOIN sys_turi_02_det_localidades 
    ON sys_turi_03_cab_puntos_historicos.rela_systuri02 = sys_turi_02_det_localidades.id_systuri02
    $filtro
";

$result_sum = flex_query($qr, $link_msq);
while ($row_sum = flex_fetch_assoc($result_sum)) {
    $t->set_var("systuri03_nombre", $row_sum["systuri03_nombre"]);
	$t->set_var("systuri03_descripcion", $row_sum["systuri03_descripcion"]);
    $t->parse("LISTADO", "un", true);
}
$t->pparse("OUT", "ver");
?>
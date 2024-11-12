<?php
session_start();
include "../../../lib/template.inc";
include "../../../lib/link_msq.php";
include "../../../lib/check.php";

$t = new Template('../templates');
$t->set_file(array(
	"ver_form_report"		=> "ver_form_report.html",

));

/* -- VARIABLES GENERALES -- */
$title="Filtros"; 
$form="ver_reporte"; 
$urlWindow="modulos/reporte_puntos_historicos/php/ver_report.php";
$urlIframe="";
$urlSelf="modulos/reporte_puntos_historicos/php/ver_report.php";
/* ------------------------ */

$fields="
		{
		label: 'Localidad', 
		hide:false, 
		readonly:false, 
		disabled:false, 
		onchange:false, 
		appendToPrev:false,
		deafultvalue:'$rela_systuri02', 
		field: 'rela_systuri02',  
		type:'option', 
		nosubmit:false,
		paramsType:
		{
			width: 150,
			flexOps:
			{
				idFlex: 'id_systuri02',
				url: 'lib/flex/flexComboXml.php', 
				urlInterfaz:false,
				optModel: 'systuri02_nombre',
				sortname:'id_systuri02', 
				sortorder:'ASC',
				showReloadBtn:false,
				filterby: '',
				filtervalue: '',
				whereAdvance:false,
				advance:false,
				getAll: true
				
			},
			validate:
			{
				required:false,
				custom:null
			}
		}
	},

";

$t->set_var("form",$form);	
$t->set_var("fields",$fields);
$t->set_var("title",$title);
$t->set_var("urlWindow",$urlWindow);	
$t->set_var("urlIframe",$urlIframe);	
$t->set_var("urlSelf",$urlSelf);	

$t->pparse("OUT", "ver_form_report");
?>
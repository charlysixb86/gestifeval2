
<?php

  include_once "../../conexion.php";

error_reporting(E_ALL);

//date_default_timezone_set('utf-8');
$currenttime=date("Y-m-d");

require_once '../../phpexcel/Classes/PHPExcel.php';
$objPHPExcel = new PHPExcel();
$objPHPExcel->getProperties();



$query = "select * from Tab_Trabajadores;";
$result = mysql_query($query);

if ($result = mysql_query($query) or die(mysql_error())) {
   $objPHPExcel = new PHPExcel();
   $objPHPExcel->getActiveSheet()->setTitle('CYImport'.$currenttime.'');

$rowNumber = 1;
$headings = array('Codigo','Nombre','Apellidos','Objetivos','Contraseña','Nivel','Departamento','Vigencia','NumUsuario');
$objPHPExcel->getActiveSheet()->fromArray(array($headings),NULL,'A'.$rowNumber);
$rowNumber++;
while ($row = mysql_fetch_row($result)) {
   $col = 'A';
   foreach($row as $cell) {
      $objPHPExcel->getActiveSheet()->setCellValue($col.$rowNumber,$cell);
      $col++;
   }
   $rowNumber++;
}


   $objWriter = new PHPExcel_Writer_CSV($objPHPExcel);
$objWriter->setDelimiter(',');
$objWriter->setEnclosure('');
$objWriter->setLineEnding("\r\n");
$objWriter->setSheetIndex(0);
//$objWriter->save('carloscsv '.$currenttime.'.csv');


   header('Content-type: text/csv');
   header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
   header('Content-Disposition: attachment;filename="Gesti_Trabajadores '.$currenttime.'".csv"');
   header('Cache-Control: max-age=0');

   $objWriter->save('php://output');
   exit();
}
echo 'Contacte con el Administrador , No recibe datos del Servidor.';

?>
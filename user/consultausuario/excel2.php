<?php
   
   include_once "../../conexion.php";

session_start();
   if(!isset($_SESSION['usuarioactual']))
   {
       header('location: ../2.php');
   }
   if($_SESSION['Nivel']!="2")
   {
       header('location: ../../index.php');
   }  
$usuario=$_SESSION["usuarioactual"];
$fecha1=$_POST['data1u'];
$fecha2=$_POST['data2u'];

error_reporting(E_ALL);

$currenttime=date("Y-m-d");

require_once '../../phpexcel/Classes/PHPExcel.php';
$objPHPExcel = new PHPExcel();
$objPHPExcel->getProperties();


$consulta1="SELECT CodTrabajador FROM Tab_Trabajadores WHERE NomUsuario='$usuario';";
               $resultado1=mysql_query($consulta1,$conexion);
               if($resultado1!=0)
               {
                  while($solucion1=mysql_fetch_array($resultado1)) 
                  {
                      
                     $codtra=$solucion1[0];
                     //echo "Codigo Trabjador: ".$codtra;
                                          
                  }
               }


$query = "SELECT FechaActividad,SUM(HorasEmpleadasAct) 
         FROM Tab_Datos 
         WHERE CodTrabajador=(SELECT CodTrabajador FROM Tab_Trabajadores WHERE NomUsuario='$usuario') 
         AND (FechaActividad BETWEEN '$fecha1' and '$fecha2')
         GROUP BY FechaActividad;";
              
               
$result = mysql_query($query);

if ($result = mysql_query($query) or die(mysql_error())) {
   $objPHPExcel = new PHPExcel();
   $objPHPExcel->getActiveSheet()->setTitle('CYImport'.$currenttime.'');

$rowNumber = 1;
$headings = array('Fecha','Total Horas');
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
   header('Content-Disposition: attachment;filename="Gesti_Datos'.$currenttime.'".csv"');
   header('Cache-Control: max-age=0');

   $objWriter->save('php://output');
   exit();
}
echo 'Contacte con el Administrador , No recibe datos del Servidor.';

?>
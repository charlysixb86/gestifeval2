<?php
include_once "../../conexion.php";

$q=$_POST['q'];

$actividad="SELECT * FROM Tab_Actividades WHERE CodProyecto IN (SELECT CodProyecto FROM Tab_Proyectos WHERE NomProyecto='$q');";
$res=mysql_query($actividad,$conexion);

?>

<select id="act" name="act">

<?php while($fila=mysql_fetch_array($res)){
    echo "<option value='".$fila['NomActividad']."'>".$fila['NomActividad']."</option>"; ?>
<?php } ?>

</select>


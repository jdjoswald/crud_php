<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<?php 
include("../include/header.php");
?>

<?php
include("../configuration/dtabseconection.php");
?>
<?php
$link=conect();

$query="SELECT tbl_cedula.id,tbl_cedula.numero_cedula, tbl_cedula.fecha_de_nacimiento, tbl_cedula.nombres, tbl_cedula.apellido ,tbl_sexo.sexo,tbl_cedula.codigoce
FROM tbl_cedula 
INNER join tbl_sexo ON  tbl_cedula.id_sexo = tbl_sexo.id_sexo  
INNER JOIN tbl_municipios on tbl_cedula.id_municipio = tbl_municipios.id_municipio
INNER JOIN tbl_estado_civil on tbl_cedula.id_estado_civil =tbl_estado_civil.id_estado_civil
INNER join tbl_sangre on tbl_cedula.id_sangre=tbl_sangre.id_sangre";

$resultados=mysqli_query($link, $query);

$query="SELECT * FROM tbl_estado_civil;";
$estadocivil=mysqli_query($link, $query);
$query="SELECT * FROM tbl_municipios;";
$municipios=mysqli_query($link, $query);
$query="SELECT * FROM tbl_sangre;";
$sangre=mysqli_query($link, $query);
$query="SELECT * FROM tbl_sexo;";
$sexo=mysqli_query($link, $query);
$contaodr=mysqli_num_rows($resultados);
mysqli_close($link);


?>


      
      <br>
      <br>
      <br>
      <div class="py-5 text-center">
      <h2>Lista de personas</h2>

      </div>
      
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          
            <tr>
              <th>#</th>
              <th>Nombre</th>
              <th>fecha de nacimiento</th>
              <th>Sexo</th>
              <th>Codigo colegio electoral</th>
              <th>Ver</th>
              <th>Editar</th>
              <th>Eliminar</th>
            </tr>
            <?php
                while($row=mysqli_fetch_array($resultados)){
                  echo"<tr><td>".$row['numero_cedula']."</td>";
                  echo "<td>".$row['nombres']." ".$row['apellido']."</td>";
                  echo "<td>".$row['fecha_de_nacimiento']."</td>";
                  echo "<td>".$row['sexo']."</td>";
                  echo "<td>".$row['codigoce']."</td>";
                  echo "<td><a class='btn' href=view.php?id=". $row['id']."><i class='fa fa-eye'></i></a> </td>";
                  echo "<td><a class='btn' href=edit.php?id=". $row['id']."><i class='fa fa-edit'></i></a> </td>";
                  echo "<td><a class='btn' href=eliminar.php?id=". $row['id']." ><i class='fa fa-trash'></i></a> </td></tr>";
                  
              }
            ?>
         
          
        </table>
      </div>

      
   











<?php 
  include("../include/footer.php");
?>
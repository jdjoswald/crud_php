<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<?php 
include("../include/header.php");
?>

<?php
include("../configuration/dtabseconection.php");
?>
<?php
$link=conect();
$id=$_GET["id"];

$query="SELECT  *

FROM tbl_cedula 
INNER join tbl_sexo ON  tbl_cedula.id_sexo = tbl_sexo.id_sexo  
INNER JOIN tbl_municipios on tbl_cedula.id_municipio = tbl_municipios.id_municipio
INNER JOIN tbl_estado_civil on tbl_cedula.id_estado_civil =tbl_estado_civil.id_estado_civil
INNER join tbl_sangre on tbl_cedula.id_sangre=tbl_sangre.id_sangre

WHERE tbl_cedula.id=$id;";


$resultados=mysqli_query($link, $query);

// $query="SELECT * FROM tbl_estado_civil;";
// $estadocivil=mysqli_query($link, $query);
// $query="SELECT * FROM tbl_municipios;";
// $municipios=mysqli_query($link, $query);
// $query="SELECT * FROM tbl_sangre;";
// $sangre=mysqli_query($link, $query);
// $query="SELECT * FROM tbl_sexo;";
// $sexo=mysqli_query($link, $query);
$contaodr=mysqli_num_rows($resultados);
mysqli_close($link);


?>


      
      <br>
      <br>
      <br>
      <div class="py-5 text-center">
      <h2>Lista de personas</h2>

     
      <P>
      <?php
                while($row=mysqli_fetch_array($resultados)){
                  echo"El numero de cedula ".$row['numero_cedula']." pertenece a ".
                  "".$row['nombres']." ".$row['apellido'].", es ".
                  "".$row['estado_civil']." de sexo "."<br>".
                  "".$row['sexo']." del municipio de ".
                  "".$row['municipio']." nacido en la fecha ".$row['fecha_de_nacimiento']." su cedula expira el ".
                  $row['fecha_de_expiracion']."<br>".
                  "<br>".
                  "<a class='btn' href=edit.php?id=". $row['id']." style='background-color: green;'  >Editar <i class='fa fa-eye'></i></a> ".
                  "<a class='btn' href=eliminar.php?id=". $row['id']." style='background-color: red;'>Borrar <i class='fa fa-trash'></i></a>  ";
                  
              }
            ?>
              </P>
              </div>
         
       

      
   











<?php 
  include("../include/footer.php");
?>
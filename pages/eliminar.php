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
$query="SELECT nombres,apellido,numero_cedula FROM tbl_cedula where id=$id ;";
$resultado=mysqli_query($link, $query);
if($row=mysqli_fetch_array($resultado)){
    $nombre1=$row["nombres"];
    $apellido1=$row["apellido"];
    $cedula1=$row["numero_cedula"];
  }

if($_POST){

$query="DELETE FROM tbl_cedula WHERE id=$id";
$deleted = mysqli_query($link, $query);
if($deleted){
    echo "done";
}
else{
    echo mysqli_error($link);
    
}
echo $deleted;
mysqli_close($link);
header("location: userlist.php");}


?>
<br>
<br>
<br>
<div class="py-5 text-center">
<h1>Eliminar</h1>
<p>

<?php

echo "Seguro que desea eliminar a ".$nombre1." ".
$apellido1." de cedula numero ".
$cedula1; 
?>


</p>
</div>
<form class="needs-validation" novalidate method="post">
          <input type="hidden" name="id" value=<?php echo $id?>>



<div class="py-5 text-center">
<Button type="button" class="btn btn-primary" onclick="ira('userlist.php')"   > Ir a lista de usuarios</Button>
<button class="btn btn-primary" style='background-color: red;' type="submit">borrar usuario</button>



</div>
        
      </form>
      
<script>
function ira(page){
    location.href=page;
}
</script>
      
 

    </body>
      
   











<?php 
  include("../include/footer.php");
?>
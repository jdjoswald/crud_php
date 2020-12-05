<?php include("../include/header.php")?>

<?php
include("../configuration/dtabseconection.php")
?>
<?php
$link=conect();

// $query="SELECT numero_cedula,nombres,apellido,id_sexo,codigoce FROM tbl_cedula;";
// $resultados=mysqli_query($link, $query);

$query="SELECT * FROM tbl_estado_civil;";
$estadocivil=mysqli_query($link, $query);
$query="SELECT * FROM tbl_municipios;";
$municipios=mysqli_query($link, $query);
$query="SELECT * FROM tbl_sangre;";
$sangre=mysqli_query($link, $query);
$query="SELECT * FROM tbl_sexo;";
$sexo=mysqli_query($link, $query);
// $contaodr=mysqli_num_rows($resultados);
mysqli_close($link);


?>

<?php
if($_POST){
  $link=conect();
  $nombre=$_POST["txt_nombre"];
  $apellido=$_POST["txt_apellido"];
  $cedula=$_POST["txt_cedula"];
  $lnacimento=$_POST["txt_lnacimiento"];
  $fechanaciento=$_POST["fnacimiento"];
  // $ciudad=$_POST["txt_ciudad"];
  $estado_civil=$_POST["txt_ecivil"];
  $tipodesangre=$_POST["txt_tsangre"];
  $ocupacion=$_POST["txt_ocupacion"];
  $fechaexp=$_POST["txt_fexpiracion"];
  $codigocolegio=$_POST["txt_ccelectoral"];
  $ubicacioncolegio=$_POST["txt_ucelectoral"];
  $direccionresidencia=$_POST["txt_drecidencia"];
  $sector=$_POST["txt_sector"];
  $municipio=$_POST["txt_municipio"];
  $sexo=$_POST["txt_sexo"];
  $query="INSERT INTO tbl_cedula(numero_cedula, lugar_de_nacimiento, nombres, apellido, fecha_de_nacimiento, id_sexo, id_estado_civil, ocupacion, fecha_de_expiracion, id_sangre, codigoce, ubicacion_ce, direccion_r, sector, id_municipio) 
                          VALUES('{$cedula}','{$lnacimento}','{$nombre }','{$apellido}','{$fechanaciento}','{$sexo}','{$estado_civil}','{$ocupacion}','{$fechaexp}','{$tipodesangre}','{$codigocolegio}','{$ubicacioncolegio}','{$direccionresidencia}','{$sector}','{$municipio}')";
  $insert=mysqli_query($link,$query);
  mysqli_close($link);
  
}

?>
<body class="bg-light">
    <div class="container">
  <div class="py-5 text-center">
    <br>
    <h2>Introducir nuevo usuario </h2>
    <p class="lead">completa  con la informacion correspondiente</p>
  </div>

     
    <div class="col-center-8 order-md-1">
      <form class="needs-validation" novalidate method="post">
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="txt_nombre">Nombres</label>
            <input type="text" class="form-control" id="txt_nombre" name="txt_nombre" placeholder="Nombres" value="" required>
            <div class="invalid-feedback">
              Nombre es requerido.
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="txt_apellido">Apellidos</label>
            <input type="text" class="form-control" id="txt_apellido" name="txt_apellido"placeholder="Apellidos" value="" required>
            <div class="invalid-feedback">
              Apellido es requerido.
            </div>
          </div>
        </div>

        <div class="mb-3">
          <label for="txt_cedula">Numero de cedula (sin guion)</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text">#</span>
            </div>
            <input type="text" class="form-control" id="txt_cedula" name="txt_cedula" placeholder="Numero de cedula" required>
            <div class="invalid-feedback" style="width: 100%;">
              numero de cedula es requerido.
            </div>
          </div>
        </div>
       
        <div class="row">
        
          <div class="col-md-6 mb-3">
            <label for="txt_lnacimiento">Lugar de nacimiento <span class="text-muted">(Optional)</span></label>
            <input type="text" class="form-control" id="txt_lnacimiento" name="txt_lnacimiento" placeholder="Lugar de nacimiento">
            <div class="invalid-feedback">
              Lugar de nacimientoes requerido.
            </div>
          </div>

          <div class="col-md-6 mb-3">
            <label for="fnacimiento">Fecha de nacimiento</label>
            <input type="date" class="form-control" id="fnacimiento" name="fnacimiento"  required>
            <div class="invalid-feedback">
              fecha de nacimento es requerida
            </div>
          </div>
        </div>
        <div class="mb-3">
            <label for="txt_sexo">Sexo</label>
            <select class="custom-select d-block w-100" id="txt_sexo" name="txt_sexo" required>
              <option value="">sexo...</option>
              <?php
                while($row6=mysqli_fetch_array($sexo)){
                  
                    echo"<option value='".$row6['id_sexo']."'>". $row6['sexo']."</option>";
                  }
               
                 
              
              ?>
              
             
            </select>
            <div class="invalid-feedback">
               Sexo es requerido
            </div>
          </div> 


        <div class="row">
          
          <div class="col-md-4 mb-3">
            <label for="txt_ecivil">Estado civil</label>
            <select class="custom-select d-block w-100" id="txt_ecivil" name="txt_ecivil" required>
              <option value="">Estado civil...</option>
              <?php
               while($row3=mysqli_fetch_array($estadocivil)){
                 echo"<option value='".$row3['id_estado_civil']."'>". $row3['estado_civil']."</option>";
               }
              
              ?>
            </select>
            <div class="invalid-feedback">
              Estado civil es requerido.
            </div>
          </div>




          <div class="col-md-4 mb-3">
            <label for="txt_tsangre">Tipo de sangre</label>
            <select class="custom-select d-block w-100" id="txt_tsangre" name="txt_tsangre"required>
              <option value="">Tipo de sangre...</option>
              <?php
               while($row=mysqli_fetch_array($sangre)){
                 echo"<option value='".$row['id_sangre']."'>". $row['tipo']."</option>";
               }
              
              ?>
              
            </select>
            <div class="invalid-feedback">
              tipo de sangre es requerido
            </div>
          </div>



          <div class="col-md-4 mb-3">
            <label for="txt_ocupacion">ocupacion</label>
            <input type="text" class="form-control" id="txt_ocupacion" name="txt_ocupacion" placeholder="Ocupacion" required>
            <div class="invalid-feedback">
              La ocupacion es requerida
            </div>
          </div>
        </div>

        <div class="mb-3">
          <label for="txt_fexpiracion">Fecha de expiracion</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text">#</span>
            </div>
            <input type="date" class="form-control" id="txt_fexpiracion" name="txt_fexpiracion" required>
            <div class="invalid-feedback" style="width: 100%;">
              Fecha de expiracion es requerida
            </div>
          </div>
        </div>
        <div class="text-center">
          <br>
          <h4>Informacion colegio electoral</h4>
          <br>
        </div>

        <div class="row">
          <div class="col-md-6 mb-3">
              <label for="txt_ccelectoral">Codigo colegio electoral</label>
              <input type="text" class="form-control" id="txt_ccelectoral" name="txt_ccelectoral" placeholder="Codigo colegio electoral" required>
              <div class="invalid-feedback">
                Codigo colegio electoral es requerida.
              </div>
          </div>
          <div class="col-md-6 mb-3">
              <label for="txt_ucelectoral">Ubicacion de colegio electoral</label>
              <input type="text" class="form-control" id="txt_ucelectoral" name="txt_ucelectoral" placeholder="Ubicacion colegio electoral" required>
              <div class="invalid-feedback">
              Ubicacion de colegio electoral es requerida.
              </div>
          </div>
        

        </div>
        </div>
        <div class=" text-center ">
          <br>
          <h4>Informacion residencial</h4>
          <br>
          
        </div>
        <div class="col-mb-3">
              <label for="txt_drecidencia">Direccion de recidencia</label>
              <input type="text" class="form-control" id="txt_drecidencia" name="txt_drecidencia" placeholder="Direccion de recidencia" required>
              <div class="invalid-feedback">
              Direccion de recidencia es requerida.
              </div>
          </div>


        <div class="row">

          <div class="col-md-6 mb-3">
              <label for="txt_sector">Sector</label>
              <input type="text" class="form-control" id="txt_sector" name="txt_sector" placeholder="Sector" required>
              <div class="invalid-feedback">
                Sector es requerido.
              </div>
          </div>

          <div class="col-md-6 mb-3">
          <label for="txt_municipio">Municipio</label>
            <select class="custom-select d-block w-100" id="txt_municipio" name="txt_municipio" required>
              <option value="">Municipio...</option>
              <?php
               while($row2=mysqli_fetch_array($municipios)){
                 echo"<option value='".$row2['id_municipio']."'>". $row2['municipio']."</option>";
               }
              
              ?>
              
            </select>
          </div>

        <hr class="mb-4">
        <button class="btn btn-primary btn-lg btn-block" type="submit">Añadir</button>
      </form>
    </div>
  </div>
  
      




<?php include("../include/footer.php")?>


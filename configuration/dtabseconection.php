<?php
    $host="localhost";
    $user="root";
    $pass="";
    $db="cedula";
    $msconecction="";
    function conect(){
        global $host,$user,$pass,$db,$msconecction;
        if(($link=mysqli_connect($host,$user,$pass))){
            
            
            $msconecction="Conectado ala base de datos.<br>";
        }else{
            
            $msconecction="Error cenctando a la base de datos.<br>";
            exit();
        }
        

        if (mysqli_select_db($link, $db)){
            $msconecction="obtuvimos la base de datos $db sin problemas.<br>";
            
        }else{
            $msconecction="Error cenctando a la base de datos  .<br>";
        }
       
        return $link;


    }
conect();
echo $msconecction;
?>



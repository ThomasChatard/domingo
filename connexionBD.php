<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */

function connexion($nom)
{
  $db = mysqli_connect("localhost", "root", "","$nom") ;
  $_SESSION["isConnect"]=false;


  if($db==true){
    $_SESSION["isConnect"]=true;
  }
  else{
    $link = mysqli_connect("localhost", "root", "");

    // Check connection
    if($link === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    $sql = "CREATE DATABASE ".$nom;
    if(mysqli_query($link, $sql)){
        $db = mysqli_connect("localhost", "root", "","$nom");
        $_SESSION["isConnect"]=true;
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
     }
  }

  return $db;
}



?>

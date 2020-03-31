<?php

  function getStructure($db,$nomtable){

    $sql='SHOW COLUMNS FROM '.$nomtable;
    $resu = $db->query($sql);

    while ($row = mysqli_fetch_assoc($resu)) {
      $res[] = $row;
    }
    return $res;
  }


  function getData($db,$nomtable){

    $sql='SELECT * FROM '.$nomtable;
    $resu = $db->query($sql);

    while ($row = mysqli_fetch_assoc($resu)) {
      $res[] = $row;
    }
    return $res;
  }

  function getTable($db){

    $sql='SHOW TABLES';
    $resu = $db->query($sql);

    return $resu;
  }

  function getAll($db){

    $sql="SELECT TABLE_NAME, COLUMN_NAME, DATA_TYPE FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = 'salut'";
    $resu = $db->query($sql);

    while ($row = mysqli_fetch_assoc($resu)) {
      $res[] = $row;
    }
    return $res;
  }

  ?> <br /> <br /> <?php

?>

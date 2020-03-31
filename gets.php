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

  echo json_encode(getData($db,$_POST["table"]));
  ?> <br /> <br /> <?php

?>

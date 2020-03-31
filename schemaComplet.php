<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Test Canvas</title>
    <?php
    function getTable($db){

      $sql='SHOW TABLES';
      $resu = $db->query($sql);

      return $resu;
    }

    $nom=$_SESSION["dbname"];
    $db = mysqli_connect("localhost", "root", "","$nom");
    $resu = getTable($db);
    $listeTable = array();
    while ($ligne = $resu->fetch_row()) {
      $listeTable[] = $ligne[0];
    }
    include("gets.php");
    for($i = 0; $i < sizeof($listeTable);$i++){ ?>
      <script>
      var tab = <?php echo json_encode(getStructure($db,$listeTable[$i]));?>;

      function draw() {
          var canvas = document.getElementById("canvas1");
          var cvs = canvas.getContext("2d");
          if (canvas.getContext){
              var x = 50;
              var y = 50;
              var ligne = 0;
              for(var i = 0 ;i < <?php echo sizeof($listeTable);?>;i++){
                  if(i % 3 == 0 && i != 0){
                      y += 300;
                      x = 50;
                  }
              createTable(5,x,y,canvas,0);
              x += 500;
          }
      }
    }

      function createTable(nbligne,x,y,canvas,numTable){
          var canvas1 = canvas;
          if (canvas1.getContext){
              var n = y+40;
              var cvs = canvas1.getContext("2d");
              cvs.font = "10pt sans-serif";
              cvs.strokeRect(x,y,300,30);
              cvs.fillText("<?php echo $listeTable[$i];?>", x+7, y+15);
              for (i = 0; i < tab.length; i++){
                  cvs.strokeRect(x,n,300,30);
                  cvs.fillText(tab[i].Field + " : " + tab[i].Type,x + 7, n + 15);
                  n += 30;
              }

          }
      }
    </script>
    <?php } ?>

    <style>
        canvas{border: 1px solid black;}
    </style>
</head>
<body onload="draw()">
    <canvas id="canvas1" height="2000" width="1500"></canvas>
</body>
</html>

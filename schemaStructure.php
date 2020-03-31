<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Structure</title>
    <script>
        var tab = <?php echo json_encode(getStructure($db,$_POST["table"]));?>;

        function draw() {
            var canvas = document.getElementById("canvas1");
            var cvs = canvas.getContext("2d");
            if (canvas.getContext){
                var x = 50;
                var y = 50;
                var ligne = 0;
                createTable(5,x,y,canvas,0);
            }
        }

        function createTable(nbligne,x,y,canvas,numTable){
            var canvas1 = canvas;
            if (canvas1.getContext){
                var n = y+40;
                var cvs = canvas1.getContext("2d");
                cvs.font = "10pt sans-serif";
                cvs.strokeRect(x,y,500,30);
                cvs.fillText("Structure de la table",x+7, y+15);
                for (i = 0; i < tab.length; i++){
                    cvs.strokeRect(x,n,500,30);
                    cvs.fillText(tab[i].Field + " : Type = " + tab[i].Type + " / Null = " + tab[i].Null + " / Clé = " + tab[i].Key + " / Default = " + tab[i].Default + " / Extra = "+ tab[i].Extra,x + 7, n + 15);
                    n += 30;
                }

            }
        }
    </script>
    <style>
        canvas{border: 1px solid black;}
    </style>
</head>
<body onload="draw()">
    <canvas id="canvas1" height="500" width="1000"></canvas>
</body>
</html>

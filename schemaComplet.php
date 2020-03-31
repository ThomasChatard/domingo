<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Test Canvas</title>
    <script>

        var tab = {   "statut":false,   "resultat":[                 {                   "nom":"produit",                   "colonnes":[                               {                                 "nom":"idProduit",                                 "type":"int",                                 "contraintes":[                                                 {                                                   "primaryKey":true,                                                   "foreignKey":{                                                     "foreignKeyStatus": false,                                                     "foreignKeyTable": null,                                                     "foreignKeyId": null                                                   } ,                                                   "notNull":true                                                 }                                               ]                               },                               {                                 "nom":"qtProduit",                                 "type":"int",                                 "constraints":[                                                 {                                                   "primaryKey":false,                                                   "foreignKey":{                                                     "foreignKeyStatus": false,                                                     "foreignKeyTable": null,                                                     "foreignKeyId": null                                                   } ,                                                   "notNull":false                                                 }                                               ]                               },                               {                                 "nom":"idFournisseur",                                 "type":"int",                                 "constraints":[                                                 {                                                   "primaryKey":false,                                                   "foreignKey":{                                                     "foreignKeyStatus": true,                                                     "foreignKeyTable": "Fournisseur",                                                     "foreignKeyId": "idFournisseur"                                                   } ,                                                   "notNull":true                                                 }                                               ]                               },                               {                                 "nom":"nomProduit",                                 "type":"string",                                 "constraints":[                                                 {                                                   "primaryKey":false,                                                   "foreignKey":{                                                     "foreignKeyStatus": false,                                                     "foreignKeyTable": null,                                                     "foreignKeyId": null                                                   } ,                                                   "notNull":true                                                 }                                               ]                               }                             ]                 }              ] }



        console.log( tab.resultat[0].colonnes.length);
        function draw() {
            var canvas = document.getElementById("canvas1");
            var cvs = canvas.getContext("2d");
            if (canvas.getContext){
                var x = 50;
                var y = 50;
                var ligne = 0;
                for(var i = 0 ;i<5;i++){
                    if(i % 5 == 0 && i != 0){
                        y += 300;
                        x = 50;
                    }
                    createTable(5,x,y,canvas,0);
                    x += 300;

                }



            }

        }
        function createTable(nbligne,x,y,canvas,numTable){
            var canvas1 = canvas;
            if (canvas1.getContext){

                var str = "julien la tepu";
                var str2 = "zebi";
                var n = y+40;
                var cvs = canvas1.getContext("2d");
                cvs.font = "10pt sans-serif";
                cvs.strokeRect(x,y,200,40);
                cvs.fillText(tab.resultat[numTable].nom,x +7, y+15);
                for (i = 0; i < tab.resultat[numTable].colonnes.length; i++){
                    str += str2;
                    cvs.strokeRect(x,n,200,30);
                    cvs.fillText(tab.resultat[numTable].colonnes[i].nom + " : "+ tab.resultat[numTable].colonnes[i].type,x + 7, n + 15);
                    n += 30;
                }

            }
        }
    </script>
    <h1>TROUVER MOYEN DE RECUP LES NOMS DE TOUTES LES TABLES DE LA BD DANS LAQUELLE ON EST POUR POUVOIR TOUT AFFICHER SUR CE SCHEMA LA ! FAUT AUSSI PENSER A ENLEVER LES INSULTES DE GAB1 DANS LE CODE ! <br \> <img src="https://i.redd.it/ffyb8lxtf2321.png" style="width: 30%"></h1><h3>(Pour supprimer ca de la page c'est la ligne 56 de schemaComplet.php ;))</h3>
    <style>
        canvas{border: 1px solid black;}
    </style>
</head>
<body onload="draw()">
    <canvas id="canvas1" height="500" width="1500"></canvas>
</body>
</html>

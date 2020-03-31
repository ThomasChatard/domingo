
$( document ).ready(function() {

  var i = 1; // variable associée à chaque champs dynamiquement

  // premier cas : ajout d'une clé étrangère pour i=1
  $('.foreigncheck1').click(function (){
      var url = 'TableManager.php';
       $.post(url, function(data){
            $('#data1').html(data);
            $("#data1").children('select').attr('id',"table1");
            $('#table1').attr("name","foreign_table1");
       });

  });

  // Gérer les différents cas des types
  $('#select1').change(function()
  {
    let monSelect = $(this).val(); // valeur du select

    if(monSelect=="int") {
      $(".remove1").remove(); // supprimer le champ option (valeur du type)
    }
      if(monSelect=="char") {
        $(".remove1").remove(); // supprimer le champ option (valeur du type)
          $(".option1").append($('<input type="text" class="remove1" name="type1" size=3 value="50">'));
    }

    if(monSelect=="varchar") {
      $(".remove1").remove(); // supprimer le champ option (valeur du type)
      $(".option1").append($('<input type="text" class="remove1" name="type1" size=3 value="50">'));
    }

    if(monSelect=="date") {
     $(".remove1").remove(); // supprimer le champ option (valeur du type)
    }

    if(monSelect=="datetime") {
      $(".remove1").remove(); // supprimer le champ option (valeur du type)
    }

  });

  $('#button').click(function(){
    i++; // incrémentée à chaque clic lors d'ajout de colonnes

    // input caché pour récupérée le nombre de colonnes ajouté
    $( ".contains" ).append( $("<input type="+'"hidden" name='+'"taille"'+"value="+'"'+i+'" class="'+i+'">'));

    // ajout dynamique d'une ligne pour ajouter une colonne
    $( ".contains" ).append( $('<div class="flex" id="info'+i+'"><div class="colonne"><div class="typevalues"><select id="select'+i+'" name="nom'+i+'"><option value="int">INT</option><option value="char">CHAR</option><option value="varchar">VARCHAR</option><option value="date">DATE</option><option value="datetime">DATETIME</option></select><div style="display: inline" class="option'+i+'"'+'></div></div>'+"<input type="+'"text" name='+'"col'+i+'" id='+'"col'+i+'" class="col" size="30"placeholder="Entrer le nom de la colonne"></div><div class="check"><div class="primary"><input type="checkbox"name="primary'+i+'" class="primarycheck'+i+'" value="primary"><label>clé primaire</label></div><div class="foreign"><input type="checkbox" name="foreign'+i+'" class="foreigncheck'+i+'" value="foreign"><label>clé étrangère</label></div></div><div id="data'+i+'" class="data"></div><img id="supp'+i+'" class="btnsupp" src="images/criss-cross.png"></div>'));

    // ajout dynamique au clic de la checkbox foreign key d'un sélect récupérant toutes les tables ayant une clé primaire (requête PHP)
    $('.foreigncheck'+i).click(function (){

      let monId =$(this).attr('class').replace('foreigncheck',''); // récupérer l'id sélectionné
      var url = 'TableManager.php'; // fichier PHP de ma requête + affichage de mon select
         $.post(url, function(data){
              $('#data'+monId).html(data);
              $("#data"+monId).children('select').attr('id',"table"+monId);
              $('#table'+monId).attr("name","foreign_table"+monId);

         });

    });

    // Gérer les différents cas des types
    $('select').change(function()
    {
      let monSelect = $(this).val(); // valeur du select

      let monId =$(this).attr('id').replace('select',''); // id du select

      if(monSelect=="int") {
        $(".remove"+monId).remove(); // supprimer le champ option (valeur du type)
      }
        if(monSelect=="char") {
          $(".remove"+monId).remove(); // supprimer le champ option (valeur du type)
            $(".option"+monId).append($('<input type="text" class='+'"remove'+monId+'" name='+'"type'+monId+'" size=3 value="50">'));
      }

      if(monSelect=="varchar") {
        $(".remove"+monId).remove(); // supprimer le champ option (valeur du type)
        $(".option"+monId).append($('<input type="text" class='+'"remove'+monId+'" name='+'"type'+monId+'" size=3 value="50">'));
      }

      if(monSelect=="date") {
       $(".remove"+monId).remove(); // supprimer le champ option (valeur du type)
      }

      if(monSelect=="datetime") {
        $(".remove"+monId).remove(); // supprimer le champ option (valeur du type)
      }

    });

    // supprimer une ligne
    $(".btnsupp").click(function(){
      let monId =$(this).attr('id').replace('supp',''); // récupérer l'id selectionné

      $("#info"+monId).remove(); // supprimer la ligne
    });
  });


});

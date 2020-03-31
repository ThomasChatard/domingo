<?php

$taille=1;
?>
<form action="#" method="post">
  <div class="center">
    <label>Table</label><br /><br />
    <input type="text" name="table" size="30"placeholder="Entrer le nom de la table"><br />
    <br /><br />
    <label>Colonnes </label>  <img id='button' src="images/more.png" ><br /><br />

</div>
<div class="contains">
<div class="flex" id="info1">
  <div class="colonne">
    <div class=typevalues>
    <select id="select1" name="nom1" size="1">
          <option value="int">INT</option>
          <option value="char">CHAR</option>
          <option value="varchar">VARCHAR</option>
          <option value="date">DATE</option>
          <option value="datetime">DATETIME</option>
    </select><div style="display: inline" class="option1"></div>
  </div>
    <input type="text" name="col1" id="col1" class="col" size="30" placeholder="Entrer le nom de la colonne">
  </div>
    <div class="check">
      <div class="primary">
        <input type="checkbox" class="primarycheck1"
         name="primary1" value="primary">
        <label>Clé primaire</label>
      </div>
      <div class="foreign">
        <input type="checkbox" class="foreigncheck1"
         name="foreign1" value="foreign">
        <label>Clé étrangère</label>
      </div>
    </div>
  <div id="data1" class="data"></div>
  <img id='supp1' class="btnsupp" src="images/criss-cross.png">

</div>
</div>
<input type="submit" value="Valider">
</form>

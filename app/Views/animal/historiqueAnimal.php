<?php $this->extend('layout/main')?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php $this->section('css')?>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Historique</title>
  <link rel="stylesheet" href="/inc/liste_animal.css">
  <?php $this->endsection()?>
</head>



<body>
<?php $this->section('header')?>
<?php $this->endsection()?>
<?php $this->section('content');?>

  <h1>Historique de l'animal</h1>

  <div class="div-table">
    <table>
      <thead>
      <tr>
        <th>DATE ACTION</th><th>TYPE ACTION</th><th>NOM</th><th>DATE DE NAISSANCE</th><th>ESPECE</th><th>RACE</th><th>SEXE</th><th>INFO</th><th>PROPRIETAIRE</th><th>SITUATION</th>
      </tr>
      <th class = "barre_de_recherche"><i>&#x1F50D;</i><input type="date" id="date_action_recherche" oninput="triTableau()"></th><th><select onchange="triTableau()" id="type_action_recherche"><option value=""></option><option value="Ajout">Ajout</option><option value="Modification">Modification</option></select></th><th class = "barre_de_recherche"><i>&#x1F50D;</i><input type="text" id="nom_animal_recherche" oninput="triTableau()" placeholder="NOM"></th><th class = "barre_de_recherche"><i>&#x1F50D;</i><input type="date" id="date_naissance_animal_recherche" oninput="triTableau()"></th><th class = "barre_de_recherche"><i>&#x1F50D;</i><input type="text" id="espece_animal_recherche" oninput="triTableau()" placeholder="ESPECE"></th><th class = "barre_de_recherche"><i>&#x1F50D;</i><input type="text" id="race_animal_recherche" oninput="triTableau()" placeholder="RACE"></th><th class = "barre_de_recherche"><i>&#x1F50D;</i><input type="text" id="sexe_animal_recherche" oninput="triTableau()" placeholder="SEXE"></th><th class = "barre_de_recherche"><i>&#x1F50D;</i><input type="text" id="info_animal_recherche" oninput="triTableau()" placeholder="INFO"></th><th></th><th></th>

      </thead>
      <tbody id="donneeTable">

    </table>
  </div>
  <?php $this->endsection()?>
  <?php $this->section('footer')?>
<?php $this->endsection()?>
</body>
<?php $this->section('script')?>

<script>

  var resultatRequete = <?php echo json_encode($historiqueAnimal); ?> ;

  ajouteDonneeDansTable(resultatRequete);

  function ajouteDonneeDansTable(donnee)
  {
      var donneeTable = document.getElementById("donneeTable");
      var ligne = "";
      var ancienneLigne = [];
      donnee.forEach((element) => {
          ligne += "<tr style='text-align:center; vertical-align:middle'>" 
          + "<th>" + element["DATE_ACTION"] + "</th>" 
          + "<th>" + element["TYPE_ACTION"] + "</th>" 
          + "<th " + (element["NOM_ANIMAL"] == ancienneLigne["NOM_ANIMAL"] ? '' : 'style= "background-color:#dbd7cf"') + ">" + element["NOM_ANIMAL"] + "</th>" 
          + "<th " + (element["DATE_NAISSANCE_ANIMAL"] == ancienneLigne["DATE_NAISSANCE_ANIMAL"] ? ' ' : ' style= "background-color:#dbd7cf"') + ">" + element["DATE_NAISSANCE_ANIMAL"] + "</th>" 
          + "<th " + (element["ESPECE_ANIMAL"] == ancienneLigne["ESPECE_ANIMAL"] ? '' : 'style= "background-color:#dbd7cf"') + ">" + element["ESPECE_ANIMAL"] + "</th>" 
          + "<th " + (element["RACE_ANIMAL"] == ancienneLigne["RACE_ANIMAL"] ? '' : 'style= "background-color:#dbd7cf"') + ">" + element["RACE_ANIMAL"] + "</th>" 
          + "<th " + (element["SEXE_ANIMAL"] == ancienneLigne["SEXE_ANIMAL"] ? '' : 'style= "background-color:#dbd7cf"') + ">" + element["SEXE_ANIMAL"] + "</th>" 
          + "<th " + (element["INFO_ANIMAL"] == ancienneLigne["INFO_ANIMAL"] ? '' : 'style= "background-color:#dbd7cf"') + ">" + element["INFO_ANIMAL"] + "</th>" 
          + "<th " + (element["NOM_PROPRIETAIRE"] == ancienneLigne["NOM_PROPRIETAIRE"] ? '' : 'style= "background-color:#dbd7cf"') + ">" + element["NOM_PROPRIETAIRE"] + "</th>"
          + "<th " + (element["IS_PERDU_ANIMAL"] == 0 ? '' : 'style= "background-color:red"') + ">" +  (element["IS_PERDU_ANIMAL"] == 0 ? 'EN POSSESSION DE SON PROPRIETAIRE' : 'PERDU') + "</th></tr>";
          ancienneLigne = element;

      });
      donneeTable.innerHTML += ligne;


  }

  //Fonction qui tri les donnees de la requete fetch (contenu dans resultatRequete)
  //Paramètre : aucun
  //Resultat retourné : aucun
  function triTableau()
  {

    donnee = resultatRequete;
    
    var nouvelleDonnee = [];
    donneeTable.innerHTML = "";
    donnee.forEach((element) => {

          if (valideModificationTableau(element))
          {
            nouvelleDonnee.push(element);
          }
      });
      ajouteDonneeDansTable(nouvelleDonnee);
  }

  //Fonction qui vérifie si les éléments de la liste commence tous par la valeur contenu dans les inputs
  //Paramètre : element=array
  //Resultat retourné : Bolean

  function valideModificationTableau(element)
  {
    inputTableau = [document.getElementById("date_action_recherche"), document.getElementById("type_action_recherche"), document.getElementById("nom_animal_recherche"), document.getElementById("date_naissance_animal_recherche"), document.getElementById("espece_animal_recherche"), document.getElementById("race_animal_recherche"), document.getElementById("sexe_animal_recherche"), document.getElementById("info_animal_recherche")]
    if(element["DATE_ACTION"].toUpperCase().startsWith(inputTableau[0].value.toUpperCase()) && element["TYPE_ACTION"].toUpperCase().startsWith(inputTableau[1].value.toUpperCase()) && element["NOM_ANIMAL"].toUpperCase().startsWith(inputTableau[2].value.toUpperCase()) && element["DATE_NAISSANCE_ANIMAL"].toUpperCase().startsWith(inputTableau[3].value.toUpperCase()) && element["ESPECE_ANIMAL"].toUpperCase().startsWith(inputTableau[4].value.toUpperCase()) && element["RACE_ANIMAL"].toUpperCase().startsWith(inputTableau[5].value.toUpperCase()) && element["SEXE_ANIMAL"].toUpperCase().startsWith(inputTableau[6].value.toUpperCase()) && element["INFO_ANIMAL"].toUpperCase().startsWith(inputTableau[7].value.toUpperCase()))
    {
        return true;
    }
    return false;


  }


</script>
<?php $this->endsection()?>
</html>
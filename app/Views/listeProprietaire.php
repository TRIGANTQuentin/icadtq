<?php $this->extend('layout/main')?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php $this->section('css')?>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Liste des propriétaires</title>
  <link rel="stylesheet" href="/inc/liste_animal.css">
  <?php $this->endsection()?>
</head>



<body>
<?php $this->section('header')?>
<?php $this->endsection()?>
<?php $this->section('content');?>

  <div class="div-table">
    <table>
      <thead>
      <tr>
        <th>CODE</th><th>EMAIL</th><th>TEL</th><th>NOM</th><th>PRENOM</th><th>VILLE</th><th>ADRESSE</th><th>CODE POSTAL</th><th>Modifier</th><th>Supprimer</th>
      </tr>
      <th class = "barre_de_recherche"><i>&#x1F50D;</i><input type="text" id="code_proprietaire_recherche" oninput="triTableau()" placeholder="CODE"></th><th><i>&#x1F50D;</i><input type="text" id="email_proprietaire_recherche" oninput="triTableau()" placeholder="EMAIL"></th><th class = "barre_de_recherche"><i>&#x1F50D;</i><input type="text" id="telephone_proprietaire_recherche" oninput="triTableau()" placeholder="TELEPHONE"></th><th class = "barre_de_recherche"><i>&#x1F50D;</i><input type="text" id="nom_proprietaire_recherche" oninput="triTableau()" placeholder="NOM"></th><th class = "barre_de_recherche"><i>&#x1F50D;</i><input type="text" id="prenom_proprietaire_recherche" oninput="triTableau()" placeholder="PRENOM"></th><th class = "barre_de_recherche"><i>&#x1F50D;</i><input type="text" id="ville_proprietaire_recherche" oninput="triTableau()" placeholder="VILLE"></th><th class = "barre_de_recherche"><i>&#x1F50D;</i><input type="text" id="adresse_proprietaire_recherche" oninput="triTableau()" placeholder="ADRESSE"></th><th class = "barre_de_recherche"><i>&#x1F50D;</i><input type="text" id="code_postal_proprietaire_recherche" oninput="triTableau()" placeholder="CODE POSTAL"></th><th></th><th></th>

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

  var resultatRequete = <?php echo json_encode($liste_proprietaire);  ?> ;

  ajouteDonneeDansTable(resultatRequete);

  function ajouteDonneeDansTable(donnee)
  {
      var donneeTable = document.getElementById("donneeTable");
      var ligne = "";
      var ancienneLigne = [];
      donnee.forEach((element) => {
          ligne += "<tr style='text-align:center; vertical-align:middle'>" 
          + "<th>" + element["ID_PROPRIO"] + "</th>" 
          + "<th>" + element["EMAIL_PROPRIO"] + "</th>" 
          + "<th>" + element["NO_TELEPHONE_PROPRIO"].toString().replace(/\D+/g, '').replace(/(.{2})/g,"$1 ") + "</th>" 
          + "<th>" + element["NOM_PROPRIO"] + "</th>" 
          + "<th>" + element["PRENOM_PROPRIO"] + "</th>" 
          + "<th>" + element["VILLE_PROPRIO"] + "</th>" 
          + "<th>" + element["ADRESSE_PROPRIO"] + "</th>" 
          + "<th>" + element["CP_PROPRIO"] + "</th>"
          + "<th> <button value='" + element["ID_PROPRIO"]+"' onclick=modifierProprio(this) >Modifier</button></th>"
          + "<th> <button value='" + element["ID_PROPRIO"]+"' onclick=supprimerProprio(this)>Supprimer</button></th></tr>";

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
    inputTableau = [document.getElementById("code_proprietaire_recherche"), document.getElementById("email_proprietaire_recherche"), document.getElementById("telephone_proprietaire_recherche"), document.getElementById("nom_proprietaire_recherche"), document.getElementById("prenom_proprietaire_recherche"), document.getElementById("ville_proprietaire_recherche"), document.getElementById("adresse_proprietaire_recherche"), document.getElementById("code_postal_proprietaire_recherche")]
    if(element["ID_PROPRIO"].toUpperCase().startsWith(inputTableau[0].value.toUpperCase()) && element["EMAIL_PROPRIO"].toUpperCase().startsWith(inputTableau[1].value.toUpperCase()) && element["NO_TELEPHONE_PROPRIO"].toUpperCase().startsWith(inputTableau[2].value.toUpperCase()) && element["NOM_PROPRIO"].toUpperCase().startsWith(inputTableau[3].value.toUpperCase()) && element["PRENOM_PROPRIO"].toUpperCase().startsWith(inputTableau[4].value.toUpperCase()) && element["VILLE_PROPRIO"].toUpperCase().startsWith(inputTableau[5].value.toUpperCase()) && element["ADRESSE_PROPRIO"].toUpperCase().startsWith(inputTableau[6].value.toUpperCase()) && element["CP_PROPRIO"].toUpperCase().startsWith(inputTableau[7].value.toUpperCase()))
    {
        return true;
    }
    return false;


  }
  function modifierProprio(button){
    window.location.href = "/proprietaire/modification/" + button.value;

  }
  function supprimerProprio(boutonSupp)
  {

      //console.log("La ligne avec l'id " + boutonModifier.value + " est prêt à être supprimer !");
      //boutonModifier.style = "color:dark;background:red;";
      window.location.href = "/proprietaire/supprimer/" + boutonSupp.value;

  }


</script>
<?php $this->endsection()?>
</html>
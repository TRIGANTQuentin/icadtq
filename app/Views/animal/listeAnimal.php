
<?php 

$this->extend('layout/main');
 $this->section('session');
 $this->endsection();

?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php $this->section('css')?>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Liste des animaux</title>
  <link rel="stylesheet" href="/inc/liste_animal.css">
  <?php $this->endsection()?>
</head>



<body>
<?php $this->section('header')?>
<?php $this->endsection()?>
<?php $this->section('content')?>

<h1>Liste des animaux</h1>


  <div class="div-table">
    <table>
      <thead>
      <tr>
        <th>ID ICAD</th><th>IMAGE</th><th>NOM</th><th>DATE DE NAISSANCE</th><th>ESPECE</th><th>RACE</th><th>SEXE</th><th>INFO</th><th>PROPRIETAIRE</th><th>MODIFIER</th><th>SUPPRIMER</th><th>HISTORIQUE</th><th>SITUATION</th>
      </tr>
        <th class = "barre_de_recherche"><i>&#x1F50D;</i><input type="text" id="id_icad_recherche" oninput="triTableau()" placeholder="ID"></th><th></th><th class = "barre_de_recherche"><i>&#x1F50D;</i><input type="text" id="nom_animal_recherche" oninput="triTableau()" placeholder="NOM"></th><th class = "barre_de_recherche"><i>&#x1F50D;</i><input type="date" id="date_naissance_animal_recherche" oninput="triTableau()"></th><th class = "barre_de_recherche"><i>&#x1F50D;</i><input type="text" id="espece_animal_recherche" oninput="triTableau()" placeholder="ESPECE"></th><th class = "barre_de_recherche"><i>&#x1F50D;</i><input type="text" id="race_animal_recherche" oninput="triTableau()" placeholder="RACE"></th><th class = "barre_de_recherche"><i>&#x1F50D;</i><input type="text" id="sexe_animal_recherche" oninput="triTableau()" placeholder="SEXE"></th><th class = "barre_de_recherche"><i>&#x1F50D;</i><input type="text" id="info_animal_recherche" oninput="triTableau()" placeholder="INFO"></th><th></th><th></th><th></th><th></th><th></th>
      </thead>
      <tbody id="donneeTable">
</tbody>

    </table>
  </div>
  <?php $this->endsection()?>
  <?php $this->section('footer')?>
<?php $this->endsection()?>
</body>
<?php $this->section('script')?>

<script>

  //DEUX MANIERES DE CHARGER LE TABLEAU

  //1: EN JAVASCRIPT(mais ne marche sur certains navigateurs)
  //var resultatRequete = logTable();

  //2 : EN PHP
  var resultatRequete = <?php echo json_encode($listeAnimal); ?> ;
  ajouteDonneeDansTable(resultatRequete);

  //FONCTIONS
  
  //Fonction qui envoie une requete fetch pour charger le tableau
  //Paramètre : aucun
  //Resultat retourné : resultat=PromiseObject
  async function logTable()
  {
    const demande = await fetch('http://icad1.local/animal/requete')
    const resultat = await demande.json();
    ajouteDonneeDansTable(resultat);
    return resultat;
  }

  //Fonction qui ajoute les données dans le tbody du tableau de la page
  //Paramètre : aucun
  //Resultat retourné : aucun
  function ajouteDonneeDansTable(donnee)
  {
      var donneeTable = document.getElementById("donneeTable");
      var ligne = "";
      donnee.forEach((element) => {
          ligne += "<tr style='text-align:center; vertical-align:middle'><th>" + element["ID_ICAD"] + "</th>" + "<th><img class='imageTable' src= image/imgAnimalId" + element["ID_ICAD"] +'.jpg' + "></th>" + "<th>" + element["NOM_ANIMAL"] + "</th>" + "<th>" + element["DATE_NAISSANCE_ANIMAL"] + "<th>" + element["ESPECE_ANIMAL"] + "</th>" + "<th>" + element["RACE_ANIMAL"] + "</th>" + "<th>" + element["SEXE_ANIMAL"] + "</th>" + "<th>" + element["INFO_ANIMAL"] + "</th><th><a href = '/proprietaire/information/"+ element["ID_PROPRIO"] +"'>" + element["NOM_PROPRIO"] + "</a></th><th><button value = " + element["ID_ICAD"] + " type='button' onclick='modifier(this)'>Modifier</button></th> <th><button value = "+ element["ID_ICAD"] +" onclick='supprimer(this)' type='button'>Supprimer</button></th>" + "</th> <th><button value = " + element["ID_ICAD"] + " type='button' onclick='historique(this)'>Historique</button></th><th>"+ (element["IS_PERDU_ANIMAL"] == 1 ? ("<div>PERDU</div><button value = " + element["ID_ICAD"] + " type='button' onclick='declarerRetrouve(this)'>Déclarer l'animal retrouvé</button>")  : ("<div>EN POSSESSION DE SON PROPRIETAIRE</div><button value = " + element["ID_ICAD"] + " type='button' onclick='declarerPerduVol(this)'>Déclarer l'animal perdu</button>")) + "</th></tr>";

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
    inputTableau = [document.getElementById("id_icad_recherche"), document.getElementById("nom_animal_recherche"), document.getElementById("date_naissance_animal_recherche"), document.getElementById("espece_animal_recherche"), document.getElementById("race_animal_recherche"), document.getElementById("sexe_animal_recherche"), document.getElementById("info_animal_recherche")]
    if(element["ID_ICAD"].toUpperCase().startsWith(inputTableau[0].value.toUpperCase()) && element["NOM_ANIMAL"].toUpperCase().startsWith(inputTableau[1].value.toUpperCase()) && element["DATE_NAISSANCE_ANIMAL"].toUpperCase().startsWith(inputTableau[2].value.toUpperCase()) && element["ESPECE_ANIMAL"].toUpperCase().startsWith(inputTableau[3].value.toUpperCase()) && element["RACE_ANIMAL"].toUpperCase().startsWith(inputTableau[4].value.toUpperCase()) && element["SEXE_ANIMAL"].toUpperCase().startsWith(inputTableau[5].value.toUpperCase()) && element["INFO_ANIMAL"].toUpperCase().startsWith(inputTableau[6].value.toUpperCase()))
    {
        return true;
    }
    return false;


  }

  function modifier(boutonModifier)
  {

      //console.log("La ligne avec l'id " + boutonModifier.value + " est prêt à être modifier !");
      //boutonModifier.style = "color:dark;background:green;";
      window.location.href = "modification/" + boutonModifier.value;

  }

  function supprimer(boutonSupprimer)
  {

      //console.log("La ligne avec l'id " + boutonModifier.value + " est prêt à être supprimer !");
      //boutonModifier.style = "color:dark;background:red;";
      window.location.href = "supprimer/" + boutonSupprimer.value;

  }

  function historique(boutonHistorique)
  {
      window.location.href = "historique/" + boutonHistorique.value;
  }

  function declarerPerduVol(boutonDeclarerPerduVol)
  {
      window.location.href = "perte/" + boutonDeclarerPerduVol.value;
  }

  function declarerRetrouve(boutonDeclarerRetrouve)
  {
      window.location.href = "retrouve/" + boutonDeclarerRetrouve.value;
  }


</script>
<?php $this->endsection()?>
</html>
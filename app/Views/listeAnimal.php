<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>

  <?php
  ?>
  <style>
    div {
      height: 800px;
      width: 800px;
      overflow: auto;
      margin-top: 20px;
    }

    table, #donneeTable, th {
      border: 1px solid black;

    }
  </style>

  <div>
    <table>
      <thead>
      <tr>
        <th>Nom</th><th>Prénom</th><th>eMail</th><th>Modifier</th><th>Supprimer</th>
      </tr>
        <th><input type="text" id="a" onchange="triTableau()"></th><th><input type="text" id="b" onchange="triTableau()"></th><th><input type="text" id="c" onchange="triTableau()"></th>
      </thead>
      <tbody id="donneeTable">

    </table>
  </div>

</body>


<script>

  var resultatRequete = logTable();
  
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

          ligne += "<tr><th>" + element["ID_UTILISATEUR"] + "</th>" + "<th>" + element["NOM_UTILISATEUR"] + "</th>" + "<th>" + element["PRENOM_UTILISATEUR"] + "</th> <th><button value = " + element["ID_UTILISATEUR"] + " type='button' onclick='modifier(this)'>Modifier</button></th> <th><button value = "+ element["ID_UTILISATEUR"] +" onclick='supprimer(this)' type='button'>Supprimer</button></th></tr>";

      });
      donneeTable.innerHTML += ligne;


  }

  //Fonction qui tri les donnees de la requete fetch (contenu dans resultatRequete)
  //Paramètre : aucun
  //Resultat retourné : aucun
  function triTableau()
  {

    donnee = resultatRequete;
    resultatRequete.then(function(value) {
    var nouvelleDonnee = [];
    donneeTable.innerHTML = "";
    value.forEach((element) => {

          if (valideModificationTableau(element))
          {
            nouvelleDonnee.push(element);
          }
      });
      ajouteDonneeDansTable(nouvelleDonnee);
    })
  }

  //Fonction qui vérifie si les éléments de la liste commence tous par la valeur contenu dans les inputs
  //Paramètre : element=array
  //Resultat retourné : Bolean

  function valideModificationTableau(element)
  {
    inputTableau = [document.getElementById("a"), document.getElementById("b"), document.getElementById("c")]
    if(element["ID_UTILISATEUR"].toUpperCase().startsWith(inputTableau[0].value.toUpperCase()) && element["NOM_UTILISATEUR"].toUpperCase().startsWith(inputTableau[1].value.toUpperCase()) && element["PRENOM_UTILISATEUR"].toUpperCase().startsWith(inputTableau[2].value.toUpperCase()))
    {
        return true;
    }
    return false;


  }

  function modifier(boutonModifier)
  {

      console.log("La ligne avec l'id " + boutonModifier.value + " est prêt à être modifier !");
      boutonModifier.style = "color:dark;background:green;";

  }

  function supprimer(boutonModifier)
  {

      console.log("La ligne avec l'id " + boutonModifier.value + " est prêt à être supprimer !");
      boutonModifier.style = "color:dark;background:red;";

  }

</script>

</html>
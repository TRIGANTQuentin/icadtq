<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Déclarer un animal retrouvé</title>
</head>
<body>
<h1>Déclarer un animal retrouvé</h1>
<form action="/demande/retrouve" method="post" enctype="multipart/form-data">

    <h2>Information de l'animal</h2>
    <div id=""><a>Numéro de l'animal</a>
    <input type="text" id ="idAnimal" name ="numeroAnimal" required > </div>

    <h2>Pour vous contactez</h2>
    <div id="" ><a>Numéro de téléphone</a>
    <input type="text" id ="coordonnee" name ="coordonneeTelephone" ></div>

    <div id="" ><a>Email</a>
    <input type="text" id ="coordonnee" name ="coordonneeEmail" ></div>

    <h2>Informations supplémentaires</h2>
    <div id="" ><textarea id="infoAnimal" name="informationsSupplementairesAnimal"></textarea></div>

    <input id="validation-modification-animal" type="submit" value="Valider la modification">
    
</body>
</html>
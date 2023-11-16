<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form action="/animal/modification/" method="post">
    <div><a>Nom</a>
    <input type="text" id ="idAnimal" readonly name ="idAnimal" value=  <?php echo $unAnimal[0]["ID_ICAD"];?>></div>

    <div><a>Nom</a>
    <input type="text" id ="nomAnimal" name ="nomAnimal" value=  <?php echo $unAnimal[0]["NOM_ANIMAL"];?>></div>

    <div><a>Date de naissance</a>
    <input type="date" id ="dateDeNaissanceAnimal" name ="dateDeNaissanceAnima" value=  <?php echo $unAnimal[0]["DATE_NAISSANCE_ANIMAL"];?>></div>

    <div><a>Sexe</a>
    <input type="text" id ="sexeAnimal" name ="sexeAnimal" value=  <?php echo $unAnimal[0]["SEXE_ANIMAL"];?>></div>

    <div><a>Espèce</a>
    <input type="text" id ="especeAnimal" name ="especeAnimal" value=  <?php echo $unAnimal[0]["ESPECE_ANIMAL"];?>></div>

    <div><a>Race</a>
    <input type="text" id ="raceAnimal" name ="raceAnimal" value=  <?php echo $unAnimal[0]["RACE_ANIMAL"];?>></div>

    <div><a>Info</a>
    <textarea id="infoAnimal" name="infoAnimal"> <?php echo $unAnimal[0]["INFO_ANIMAL"];?> </textarea></div>

    <input type="submit">

    </form>
</body>
</html>
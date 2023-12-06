<?php $this->extend('layout/main')?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php $this->section('css')?>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification de l'animal</title>
    <link rel="stylesheet" href="/inc/modification.css">
    <?php $this->endsection()?>
</head>
<body>
<?php $this->section('header')?>
<?php $this->endsection()
//<input type="text" id ="sexeAnimal" name ="sexeAnimal" value=  <?php echo $unAnimal[0]["SEXE_ANIMAL"];
//<input type="text" id ="especeAnimal" name ="especeAnimal" value=  <?php echo $unAnimal[0]["ESPECE_ANIMAL"];?>>?>>
?>
<?php $this->section('content')?>

<?php ;?>
    <form action="/animal/modification" method="post" enctype="multipart/form-data">
    <div id="modification-animal-contenu">
    <div id="div-image-modification-animal">
    <img id="image-modification-animal"src="<?= site_url('animal/image/imgAnimalId'. $unAnimal[0]["ID_ICAD"] .'.jpg') ?>">
    </div>
    <div id="div-file-image-modification-animal">
    <input type="file" name="imageAnimal" id="imageAnimal">
    </div>
    <div id="id-modification-animal"><a>Id</a>
    <input type="text" id ="idAnimal" readonly name ="idAnimal" value=  <?php echo $unAnimal[0]["ID_ICAD"];?>></div>

    <div id="nom-modification-animal" ><a>Nom</a>
    <input type="text" id ="nomAnimal" name ="nomAnimal" value=  <?php echo $unAnimal[0]["NOM_ANIMAL"];?>></div>

    <div id="date-modification-animal" ><a>Date de naissance</a>
    <input type="date" id ="dateDeNaissanceAnimal" name ="dateNaissanceAnimal" value=  <?php echo $unAnimal[0]["DATE_NAISSANCE_ANIMAL"];?>></div>

    <div id="sexe-modification-animal" ><a>Sexe</a>
    <select name ="sexeAnimal" ><option value= <?php echo $unAnimal[0]["ID_SEXE"]?> > <?php echo $unAnimal[0]["SEXE_ANIMAL"]?></option><option value= <?php echo $sexeDifferent[0]["ID_SEXE"]?> > <?php echo $sexeDifferent[0]["NOM_SEXE"]?></option></select>
    </div>

    <div id="espece-modification-animal" ><a>Espèce</a>
    <select name ="especeAnimal"><option value= <?php echo $unAnimal[0]["ID_ESPECE"]?> > <?php echo $unAnimal[0]["ESPECE_ANIMAL"]?></option>
    <?php foreach ($especeDifferente as $espece)
    {
        echo "<option value=" .  $espece["ID_ESPECE"] . ">" . $espece["NOM_ESPECE"] . "</option>";
    }?>

</select>
    </div>

    <div id="race-modification-animal" ><a>Race</a>
    <input type="text" id ="raceAnimal" name ="raceAnimal" value=  '<?php echo $unAnimal[0]["RACE_ANIMAL"];?>'></div>

    <div id="info-modification-animal" ><a>Info</a>
    <textarea id="infoAnimal" name="infoAnimal"><?php echo $unAnimal[0]["INFO_ANIMAL"];?></textarea></div>

    <input id="validation-modification-animal" type="submit" value="Valider la modification">
    <div> 
    </form>

<?php $this->endsection()?>
<?php $this->section('footer')?>
<?php $this->endsection()?>
</body>
<?php $this->section('script')?>
<?php $this->endsection()?>
</html>
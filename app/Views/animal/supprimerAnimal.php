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
    <title>Supprimer un animal</title>
    <link rel="stylesheet" href="/inc/supprimerAnimal.css">
    <?php $this->endsection()?>
</head>
<body>
<?php $this->section('header')?>
<?php $this->endsection()?>
<?php $this->section('content')?>
<form action="/animal/supprimer" method="post">
<div id="nom-supprimer-animal" ><h1>Supprimer <?php echo $unAnimal[0]["NOM_ANIMAL"];?> ?</h1></div>
    <div id="supprimer-animal-contenu">
    <div id="div-image-supprimer-animal">
    <img id="image-supprimer-animal"src="<?= site_url('animal/image/imgAnimalId'. $unAnimal[0]["ID_ICAD"] .'.jpg') ?>">
    </div>
    <div id="id-modification-animal"><a>Id</a>
    <input type="text" id ="idAnimal" readonly value=  <?php echo $unAnimal[0]["ID_ICAD"];?>></div>

    <div id="nom-modification-animal" ><a>Nom</a>
    <input type="text" id ="nomAnimal" readonly value=  <?php echo $unAnimal[0]["NOM_ANIMAL"];?>></div>

    

    <input id="validation-supprimer-animal" type="submit" value="Valider">
    <div> 
    </form>
    <?php $this->endsection()?>
  <?php $this->section('footer')?>
<?php $this->endsection()?>
</body>
</html>
<?php $this->section('script')?>
<?php $this->endsection()?>
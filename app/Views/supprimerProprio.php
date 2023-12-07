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
    <title>Supprimer un proprio</title>
    <link rel="stylesheet" href="/inc/supprimerAnimal.css">
    <?php $this->endsection()?>
</head>
<body>
<?php $this->section('header')?>
<?php $this->endsection()?>
<?php $this->section('content')?>
<form action="/proprietaire/supprimer" method="post">
<div id="nom-supprimer-animal" ><h1>Supprimer <?php echo $unProprio["NOM_PROPRIO"];?> ?</h1></div>  
    <div id="id-modification-animal"><a>Id</a>
    <input type="text" id ="idProprio" readonly value=  <?php echo $unProprio["ID_PROPRIO"];?>></div>

    <div id="nom-modification-animal" ><a>Nom</a>
    <input type="text" id ="nom" readonly value=  <?php echo $unProprio["NOM_PROPRIO"];?>></div>


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
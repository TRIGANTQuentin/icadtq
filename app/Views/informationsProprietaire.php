<?php 
 $this->extend('layout/main');
 $this->section('session');
 $this->endsection();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php 
 $this->section('css');
 ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Information propriétaire</title>
    <?php $this->endsection();?>
</head>
<body>
<?php $this->section('header')?>
<?php $this->endsection()?>

<?php $this->section('content')?>
<div id="informations-proprietaire-contenu">

<div id="">
<h1>Informations de <?php echo $info_proprietaire["NOM_PROPRIO"];?> <?php echo $info_proprietaire["PRENOM_PROPRIO"];?></h1>
</div>

    <div id="id-information-proprietaire"><a>CODE</a>
    <input type="text" id ="idAnimal" readonly value=  <?php echo $info_proprietaire["ID_PROPRIO"];?>></div>

    <div id="nom-information-proprietaire" ><a>NOM</a>
    <input type="text" id ="nomAnimal" readonly value=  <?php echo $info_proprietaire["NOM_PROPRIO"];?>></div>

    <div id="prenom-information-proprietaire" ><a>PRENOM</a>
    <input type="text" id ="nomAnimal" readonly value=  <?php echo $info_proprietaire["PRENOM_PROPRIO"];?>></div>

    <div id="email-information-proprietaire" ><a>EMAIL</a>
    <input type="text" id ="nomAnimal" readonly value=  <?php echo $info_proprietaire["EMAIL_PROPRIO"];?>></div>

    <div id="telephone-information-proprietaire" ><a>TELEPHONE</a>
    <input type="text" id ="nomAnimal" readonly value=  <?php echo $info_proprietaire["NO_TELEPHONE_PROPRIO"];?>></div>

    <div id="ville-information-proprietaire" ><a>VILLE</a>
    <input type="text" id ="raceAnimal" readonly value=  <?php echo $info_proprietaire["VILLE_PROPRIO"];?>></div>

    <div id="adresse-information-proprietaire" ><a>ADRESSE</a>
    <input type="text" id ="raceAnimal" readonly value=  '<?php echo $info_proprietaire["ADRESSE_PROPRIO"];?>'></div>

    <div id="cp-information-proprietaire" ><a>CODE POSTAL</a>
    <input type="text" id ="raceAnimal" readonly value=  <?php echo $info_proprietaire["CP_PROPRIO"];?>></div>
</div>

<?php $this->endsection()?>
<?php $this->section('footer')?>
<?php $this->endsection()?>
</body>
<?php $this->section('script')?>
<?php $this->endsection()?>
</html>

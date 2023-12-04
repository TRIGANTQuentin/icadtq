<?php $this->extend('layout/main')?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <?php $this->section('css')?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="/inc/index.css">
    <?php $this->endsection()?>
</head>
<body>
<?php $this->section('header')?>
<?php $this->endsection()?>
<?php $this->section('content')?>
<div id="accueil-menu-index">
<div id="retrouve-animal-div-menu">
<div id="retrouve-animal-title-menu" class="titre-menu-accueil">Animal retrouvé</div>
<a href=""><img id="retrouve-animal-img-menu" class="image-menu-accueil" src="\img\accueil-menu\non-authentifie\retrouve-animal-menu.jpg"></a>
</div>
<div id="liste-animal-div-menu"> 
<div class="titre-menu-accueil">Liste des animaux</div>
<a href="/animal/liste_animal"><img id="liste-animal-img-menu" class="image-menu-accueil" src="\img\accueil-menu\authentifie\liste-animal-menu.jpg"></a>
</div>
<div id="nouvel-animal-div-menu"> 
<div class="titre-menu-accueil">Ajouter un nouvel animal</div>
<a href="/animal/nouveau"><img id="nouvel-animal-img-menu" class="image-menu-accueil" src="\img\accueil-menu\authentifie\nouvel-animal-menu.jpg"></a>
</div>
<div id="perdu-animal-div-menu"> 
<div class="titre-menu-accueil">Déclarer un animal perdu</div>
<a href=""><img id="perdu-animal-img-menu" class="image-menu-accueil" src="\img\accueil-menu\authentifie\perdu-animal-menu.jpg"></a>
</div>
<div id="nouveau-proprietaire-div-menu"> 
<div class="titre-menu-accueil">Ajouter un nouveau propriétaire</div>
<a href="/proprio/nouveau"><img id="nouveau-proprietaire-img-menu" class="image-menu-accueil" src="\img\accueil-menu\authentifie\nouveau-proprietaire-menu.jpg"></a>
</div>
</div>
<?php $this->endsection()?>
<?php $this->section('footer')?>
<?php $this->endsection()?>
</body>
<?php $this->section('script')?>
<?php $this->endsection()?>

</html>
<?php $this->extend('layout/main') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->section('css') ?>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification du proprietaire</title>
    <link rel="stylesheet" href="inc/register.css">
    <?php $this->endsection() ?>
</head>

<body>
    <?php $this->section('header') ?>
    <?php $this->endsection()
        ?>
    <?php $this->section('content') ?>

    <form action="/proprietaire/modification" method="POST">

        <div id="container"><a>Id</a>
            <input type="text" id="idProprio" readonly name="idProprio" value=<?php echo $unProprio["ID_PROPRIO"]; ?>>
        </div>

        <div id="container"><a>Nom</a>
            <input type="text" id="nomProprio" name="nom" value=<?php echo $unProprio["NOM_PROPRIO"]; ?>>
        </div>

        <div id="container"><a>Prenom</a>
            <input type="text" id="prenomProprio" name="prenom" value=<?php echo $unProprio["PRENOM_PROPRIO"]; ?>>
        </div>

        <div id="container"><a>Adresse</a>
            <input type="text" id="adresse" name="adresse" value=<?php echo $unProprio["ADRESSE_PROPRIO"]; ?>>
        </div>

        <div id="container"><a>Vilee</a>
            <input type="ville" id="ville" name="ville" value=<?php echo $unProprio["VILLE_PROPRIO"] ?>>
        </div>
        <br>
        <div id="container"><a>code_postal</a>
            <input type="text" id="codepostal" name="code_postal" value='<?php echo $unProprio["CP_PROPRIO"]; ?>'>
        </div>

        <div id="container"><a>phone</a>
            <input type="tel" id="phone" name="phone" value=<?php echo $unProprio["NO_TELEPHONE_PROPRIO"]; ?>>
        </div>
        <br>
        <div id="container"><a>email</a>
            <input type="text" id="email" name="email" value=<?php echo $unProprio["EMAIL_PROPRIO"]; ?>>
        </div>

        <input id="container" type="submit" value="Valider la modification">
        <div>
    </form>

    <?php $this->endsection() ?>
    <?php $this->section('footer') ?>
    <?php $this->endsection() ?>
</body>
<?php $this->section('script') ?>
<?php $this->endsection() ?>

</html>
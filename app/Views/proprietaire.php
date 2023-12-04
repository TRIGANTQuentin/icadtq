<?php $this->extend('layout/main') ?>
<html>

<head>
    <?php $this->section('css')?>
    <meta charset="utf-8">
    <base href="<?= base_url() ?>" />
    <title>Nouveau propriétaire</title>
    <link href="inc/register.css" rel="stylesheet">
    <?php $this->endsection() ?>
</head>

<body>
    <?php $this->section('header') ?>
    <?php $this->endsection() ?>
    <?php $this->section('content') ?>
    
    
    <form action="" method="POST">
        <div class="container">
            <h1>Nouveau Propriétaire</h1>
            <h2>Remplissez ce formulaire pour renseigner un nouveau propriétaire</h2>

            <label for="email"><b>Email</b></label>
            <input type="text" placeholder="Entrer Email" name="email" id="email" required>

            <label for="nom"><b>Nom</b></label>
            <input type="text" placeholder="Entrer Nom" name="nom" id="nom" required>

            <label for="prenom"><b>Prenom</b></label>
            <input type="text" placeholder="Entrer Prenom" name="prenom" id="prenom" required>


            <label for="adresse"><b>Adresse</b></label>
            <input type="text" placeholder="Entrer Adresse" name="adresse" id="adresse" required>

            <label for="ville"><b>Ville</b></label>
            <input type="text" placeholder="Entrer ville" name="ville" id="ville" required>

            <label for="code_postal"><b>Code_postal</b></label>
            <input type="text" placeholder="Entrer code_postal" name="code_postal" id="cod_postal" required>


            <label for="phone">Entrer votre numéro de téléphone:</label>
            <input type="tel" id="phone" name="phone" pattern="[0-9]{10}" required />

            <button type="submit" class="registerbtn">Register</button>

        </div>
    </form>
    <?php $this->endsection() ?>
    <?php $this->section('footer') ?>
    <?php $this->endsection() ?>
</body>
<?php $this->section('script') ?>
<?php $this->endsection() ?>
</html>
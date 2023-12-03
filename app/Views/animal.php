<?php $this->extend('layout/main') ?>
<html>

<head>
    <?php $this->section('css') ?>
    <meta charset="utf-8">
    <base href="<?= base_url() ?>" />
    <title>Nouvel animal</title>
    <link href="inc/register.css" rel="stylesheet">
    <?php $this->endsection() ?>
</head>

<body>
    <?php $this->section('header') ?>
    <?php $this->endsection() ?>
    <?php $this->section('content') ?>

    <form action="" method="POST">
        <div class="container">
            <h1>Nouveau</h1>
            <h2>Remplissez ce formulaire pous ajouter un animal</h2>
            <hr>

            <label for="nom"><b>Nom</b></label>
            <input type="text" placeholder="Entrer name" name="name" id="name" required>

            <label for="sexe"><b>Sexe</b></label>
            <select name="sexe" id="sexe">
                <option value="">Sexe de l'animal</option>
                <?php
                foreach ($sexe["sexe"] as $row)
                {
                    echo '<option value="'.$row["ID_SEXE"].'">'.$row["NOM_SEXE"]."</option>";
                }
                ?>
            </select>
            <br><br>   

            <label for="espece"><b>Espece</b></label>
            <select name="espece" id="espece">
                <option value="">Espece de l'animal</option>
                <?php
                foreach ($espece["espece"] as $row)
                {
                    echo '<option value="'.$row["ID_ESPECE"].'">'.$row["NOM_ESPECE"]."</option>";
                }
                ?>
            </select>
            <br><br>

            <label for="race"><b>Race</b></label>
            <input type="text" placeholder="Entrer race" name="race" id="race" required>

            <label for="Signes"><b>Signes particuliers</b></label>
            <input type="text" placeholder="Entrer signes" name="signes" id="signes" required>

            <label for="pet-select">Sélectionnez un propriétaire:</label>

            <select name="proprietaire" id="proprietaire">
                <option value="">Choisissez un propriétaire</option>
                <?php
                foreach ($proprietaire["proprietaire"] as $row)
                {
                    echo '<option value="'.$row["ID_PROPRIO"].'">'.$row["NOM_PROPRIO"]."</option>";
                }
                ?>
            </select>
                <br><br>
            <label for="date"> date de naissance:</label>
            <input type="date" id="date" name="date" id="date" required />

            <button type="submit" class="registerbtn">Envoyer</button>
        </div>

    </form>
    <?php $this->endsection() ?>

<?php $this->section('footer') ?>
<?php $this->endsection() ?>
</body>
<?php $this->section('script') ?>
<?php $this->endsection() ?>
</html>
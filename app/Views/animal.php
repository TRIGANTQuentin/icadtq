<head>
    <meta charset="utf-8">
    <title>nouveau</title>
    <link href="inc/register.css" rel="stylesheet">
</head>
<html>
<form action="/animal/nouveau/", method="POST">
    <div class="container">

        <h1>Inscription</h1>
        <h2>Remplissez ce formulaire pous vous inscrire</h2>
        <hr>

        <label for="nom"><b>Nom</b></label>
        <input type="text" placeholder="Entrer name" name="name" id="name" required>

        <label for="message"><b>Message</b></label>
        <input type="text" placeholder="Entrer message" name="message" id="message" required>

        <label for="sexe"><b>Sexe</b></label>
        <input type="text" placeholder="Entrer sexe" name="sexe" id="sexe" required>

        <label for="espece"><b>Espece</b></label>
        <input type="text" placeholder="Entrer Espece" name="espece" id="espece" required>

        <label for="Signes"><b>Signes particuliers</b></label>
        <input type="text" placeholder="Entrer signes" name="signes" id="signes" required>

        <label for="race"><b>Race</b></label>
        <input type="text" placeholder="Entrer race" name="race" id="race" required>


        <label for="date">Entrer la date:</label>
        <input type="date" id="date" name="date" id="date" required/>

        <br><br>

        <button type="submit" class="registerbtn">Envoyer</button>
    </div>
</form>

</html>
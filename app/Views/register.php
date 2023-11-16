<head>
    <meta charset="utf-8">
    <title>Inscription</title>
    <link href="inc/register.css" rel="stylesheet">
</head>
<html>
<form action="", method="POST">
    <div class="container">
        <h1>Inscription</h1>
        <h2>Remplissez ce formulaire pous vous inscrire</h2>
        <hr>

        <label for="email"><b>Email</b></label>
        <input type="text" placeholder="Entrer Email" name="email" id="email" required>

        <label for="nom"><b>Nom</b></label>
        <input type="text" placeholder="Entrer Nom" name="nom" id="nom" required>

        <label for="prenom"><b>Prenom</b></label>
        <input type="text" placeholder="Entrer Prenom" name="prenom" id="prenom" required>

        <label for="fonction">fonction exercée:</label>

        <select name="fonction" id="fonction">
            <option value="">--Choisissez une option--</option>
            <option value="dog">Vétérinaire</option>
            <option value="cat">Policier</option>
            <option value="hamster">Fourrière</option>
            <option value="parrot">éleveur</option>
        </select>
        <br><br>


        <label for="adresse"><b>Adresse</b></label>
        <input type="text" placeholder="Entrer Adresse" name="adresse" id="adresse" required>

        <label for="ville"><b>Ville</b></label>
        <input type="text" placeholder="Entrer ville" name="ville" id="ville" required>

        <label for="code_postal"><b>Code_postal</b></label>
        <input type="text" placeholder="Entrer code_postal" name="code_postal" id="cod_postal" required>


        <label for="phone">Entrer votre numéro de téléphone:</label>
        <input type="tel" id="phone" name="phone" pattern="[0-9]{10}" required/>

        <br><br>



        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Entrer Password" name="psw" id="psw" required>


        <label for="psw-repeat"><b>Repeat Password</b></label>
        <input type="password" placeholder="repeter Password" name="psw-repeat" id="psw-repeat" required>
        <hr>

        <button type="submit" class="registerbtn">Register</button>
    </div>
</form>

</html>
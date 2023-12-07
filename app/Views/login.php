<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="/inc/login.css">
</head>
<body>

<header>
<img id="icad-img-menu" src="\img\header\logo-icad.png">
</header>

<form action="/login" method="post" id="login-form">
    <div id="connexion-utilisateur">
    <input type="text" name="email-utilisateur" id="email-utilisateur" placeholder="E-mail">
    <input type="password" name="mdp-utilisateur" id="mdp-utilisateur" placeholder="Mot de passe">
    <input type="submit" id="validation-connexion">
    </div>
</form>
    
</body>
</html>
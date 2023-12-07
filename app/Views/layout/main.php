<!-- 

    COMPOSITION DES PAGES DU SITE 

    LES DIFFERENTES SECTIONS DU SITE :

    (   - *nom de la section* = *utilité de la section*
                                *comment la mettre sur une page*
    ) 

        - css =     import le css general du site 
                    debut après <head> / fin avant </head>

        - header =  en-tête du site
                    debut après <body> / juste à la suite du debut

        - content = contenu de la page
                    debut à la fin de la section header / a la fin du contenu du site
        
        - footer = pied de page
                    debut après la fin de la section contenu / juste avant le </body>html
        
        - script = script de la page
                    debut après le </body> / juste avant le </html>

-->

<!-- SECTION CSS -->

<?php 
$session = session();
if(!(empty($session->get('logged_in'))))
{
    
}
else 
{
    header('Location: /'); 
    exit;
}
?>
<?php $this->renderSection("css");?>
<!-- import du css general du site -->
<link rel="stylesheet" href="/inc/main.css">
<!-- SECTION HEADER -->
<?php $this->renderSection("header"); ?>
<!-- début en-tête du site -->
<header>
    <img id="icad-img-menu" src="\img\header\logo-icad.png">
    <nav class="menu"> <!-- début de la partie déroulante animal et propriétaire du menu -->
        <ul class="liste-menu">
            <li class="partie-menu"><a class="titre-partie-menu">Animaux</a>
                <ul class="sous-partie-menu">
                    <li class="element-menu"><a class="lien-element" href="/animal/liste_animal">Liste des animaux</a></li>
                    <li class="element-menu"><a class="lien-element" href="/animal/nouveau">Ajouter un animal</a></li>
                </ul>
            </li>
            <li class="partie-menu"><a class="titre-partie-menu">Propriétaire</a>
                <ul class="sous-partie-menu">
                    <li class="element-menu"><a class="lien-element" href="/proprietaire/liste">Liste des propriétaires</a></li>
                    <li class="element-menu"><a class="lien-element" href="/proprio/nouveau">Ajouter un propriétaire</a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="accueil-menu">
        <p><a href="/" class="lien-menu">Accueil</a></p>
    </div> <!-- début de la partie accueil du menu -->
    <form action="/inscription" id="inscription" method="GET">
        <input type="submit"  value="Inscription"/>
    </form>
    <form action="/deconnexion" id="deconnexion" method="POST">
        <input type="submit"  value="Deconnexion"/>
    </form>
</header>
<!-- fin en-tête du site -->

<!-- début du div qui représente le contenu du site, utilisé pour le css et mettre le contenu entre l'en-tête et le pied de page -->
<div class="content">
    <!-- SECTION CONTENT -->
    <?php $this->renderSection("content"); ?>
    <!-- fin du div qui représente le contenu du site, utilisé pour le css et mettre le contenu entre l'en-tête et le pied de page -->
</div>
<!-- SECTION FOOTER -->
<?php $this->renderSection("footer"); ?>
<!-- début pied de page -->
<footer></footer>
<!-- fin pied de page -->
<!-- SECTION SCRIPT -->
<?php $this->renderSection("script"); ?>
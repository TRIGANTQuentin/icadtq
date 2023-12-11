<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//$routes->get('/', 'Home::index');

//Page accueil
$routes->get('/', 'Home::index');
//$routes->get('/', 'Home::pageConnexion');

//Page local pour création de compte
$routes->get('/inscription', 'Register::page');
$routes->post('/inscription', 'Register::validation');


//Utilisé pour afficher des images contenus dans un dossier privé (ex: images des animaux qui ne doivent pas être disponible pour tout le monde)
$routes->get('animal/image/(:segment)', 'ImagesPrivates::animal/$1');

$routes->get('/demande/retrouve', 'Animal::pageDemandeRetrouve');
$routes->post('/demande/retrouve', 'Animal::bddDemandeRetrouve');

//Page animal retrouvé (sans authentification)
$routes->get('/animal/retrouve/(:num)', 'Animal::pageRetrouve/$1');
$routes->post('/animal/retrouve', 'Animal::bddRetrouve');

//Pour le fetch de la page accueil authentifié
//UTILISE POUR LE JAVASCRIPT DE LA LISTE ANIMAL (mais désactivé donc supprimable)
$routes->get('/animal/requete', 'Animal::listeAnimal');

//Page pour connexion
$routes->get('/login', 'Home::pageConnexion');
$routes->post('/login', 'Home::validationConnexion');

//Controller déconnexion
$routes->post('/deconnexion', 'Home::deconnexion');

//Page accueil authentifié
$routes->get('/animal/liste_animal', 'Animal::pageListe');

//Page historique déclaration d'un animal de la liste
$routes->get('/animal/historique/(:num)', 'Animal::pageHistorique/$1');


//Page modification animal déclaré 
$routes->get('/animal/modification/(:num)', 'Animal::pageModification/$1');
$routes->post('/animal/modification', 'Animal::bddModification');

//Page nouvel animal 
$routes->get('/animal/nouveau/', 'Animal::pageNouveau');
$routes->post('/animal/nouveau/', 'Animal::bddNouveau');

//Page nouveau propriétaire
$routes->get('/proprio/nouveau', 'Proprietaire::index');
$routes->post('/proprio/nouveau', 'Proprietaire::ajouter');

//Page perte/vol animal 
$routes->get('/animal/perte/(:num)', 'Animal::pagePerteVol/$1');
$routes->post('/animal/perte/', 'Animal::bddPerteVol');

//Page supprimer animal 
$routes->get('/animal/supprimer/(:num)', 'Animal::pageSupprimer/$1');
$routes->post('/animal/supprimer/', 'Animal::bddSupprimer');

//Page informations propriétaire sélectionné
$routes->get('/proprietaire/information/(:num)', 'Proprietaire::information/$1');

//Page liste et informations propriétaires
$routes->get('/proprietaire/liste/', 'Proprietaire::pageListe');


//Page modification propriétaire
$routes->get('/proprietaire/modification/(:num)', 'Proprietaire::pageModification/$1');
$routes->post('/proprietaire/modification', 'Proprietaire::bddModification');

//page supprimer proprio
$routes->get('/proprietaire/supprimer/(:num)', 'Proprietaire::pageSupprimer/$1');
$routes->post('/proprietaire/supprimer', 'Proprietaire::bddSupprimer');

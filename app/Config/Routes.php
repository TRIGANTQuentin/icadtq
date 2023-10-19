<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//$routes->get('/', 'Home::index');

//Page accueil
$routes->get('/', 'Home::index');

//Page local pour création de compte
$routes->get('/inscription', 'Register::index');
$routes->post('/inscription', 'Register::validation');

//Page animal retrouvé (sans authentification)
$routes->get('/animal/retrouve', 'Animal::pageRetrouve');
$routes->post('/animal/retrouve', 'Animal::bddRetrouve');

//Page pour connexion
$routes->get('/login', 'Home::pageConnexion');
$routes->post('/login', 'Home::validationConnexion');

//Page accueil authentifié
$routes->get('/animal/liste_animal', 'Animal::pageListe');

//Page historique déclaration d'un animal de la liste
$routes->get('/animal/historique/(:num)', 'Animal::pageHistorique/$1');

//Page modification animal déclaré 
$routes->get('/animal/modification/(:num)', 'Animal::pageModification/$1');
$routes->post('/animal/modification/', 'Animal::bddModification');

//Page nouvel animal 
$routes->get('/animal/nouveau/', 'Animal::pageNouveau');
$routes->post('/animal/nouveau/', 'Animal::bddNouveau');

//Page perte/vol animal 
$routes->get('/animal/perte/(:num)', 'Animal::pagePerteVol/$1');
$routes->post('/animal/perte/)', 'Animal::bddPerteVol');

//Page informations propriétaire sélectionné
$routes->get('/proprietaire/information/(:num)', 'Proprietaire::information/$1');

//Page liste et informations propriétaires
$routes->get('/proprietaire/liste/', 'Proprietaire::pageListe');

//Page nouveau propriétaire
$routes->get('/proprietaire/nouveau/', 'Proprietaire::pageNouveau');
$routes->post('/proprietaire/nouveau/', 'Proprietaire::bddNouveau');

//Page modification propriétaire
$routes->get('/proprietaire/modification/(:num)', 'Proprietaire::pageModification/$1');
$routes->post('/proprietaire/modification/', 'Proprietaire::bddModification');
<?php
namespace App\Controllers;

class Animal extends BaseController
{
    public function pageNouveau()
    {
        return view('animal');
    }

    //Pour l'accueil authentifié
    public function pageListe()
    {
        return view("listeAnimal");
    }

    //Pour le fetch de l'accueil authentifié
    public function listeAnimal()
    {
        $model = model('App\Models\Animal');
        $result['listeAnimal'] = $model->listeAnimal();
        return view("requeteListeAnimal", $result);
    }
}

?>
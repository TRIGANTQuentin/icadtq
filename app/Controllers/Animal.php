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
    
    public function pageModification($id)
    {
        $model = model('App\Models\Animal');
        $result['unAnimal'] = $model->unAnimal($id);
        return view("modifierAnimal", $result);

    }

    public function bddModification()
    {
        $model = model('App\Models\Animal');
        $result['unAnimal'] = $model->modificationUnAnimal();
        redirect("/animal/liste_animal/");
    }

}

?>
<?php

namespace App\Controllers;
use \App\Models\proprio;


class Proprietaire extends BaseController
{
    public function index(): string
    {
           return view('proprietaire');

    }
    public function ajouter(){

        $model = model('App\Models\proprio');
        try{
            $model->ajouterProprietaire();
            return Utilitaires::success('cree avec succes');
        }catch(\Exception $err){
            return Utilitaires::error("Erreur serveur interne");
        }
  
    }

    public function information($id)
    {
        $model = model('App\Models\proprio');
        $result['info_proprietaire'] = $model->unProprietaire($id);
        return view("informationsProprietaire",$result);
    }

    public function pageListe()
    {
        $model = model('App\Models\proprio');
        $result['liste_proprietaire'] = $model->listeProprietaire();
        return view("listeProprietaire", $result);
    }
}
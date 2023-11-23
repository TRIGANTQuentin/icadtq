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
        $arr = [
            "EMAIL_PROPRIO" =>  $this ->request->getPost('email'),
            "NOM_PROPRIO" =>  $this ->request->getPost('nom'),
            "PRENOM_PROPRIO" =>  $this ->request->getPost('prenom'),
            "ADRESSE_PROPRIO" =>  $this ->request->getPost('adresse'),
            "VILLE_PROPRIO" =>  $this ->request->getPost('ville'),
            "CP_PROPRIO" =>  $this ->request->getPost('code_postal'),
            "NO_TELEPHONE_PROPRIO" =>  $this ->request->getPost('phone')
        ];
        $registre = new proprio();
        $registre->insert($arr);

        //echo json_encode($arr);
        //return ;
        return redirect() -> back()
;
        
    }

    public function modifier(){
        
    }
}
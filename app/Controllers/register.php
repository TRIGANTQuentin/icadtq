<?php

namespace App\Controllers;
use \App\Models\Utilisateur;

class register extends BaseController
{
    public function index(): string
    {
           return view('register');

    }
    public function validation(){
        $arr = [
            "EMAIL_UTILISATEUR" =>  $this ->request->getPost('email'),
            "NOM_UTILISATEUR" =>  $this ->request->getPost('nom'),
            "PRENOM_UTILISATEUR" =>  $this ->request->getPost('prenom'),
            "FONCTION_UTILISATEUR" =>  $this ->request->getPost('fonction'),
            "ADRESSE_UTILISATEUR" =>  $this ->request->getPost('adresse'),
            "VILLE_UTILISATEUR" =>  $this ->request->getPost('ville'),
            "CP_UTILISATEUR" =>  $this ->request->getPost('code_postal'),
            "NO_TELEPHONE_UTILISATEUR" =>  $this ->request->getPost('phone'),
            "MDP_HASH_UTILISATEUR" =>  password_hash($this ->request->getPost('psw') , PASSWORD_BCRYPT),
        ];
        $registre = new Utilisateur();
        $registre->insert($arr);

        //echo json_encode($arr);
        //return ;
        return redirect() -> back();
    }

    public function modifier(){
        
    }
}
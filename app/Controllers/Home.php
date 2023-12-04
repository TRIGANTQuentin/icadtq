<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $session = session();
        if (empty($session->get('logged_in')))
        {
            return view('menu-non-connecter');
        }
        return redirect()->to('/animal/liste_animal');
    }

    public function pageConnexion()
    {
        return view('login');
    }

    public function validationConnexion()
    {
        $model = model('App\Models\Utilisateur');
        $validation = $model->loginValide();
         if ($validation)
         {
            $_SESSION['connecter'] = true;
            return redirect()->to('/animal/liste_animal');
         }
         else
         {
            return redirect()->to('/');
         }

    }

    public function deconnexion()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }
}
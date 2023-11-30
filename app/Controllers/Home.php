<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        session_start();
        if (empty($_SESSION['connecter']))
        {
            return view('menu-non-connecter');
        }
        return view('index');
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
            session_start();
            $_SESSION['connecter'] = true;
            return view('index');
         }
         else
         {
            return view('index');
         }

    }

    public function deconnexion()
    {
        session_start();
        session_destroy();
        return $this->index();
    }
}
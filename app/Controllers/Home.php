<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        if (empty(session()-> get['connecter']))
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
            session() ->set(['connecter' => true]);
            return view('index');
         }
         else
         {
            return view('index');
         }

    }

    public function deconnexion()
    {
        session() -> set('');
        return $this->index();
    }
}
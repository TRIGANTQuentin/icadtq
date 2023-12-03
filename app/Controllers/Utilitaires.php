<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Utilitaires extends BaseController
{
    static function error($messageErreur, $redirectTo = '') { // si un suel argument redirect back sinon tu dis ou on redirect
        //session() -> setFlashdata(['error' => $messageErreur]);
        if ($redirectTo){
            return redirect() -> to(base_url($redirectTo));
        }else return redirect()->to('proprietaire/liste'); 
    }

    static function success($messageSuccess, $redirectTo = '') { // si un suel argument redirect back sinon tu dis ou on redirect
        //session() -> setFlashdata(['success' => $messageSuccess]);
        if ($redirectTo){
            return redirect() -> to(base_url($redirectTo));
        }else return redirect()->to('proprietaire/liste'); 
    }
}

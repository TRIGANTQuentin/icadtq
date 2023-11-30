<?php

namespace App\Filters;

use App\Controllers\Register;
use App\Controllers\Utilitaires;
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class isConnected implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if(!Register::isConnected()){
            return Utilitaires::error(('Connectez vous avant d\'acceder a la dite page'));
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}
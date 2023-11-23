<?php

namespace App\Controllers;

class ImagesPrivates extends BaseController
{
    public function index(): string
    {
        return view('index');
    }

    public function animal($nomImage): string
    {
         // Fichier des images téléchargés données par les utilisateurs
         $dosserImagesAnimalPrivé = WRITEPATH . 'uploads/img/animal' . DIRECTORY_SEPARATOR;

         // Verifie que l'image demandée est une image
         if (preg_match('/^[a-zA-Z0-9]+\.(jpg|jpeg|png|gif)$/', $nomImage)) {
            $nomImage = $dosserImagesAnimalPrivé . $nomImage;
 
             // Vérifie que l'image existe
             if (file_exists($nomImage)) {
                 // Créer le conteneur de l'image avec la bonne extention
                 $typeImage = mime_content_type($nomImage);
                 header('Content-Type: ' . $typeImage);
 
                 // Ecris le contenu de l'image
                 readfile($nomImage);
                 exit;
             }
         }
 
         // Si l'image n'existe pas, renvoie une image qui affiche que l'image n'a pas été trouvé ("image not found")
         header('Content-Type: image/jpg');
         readfile( WRITEPATH . 'uploads/img' . DIRECTORY_SEPARATOR . 'not-found.jpg');
         exit;
    }
}

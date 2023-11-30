<?php
namespace App\Controllers;
use App\Models\proprio;
use App\Models\sexe;
use App\Models\espece;
use CodeIgniter\Files\File;

class Animal extends BaseController
{
    protected $helpers = ['form'];
    public function pageNouveau()
    {
        // instancier le(s) modele(s) nécessaires à la récupération des données
        $propriomodel= new proprio();
        $sexemodel = new sexe();
        $especemodel = new espece();

        // Réccupérer données nécessaires à partir de la base

        $data['proprietaire'] = $propriomodel ->orderBy('NOM_PROPRIO','ASC')->findAll();
        $data['sexe'] = $sexemodel ->findAll();
        $data['espece'] = $especemodel->findAll();

        // appeler la vue avec les données récupérées et la retourner au client
        return view('animal', [
            'proprietaire' => $data,
            'sexe'=> $data,
            'espece'=>$data
        ]);
    }

    //Pour l'accueil authentifié
    public function pageListe()
    {
        return view("animal/listeAnimal");
    }

    //Pour le fetch de l'accueil authentifié
    public function listeAnimal()
    {
        $model = model('App\Models\Animal');
        $result['listeAnimal'] = $model->listeAnimal();
        return view("animal/json/requeteListeAnimal", $result);
    }
    
    public function pageModification($id)
    {
        $model = model('App\Models\Animal');
        $result['unAnimal'] = $model->unAnimal($id);
        $result['id'] = $id;
        return view("animal/modifierAnimal", $result);

    }

    public function bddModification()
    {
        

            $config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 100;
            $config['max_width']            = 1024;
            $config['max_height']           = 768;
        
            
            $img = $this->request->getFile('imageAnimal');
            if ($img->getSize() != null)
            {
            $filepath =  $img->move( WRITEPATH . 'uploads/' .'img/animal/', 'imgAnimalId' . $_POST['idAnimal'] . '.jpg' , true);
    
            $data = ['uploaded_fileinfo' => new File($filepath)];
            }
        
        $model = model('App\Models\Animal');
        $result['unAnimal'] = $model->modifierUnAnimal();
        return redirect()->to('animal/liste_animal'); 
    }
    public function ajouterAnimal(){
        $arr = [
            "PRORPIO" => $this->request->getPost('proprietaire'),
            "NOM_ANIMAL" =>  $this ->request->getPost('email'),
            "DATE_NAISSANCE_ANIMAL" =>  $this ->request->getPost('nom'),
            "INFO_ANIMAL" =>  $this ->request->getPost('prenom'),
            "PHOTO_ANIMAL" =>  $this ->request->getPost('adresse'),
            "SEXE_ANIMAL" =>  $this ->request->getPost('ville'),
            "ESPECE_ANIMAL" =>  $this ->request->getPost('code_postal'),
            "RACE_ANIMAL" =>  $this ->request->getPost('phone')
        ];
        $registre = new proprio();
        $registre->insert($arr);

        //echo json_encode($arr);
        //return ;
        return redirect() -> back()
;
        
    }

}

?>
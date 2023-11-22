<?php
namespace App\Controllers;
use CodeIgniter\Files\File;

class Animal extends BaseController
{
    protected $helpers = ['form'];
    public function pageNouveau()
    {
        return view('animal');
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
    
            $filepath =  $img->move( WRITEPATH . 'uploads/' .'img/animal/', 'imgAnimalId' . $_POST['idAnimal'] . '.jpg' , true);
    
            $data = ['uploaded_fileinfo' => new File($filepath)];
        
        $model = model('App\Models\Animal');
        $result['unAnimal'] = $model->modifierUnAnimal();
        return redirect()->to('animal/liste_animal'); 
    }

}

?>
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

    public function bddNouveau()
    {
        $model = model('App\Models\Animal');
        $result['nom_animal'] = $model->nouvelanimal();
        

        return redirect()->to('animal/liste_animal');
    }

    //Pour l'accueil authentifié
    public function pageListe()
    {
        
        $model = model('App\Models\Animal');
        $result['listeAnimal'] = $model->listeAnimal();
        return view("animal/listeAnimal", $result);
    }

    //Pour le fetch de l'accueil authentifié
    public function listeAnimal()
    {
        $model = model('App\Models\Animal');
        $result['listeAnimal'] = $model->listeAnimal();
        return view("animal/json/requeteListeAnimal", $result);
    }
    
    //historiqueAnimal
    public function pageHistorique($id)
    {
        $model = model('App\Models\Animal');
        $result['historiqueAnimal'] = $model->historiqueAnimal($id);
        return view("animal/historiqueAnimal", $result);
    }
    
    public function pageModification($id)
    {
        $model = model('App\Models\Animal');
        $result['unAnimal'] = $model->unAnimal($id);
        $result['sexeDifferent'] = $model->sexeDifferent($result['unAnimal'][0]["ID_SEXE"]);
        $result['especeDifferente'] = $model->especeDifferente($result['unAnimal'][0]["ID_ESPECE"]);
        return view("animal/modifierAnimal", $result);

    }

    public function bddModification()
    {
        
            
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

    public function pageSupprimer($id)
    {
        $session = session();
        $session->set(["dernierID_animal" => $id]);

        $model = model('App\Models\Animal');
        $result['unAnimal'] = $model->unAnimal($id);
        $result['sexeDifferent'] = $model->sexeDifferent($result['unAnimal'][0]["ID_SEXE"]);
        $result['especeDifferente'] = $model->especeDifferente($result['unAnimal'][0]["ID_ESPECE"]);
        return view("animal/supprimerAnimal", $result);

    }

    public function bddSupprimer()
    {    $session = session();

        $model = model('App\Models\Animal');
        
        $model->supprimerUnAnimal($session->get("dernierID_animal"));
        return redirect()->to('animal/liste_animal'); 
    }


    public function ajouterAnimal(){
        $arr = [
            "PRORPIO" => $this->request->getPost('proprietaire'),
            "NOM_ANIMAL" =>  $this ->request->getPost('name'),
            "DATE_NAISSANCE_ANIMAL" =>  $this ->request->getPost('date'),
            "INFO_ANIMAL" =>  $this ->request->getPost('signes'),
            "PHOTO_ANIMAL" =>  $this ->request->getPost('adresse'),
            "SEXE_ANIMAL" =>  $this ->request->getPost('sexe'),
            "ESPECE_ANIMAL" =>  $this ->request->getPost('espece'),
            "RACE_ANIMAL" =>  $this ->request->getPost('race')
        ];
        $registre = new proprio();
        $registre->insert($arr);

    }
    public function pagePerteVol($id)
    {
        $model = model('App\Models\Animal');
        $result['unAnimal'] = $model->unAnimal($id);
        $session = session();
        $session->set(["dernierID_animal" => $id]);
        return view("animalPerduVol", $result);
    }

    public function bddPerteVol()
    {
        $model = model('App\Models\Animal');
        $session = session();
        $model->perduVolAnimal($session->get("dernierID_animal"));
        return redirect()->to('animal/liste_animal'); 
    }

    public function pageRetrouve($id)
    {
        $model = model('App\Models\Animal');
        $result['unAnimal'] = $model->unAnimal($id);
        $session = session();
        $session->set(["dernierID_animal" => $id]);
        return view("animalRetrouve", $result);
    }

    public function bddRetrouve()
    {
        $model = model('App\Models\Animal');
        $session = session();
        $model->retrouveAnimal($session->get("dernierID_animal"));
        return redirect()->to('animal/liste_animal'); 
    }

    public function pageDemandeRetrouve()
    {
        return view("animalDemandeRetrouve");
    }

    public function bddDemandeRetrouve()
    {
        $model = model('App\Models\Animal');
        $model->demandeRetrouveAnimal();
        return redirect()->to('animal/liste_animal');
    }
}

?>
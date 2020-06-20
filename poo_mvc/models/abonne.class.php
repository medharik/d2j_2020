<?php

namespace App;

use App\Idao;
use App\Helper;

class Abonne extends Idao
{
    public static $table = "abonnes";
    public $id;
    //uploader 
    //$infos=$_FILES['name_dans_form']

    use Helper;


    //oneToMany
    public function paiements()
    {
        $paiements = Paiement::findBy("abonne_id=?", [$this->id]);
        return $paiements;
    }
}

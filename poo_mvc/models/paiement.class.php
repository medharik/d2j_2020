<?php

namespace App;

use App\Idao;
use PDOException;

class Paiement extends Idao
{

    public static $table = "paiements";
    public $user_id;
    public $abonne_id;
    public function __construct($user_id = 0, $abonne_id = 0)
    {

        // echo "je suis le constrcuteur de " . get_called_class();
        $this->user_id = $user_id;
        $this->abonne_id = $abonne_id;
    }
    //many to one 
    public function  abonne()
    {

        $abonne =   Abonne::find($this->abonne_id);
        return $abonne;
    }
    public function  user()
    {
        $user =   User::find($this->user_id);
        return $user;
    }
}

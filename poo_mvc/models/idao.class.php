<?php
// CREATE TABLE users(
//     id INT PRIMARY KEY AUTO_INCREMENT, 
//     login VARCHAR(100) UNIQUE ,
//     passe VARCHAR(100) NOT null,
//     pseudo VARCHAR(100)  ,
//     role VARCHAR(200) ,
//     CONSTRAINT ck_role  CHECK  (role IN ('admin','agent') )

//     )
// CREATE TABLE abonnes(
//     id INT PRIMARY KEY AUTO_INCREMENT ,
//     nomprenom VARCHAR(100),
//     inscrit_le DATE ,
//     photo VARCHAR(255),
//     genre VARCHAR(10) ,
//     email VARCHAR(100),
//     tel VARCHAR(20),

//     adresse  text ,
//     created_at  TIMESTAMP DEFAULT CURRENT_TIMESTAMP()



// )
// include("imetier.class.php");
namespace App;

use App\Imetier;
use PDO;
use PDOException;

class Idao implements Imetier
{

    private   static  $_CNX; // varaible de classe
    public static $table = "users";
    public const TVA = 20;
    public static  function connect()
    {



        $options = [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            PDO::ATTR_ERRMODE =>  PDO::ERRMODE_EXCEPTION
        ];
        try {
            // self:: => access static et cte 
            if (!self::$_CNX) {
                self::$_CNX = new PDO("mysql:host=localhost;dbname=d2j_sport;", 'root', '', $options);
            }
        } catch (PDOException $e) {
            die("Erreur de connexion a la base de donnees " . $e->getMessage());
        }
    }
    public static  function store(array $data)
    {
        try {
            $keys = array_keys($data);
            $str_keys = join(",", $keys);

            $inter = function ($valeur) {
                return "?";
            };
            $in = array_map($inter, $keys);
            $p_intero = join(',', $in);
            $rp = self::$_CNX->prepare("insert into " . static::$table . " ($str_keys) values($p_intero)");
            $rp->execute(array_values($data));
        } catch (PDOException $e) {
            die("Erreur d'ajout de " . static::$table . " " . $e->getMessage());
        }
    }
    public  static  function update($data, ?int $id = 0)
    {
        // $data=['login'=>'ali','passe'=>1234]
        try {
            $keys = array_keys($data); //['login','passe]


            $inter = function ($valeur) {
                return "$valeur=?";
            };
            $in = array_map($inter, $keys); //['login','passe'] =>['login'=>'?', 'passe'=>'?']

            $p_intero = join(',', $in); //"login=?,passe=?"
            $rp = self::$_CNX->prepare("update  " . static::$table . " set $p_intero where id=? ");
            $valeurs = array_values($data); //'ali','1234'
            $valeurs[] = $id;
            $rp->execute($valeurs);
        } catch (PDOException $e) {
            die("Erreur de modification de " . static::$table . " " . $e->getMessage());
        }
    }
    public static function all(): array
    {
        try {

            // prepare une requete sql (stmt)
            $rp = self::$_CNX->prepare("select * from " . static::$table . "  order by id desc ");
            // executer 
            //echo "la table est " .$table;
            $rp->execute();
            $result = $rp->fetchAll(); //['id'=>10,'libelle'=>'hp'] 
            return $result;
        } catch (PDOException $e) {
            die("Erreur dre recuperation des " . static::$table . "  " . $e->getMessage());
        }
    }

    public static  function find(int $id)
    {

        try {

            // prepare une requete sql (stmt)
            $rp = self::$_CNX->prepare("select * from " . static::$table . " where  id=?  ");
            // executer 
            $rp->execute([$id]);
            $result = $rp->fetch(); //['id'=>10,'libelle'=>'hp'] 
            return $result;
        } catch (PDOException $e) {
            die("Erreur dre recuperation  (find) de " . static::$table . "  " . $e->getMessage());
        }
    }
    //findBy("login like ?",['ali'])
    public static  function findBy($condition, $data_values)
    {

        try {

            // prepare une requete sql (stmt)
            $rp = self::$_CNX->prepare("select * from " . static::$table . " where $condition order by id desc ");
            // executer 
            $rp->execute($data_values);
            $result = $rp->fetchAll(); //['id'=>10,'libelle'=>'hp'] 
            return $result;
        } catch (PDOException $e) {
            die("Erreur dre recuperation des " . static::$table . "  " . $e->getMessage());
        }
    }
    public static  function delete($id)
    {

        try {

            // prepare une requete sql (stmt)
            $rp = self::$_CNX->prepare("delete  from " . static::$table . " where id=?");
            // executer 
            $rp->execute([$id]);
        } catch (PDOException $e) {
            die("Erreur de suppression  des " . static::$table . "  " . $e->getMessage());
        }
    }
}

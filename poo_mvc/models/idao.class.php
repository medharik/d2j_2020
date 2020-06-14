<?php
// CREATE TABLE users(
//     id INT PRIMARY KEY AUTO_INCREMENT, 
//     login VARCHAR(100) UNIQUE ,
//     passe VARCHAR(100) NOT null,
//     pseudo VARCHAR(100)  ,
//     role VARCHAR(200) ,
//     CONSTRAINT ck_role  CHECK  (role IN ('admin','agent') )

//     )
// include("imetier.class.php");
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
        $keys = array_keys($data);
        $str_keys = join(",", $keys);

        $inter = function ($valeur) {
            return "?";
        };
        $in = array_map($inter, $keys);
        $p_intero = join(',', $in);
        $rp = self::$_CNX->prepare("insert into " . self::$table . " ($str_keys) values($p_intero)");
        $rp->execute(array_values($data));
    }
    public static  function update($data, ?int $id = 0)
    {
    }
    public static  function  all(): array
    {
    }
    public static  function find(int $id)
    {
    }
    public static  function findBy(string $condition)
    {
    }
    public static  function delete($id)
    {
    }
}

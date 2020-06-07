              <?php
                define('MAX_FILE_SIZE', 8 * 1024 * 1024);
                // on 3 extensions de traiements php avec les base de donnees
                //1-  mysql_ => + facile , -obsolete (-securite)
                //2- mysqli_ => +facile , -securite (injection sql ) - mono SGBD
                //3- PDO => - : Pre-requis : POO , + POO , +MULTI-SGBD    (JDBC) +  SECURISE
                // // LDD
                // -- CREATE DATABASE d2j_2020
                // -- USE d2j_2020
                // CREATE TABLE produit(
                // id  INT PRIMARY KEY auto_increment ,
                // libelle VARCHAR(200) NOT null,
                // prix FLOAT NOT NULL ,
                // chemin VARCHAR(255) DEFAULT 'images/icon.png'

                // )
                //fonction connexion
                // Extension vs code : php intellisense (autocomplete) , php intelephense
                function connect()
                {

                    // $p=new PDO("mysql:host=localhost;dbname=d2j_2020;port=3307;charset=utf8",'root','');

                    $options = [
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                        PDO::ATTR_ERRMODE =>  PDO::ERRMODE_EXCEPTION
                    ];
                    try {
                        $link = new PDO("mysql:host=localhost;dbname=d2j_2020;", 'root', '', $options);

                        return $link;
                    } catch (PDOException $e) {
                        die("Erreur de connexion a la base de donnees " . $e->getMessage());
                    }
                    // $link->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC)
                }
                // ajout
                // store("hp",9000);
                function store($libelle, $prix, $categorie_id = NULL, $chemin = "")
                {
                    try {

                        // connexion
                        $cnx = connect();
                        // prepare une requete sql (stmt)
                        $rp = $cnx->prepare("insert into produit(libelle,prix,categorie_id,chemin) values(?,?,?,?)");
                        // executer 
                        $rp->execute([$libelle, $prix, $categorie_id, $chemin]);
                    } catch (PDOException $e) {
                        die("Erreur d'ajout de produit " . $e->getMessage());
                    }
                }

                //supprimer 
                function delete(int $id)
                {
                    try {

                        // connexion
                        $cnx = connect();
                        // prepare une requete sql (stmt)
                        $rp = $cnx->prepare("delete from produit where id=?");
                        // executer 
                        $rp->execute([$id]);
                    } catch (PDOException $e) {
                        die("Erreur de supression  du produit d'id=$id " . $e->getMessage());
                    }
                }
                //modifier

                function update($libelle, $prix, $id, $categorie_id = NULL, $chemin = "")
                {
                    try {

                        // connexion
                        $cnx = connect();
                        if (empty($chemin)) {
                            // prepare une requete sql (stmt)
                            $rp = $cnx->prepare("update produit set libelle=?, prix=? , categorie_id=? where id=?");
                            // executer 
                            $rp->execute([$libelle, $prix, $categorie_id, $id]);
                        } else {
                            // prepare une requete sql (stmt)
                            $rp = $cnx->prepare("update produit set libelle=?, prix=?  , categorie_id,chemin=?where id=?");
                            // executer 
                            $rp->execute([$libelle, $prix, $categorie_id, $chemin,  $id]);
                        }
                    } catch (PDOException $e) {
                        die("Erreur de maj de produit " . $e->getMessage());
                    }
                }

                //all
                //recuperer tous les records depuis la table produit
                function all(): array
                {
                    try {
                        // connexion
                        $cnx = connect();
                        // prepare une requete sql (stmt)
                        $rp = $cnx->prepare("select * from produit  order by id desc ");
                        // executer 
                        $rp->execute();
                        $result = $rp->fetchAll(); //['id'=>10,'libelle'=>'hp'] 
                        return $result;
                    } catch (PDOException $e) {
                        die("Erreur dre recuperation des produits  " . $e->getMessage());
                    }
                }
                //find : retourne un record par id
                function find(int $id)
                {

                    try {

                        // connexion
                        $cnx = connect();
                        // prepare une requete sql (stmt)
                        $rp = $cnx->prepare("select * from produit  where  id=? ");
                        // executer 
                        $rp->execute([$id]);
                        $result = $rp->fetch();
                        // $result = $rp->fetchAll();
                        // // [0=>['libelle'=>'hp']]
                        // $produit=$result[0];
                        return $result;
                    } catch (PDOException $e) {
                        die("Erreur de find  " . $e->getMessage());
                    }
                }

                //findBy

                //uploader 
                //$infos=$_FILES['name_dans_form']
                function uploader($infos = array(), $dossier = "images")

                {
                    $tmp = $infos['tmp_name'];
                    $nom = $infos['name'];
                    $size = filesize($tmp);

                    if (!is_dir($dossier)) {
                        mkdir($dossier, 777, true);
                    }

                    $parts = pathinfo($nom);
                    $ext = strtolower($parts['extension']);

                    //unicite
                    $new_name = md5(time() . rand(0, 999999)) . ".$ext";
                    $destination = "$dossier/$new_name";
                    $autorises = ['jpg', 'png', 'gif'];
                    if (!in_array($ext, $autorises)) {
                        die("type de fichier non autorisé");
                    } else if ($size > MAX_FILE_SIZE) {
                        die("la taille maximale autorisee est " . round(MAX_FILE_SIZE / (1024 * 1024), 2) . "Mo");
                    } else if (!move_uploaded_file($tmp, $destination)) {

                        die("Une erreur est survenue lors de l'upload de ce fichier");
                    };

                    return $destination;
                }

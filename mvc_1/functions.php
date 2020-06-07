              <?php
                define('MAX_FILE_SIZE', 8 * 1024 * 1024);
                // on 3 extensions de traiements php avec les base de donnees
                //1-  mysql_ => + facile , -obsolete (-securite)
                //2- mysqli_ => +facile , -securite (injection sql ) - mono SGBD
                //3- PDO => - : Pre-requis : POO , + POO , +MULTI-SGBD    (JDBC) +  SECURISE (injection injection )
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
                //ALTER TABLE produit ADD CONSTRAINT fk_pro_cat FOREIGN key (categorie_id ) REFERENCES categorie(id) 
                // ON DELETE CASCADE
                // on delete resrict 
                // on delete set null 
                // on delete action 
                function connect()
                {

                    // $p=new PDO("mysql:host=localhost;dbname=d2j_2020;port=3307;charset=utf8",'root','');

                    $options = [
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                        PDO::ATTR_ERRMODE =>  PDO::ERRMODE_EXCEPTION
                    ];
                    try {
                        $link = new PDO("mysql:host=localhost;dbname=d2j_2020", 'root', '', $options);

                        return $link;
                    } catch (PDOException $e) {
                        die("Erreur de connexion a la base de donnees " . $e->getMessage());
                    }
                    // $link->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC)
                }
                // ajout
                // store("hp",9000);

                function store_categorie($nom)
                {
                    try {

                        // connexion
                        $cnx = connect();
                        // prepare une requete sql (stmt)
                        $rp = $cnx->prepare("insert into categorie(nom) values(?)");
                        // executer 
                        $rp->execute([$nom]);
                    } catch (PDOException $e) {
                        die("Erreur d'ajout de categorie" . $e->getMessage());
                    }
                }

                //supprimer 
                function delete(int $id, $table = "produit")
                {
                    try {

                        // connexion
                        $cnx = connect();
                        // prepare une requete sql (stmt)
                        $rp = $cnx->prepare("delete from $table where id=?");
                        // executer 
                        $rp->execute([$id]);
                    } catch (PDOException $e) {
                        die("Erreur de supression  du $table d'id=$id " . $e->getMessage());
                    }
                }
                //modifier
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
                            $rp = $cnx->prepare("update produit set libelle=?, prix=?  , categorie_id=?,chemin=?where id=?");
                            // executer 
                            $rp->execute([$libelle, $prix, $categorie_id, $chemin,  $id]);
                        }
                    } catch (PDOException $e) {
                        die("Erreur de maj de produit " . $e->getMessage());
                    }
                }



                function update_categorie($nom, $id)
                {

                    $cnx = connect();
                    try {
                        // connexion
                        // prepare une requete sql (stmt)
                        $rp = $cnx->prepare("update categorie set nom=? where id=?");
                        // executer 
                        $rp->execute([$nom, $id]);
                    } catch (PDOException $e) {
                        die("Erreur de maj de cat " . $e->getMessage());
                    }
                }

                //all
                //recuperer tous les records depuis la table produit
                //all("categorie")
                function all($table = "produit", $condition = ""): array
                {
                    try {
                        // connexion
                        $cnx = connect();
                        // prepare une requete sql (stmt)
                        if (!empty($condition)) {

                            $rp = $cnx->prepare("select * from $table  where $condition order by id desc ");
                        } else
                            $rp = $cnx->prepare("select * from $table   order by id desc ");
                        // executer 
                        $rp->execute();
                        $result = $rp->fetchAll(); //['id'=>10,'libelle'=>'hp'] 
                        return $result;
                    } catch (PDOException $e) {
                        die("Erreur dre recuperation des $table  " . $e->getMessage());
                    }
                }
                function all_produit_categorie(): array
                {
                    try {
                        // connexion
                        $cnx = connect();
                        // prepare une requete sql (stmt)
                        $rp = $cnx->prepare("select p.* , c.nom  as nom_cat from  produit p  left join categorie c on p.categorie_id=c.id  order by id desc ");
                        // executer 
                        $rp->execute();
                        $result = $rp->fetchAll(); //['id'=>10,'libelle'=>'hp'] 
                        return $result;
                    } catch (PDOException $e) {
                        die("Erreur dre recuperation des produit cats  " . $e->getMessage());
                    }
                }
                //find : retourne un record par id
                function find(int $id, $table = "produit")
                {

                    try {

                        // connexion
                        $cnx = connect();
                        // prepare une requete sql (stmt)
                        $rp = $cnx->prepare("select * from $table  where  id=? ");
                        // executer 
                        $rp->execute([$id]);
                        $result = $rp->fetch();
                        // $result = $rp->fetchAll();
                        // // [0=>['libelle'=>'hp']]
                        // $produit=$result[0];
                        return $result;
                    } catch (PDOException $e) {
                        die("Erreur de find  de $table " . $e->getMessage());
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

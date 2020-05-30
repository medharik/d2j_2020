              <?php
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
                    $options = [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC];
                    $link = new PDO("mysql:host=localhost;dbname=d2j_2020;", 'root', '', $options);
                    // $link->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC)
                    return $link;
                }
                // ajout
                // store("hp",9000);
                function store($libelle, $prix)
                {
                    // connexion
                    $cnx = connect();
                    // prepare une requete sql (stmt)
                    $rp = $cnx->prepare("insert into produit(libelle,prix) values(?,?)");
                    // executer 
                    $rp->execute([$libelle, $prix]);
                }

                //supprimer 
                function delete(int $id)
                {
                    // connexion
                    $cnx = connect();
                    // prepare une requete sql (stmt)
                    $rp = $cnx->prepare("delete from produit where id=?");
                    // executer 
                    $rp->execute([$id]);
                }
                //modifier

                function update($libelle, $prix, $id)
                {
                    // connexion
                    $cnx = connect();
                    // prepare une requete sql (stmt)
                    $rp = $cnx->prepare("update produit set libelle=?, prix=? where id=?");
                    // executer 
                    $rp->execute([$libelle, $prix, $id]);
                }

                //all
                //recuperer tous les records depuis la table produit
                function all(): array
                {
                    // connexion
                    $cnx = connect();
                    // prepare une requete sql (stmt)
                    $rp = $cnx->prepare("select * from produit  order by id desc ");
                    // executer 
                    $rp->execute();
                    $result = $rp->fetchAll();//['id'=>10,'libelle'=>'hp']

                    return $result;
                }
                //find : retourne un record par id
                function find(int $id)
                {
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
                }
//findBy

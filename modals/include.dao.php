<?php

require_once ('config/config.php');
class includeDao
{
    private $Bdd;

    public function __construct()
    {
        $this->Bdd = Config::getConnexion();
    }
    //Cette methode verifie si la page existe
    public function existedPage($id_page){
        try
        {
            //Ici l'id sera hashe
            $request=$this->Bdd->prepare('SELECT id FROM kna_page WHERE md5(id)=? and breaked=0');
            $request->execute(array($id_page));
            $nb=$request->rowCount();
            if($nb==1){
                return true;
            }
            else{
                return false;
            }
        }
        catch(Exception $e){
            die('Erreur : '.$e->getMessage());
        }
    }
    //Cette methode verifie si le membre existe
    public function existedMembre($id_membre){
        try
        {
            //Ici l'id sera hashe
            $request=$this->Bdd->prepare('SELECT id FROM kna_membre WHERE id=? and breaked=0');
            $request->execute(array($id_membre));
            $nb=$request->rowCount();
            if($nb==1){
                return true;
            }
            else{
                return false;
            }
        }
        catch(Exception $e){
            die('Erreur : '.$e->getMessage());
        }
    }
    //Cette methode verifie si une page existe et qu'elle appartient a un membre
    public function existedPageMember($id_page,$id_membre){
        try
        {
            //Ici l'id sera hashe
            $request=$this->Bdd->prepare('SELECT id FROM kna_espace WHERE id_page=? and md5(id_membre)=? and breaked=0');
            $request->execute(array($id_page,$id_membre));
            $nb=$request->rowCount();
            if($nb==1){
                return true;
            }
            else{
                return false;
            }
        }
        catch(Exception $e){
            die('Erreur : '.$e->getMessage());
        }
    }
    //Cette methode verifie si une page existe et qu'elle appartient a un membre
    public function getSomCompte($id_membre){
        try
        {
            //Ici l'id sera hashe
            $request=$this->Bdd->prepare('SELECT somme FROM kna_compte WHERE md5(id_membre)=? and breaked=0');
            $request->execute(array($id_membre));
            $somme=$request->fetch(PDO::FETCH_OBJ);
            return $somme;
        }
        catch(Exception $e){
            die('Erreur : '.$e->getMessage());
        }
    }


    //Cette methode recupere toutes les pages d'un membre dans son espace et sa somme d'argent totale
    public function getEspace($id_membre){
        try
        {
            $request=$this->Bdd->prepare('SELECT * FROM kna_page kp
                                          INNER JOIN kna_espace ke
                                          WHERE md5(kp.id)= ke.id_page AND md5(ke.id_membre)=? AND ke.breaked=0');
            $request->execute(array($id_membre));
            $results=$request->fetchAll(PDO::FETCH_OBJ);
            $request->closeCursor();
            return $results;

        }
        catch(Exception $e){
            die('Erreur : '.$e->getMessage());
        }
    }
    //Cette methode recupere toutes les pages d'un annonceur
    public function getPanel($id_annonceur){
        try
        {
            $request=$this->Bdd->prepare('SELECT id,titre,prix_page,nb_max,nb_vues,created_at FROM kna_page WHERE md5(id_annonceur)=? AND breaked=0');
            $request->execute(array(md5($id_annonceur)));
            $results=$request->fetchAll(PDO::FETCH_OBJ);
            $request->closeCursor();
            return $results;

        }
        catch(Exception $e){
            die('Erreur : '.$e->getMessage());
        }
    }
    //La fonction de date
    public function Date($datetime)
    {
        $now = time();
        $created = strtotime($datetime);
        // La différence est en seconde
        $diff = $now - $created;
        $m = ($diff) / (60); // on obtient des minutes
        $h = ($diff) / (60 * 60); // ici des heures
        $j = ($diff) / (60 * 60 * 24); // jours
        $s = ($diff) / (60 * 60 * 24 * 7); // et semaines
        if ($diff < 60) { // "il y a x secondes"
            return 'Il y a ' . $diff . ' secondes';
        } elseif ($m < 60) { // "il y a x minutes"
            $minute = (floor($m) == 1) ? 'minute' : 'minutes';
            return 'Il y a ' . floor($m) . ' ' . $minute;
        } elseif ($h < 24) { // " il y a x heures, x minutes"
            $heure = (floor($h) <= 1) ? 'heure' : 'heures';
            $dateFormated = 'Il y a ' . floor($h) . ' ' . $heure;
            if (floor($m - (floor($h)) * 60) != 0) {
                $minute = (floor($m) == 1) ? 'minute' : 'minutes';
                $dateFormated .= ', ' . floor($m - (floor($h)) * 60) . ' ' . $minute;
            }
            return $dateFormated;
        } elseif ($j < 7) { // " il y a x jours, x heures"
            $jour = (floor($j) <= 1) ? 'jour' : 'jours';
            $dateFormated = 'Il y a ' . floor($j) . ' ' . $jour;
            if (floor($h - (floor($j)) * 24) != 0) {
                $heure = (floor($h) <= 1) ? 'heure' : 'heures';
                $dateFormated .= ', ' . floor($h - (floor($j)) * 24) . ' ' . $heure;
            }
            return $dateFormated;
        } elseif ($s < 5) { // " il y a x semaines, x jours"
            $semaine = (floor($s) <= 1) ? 'semaine' : 'semaines';
            $dateFormated = 'Il y a ' . floor($s) . ' ' . $semaine;
            if (floor($j - (floor($s)) * 7) != 0) {
                $jour = (floor($j) <= 1) ? 'jour' : 'jours';
                $dateFormated .= ', ' . floor($j - (floor($s)) * 7) . ' ' . $jour;
            }
            return $dateFormated;
        } else { // on affiche la date normalement
            return strftime("%d %B %Y à %H:%M", $created);
        }
    }

    //Cette methode de prendre la page generale et unit
    public function getPage($id_page){
        try
        {

            $request=$this->Bdd->prepare('SELECT * FROM kna_page kp
                                          INNER JOIN kna_annonceur ka
                                          WHERE date_fin > now() AND kp.id_annonceur= ka.id AND md5(kp.id)=? AND kp.breaked=0');

            $request->execute(array($id_page));
            $resultats=$request->fetchAll(PDO::FETCH_OBJ);
            $request->closeCursor();
            return $resultats;

        }
        catch(Exception $e){
            die('Erreur : '.$e->getMessage());
        }
    }
    //Cette methode de prendre les contacts de la page generale et unit
    public function getContacts($id_annonceur){
        try
        {
            $request=$this->Bdd->prepare('SELECT contact FROM kna_contact WHERE id_annonceur=? AND breaked=0');
            $request->execute(array($id_annonceur));
            $resultats=$request->fetchAll(PDO::FETCH_OBJ);
            $request->closeCursor();
            return $resultats;

        }
        catch(Exception $e){
            die('Erreur : '.$e->getMessage());
        }
    }
    //Cette methode de prendre les images de la page generale et unit
    public function getImages($id_page){
        try
        {
            $request=$this->Bdd->prepare('SELECT image FROM kna_image WHERE md5(id_page)=? AND breaked=0');
            $request->execute(array($id_page));
            $resultats=$request->fetchAll(PDO::FETCH_OBJ);
            $request->closeCursor();
            return $resultats;

        }
        catch(Exception $e){
            die('Erreur : '.$e->getMessage());
        }
    }



    //Cette methode verifie l'existence d'un membre qui veut confirmer son inscription
    public function confirmRegister($id,$pseudo,$tel,$token){
        $request=$this->Bdd->prepare('SELECT id FROM kna_membre WHERE md5(id)=? and pseudo=? and telephone=? and password=? and activited=0');
        $request->execute(array($id,$pseudo,$tel,$token));
        $nb=$request->rowCount();
        if($nb==1){
            $request->closeCursor();
            return true;
        }
        else{
            $request->closeCursor();
            return false;
        }

    }

    //Cette methode verifie l'existence d'un membre qui veut confirmer son inscription
    public function reconfirmRegister($id){
        $request=$this->Bdd->prepare("UPDATE kna_membre SET activited = 1 WHERE md5(id) = ?");
        $request->execute(array($id));
        $request->closeCursor();

        $request=$this->Bdd->prepare('SELECT id FROM kna_membre WHERE md5(id)=? and activited=1');
        $request->execute(array($id));
        $nb=$request->rowCount();
        if($nb==1){
            $request->closeCursor();
            return true;
        }
        else{
            $request->closeCursor();
            return false;
        }

    }

    //Cette methode retourne toutes les pages
    function getPages($num_page){
        try
        {
            $array = array();
            $request=$this->Bdd->prepare('SELECT kp.id,kp.titre,kp.nb_vues,ki.image  FROM kna_page kp
                                                  INNER JOIN kna_image ki
                                                  WHERE ki.id_page=kp.id  AND  kp.date_fin > now() AND kp.breaked=0 GROUP BY kp.id ');
            $request->execute(array());
            $nb=$request->rowCount();
            $ntEpp = 1;
            $nb_pages_max = 2;
            $last_page = ceil($nb / $ntEpp);

            if ($num_page < 1) {
                $num_page = 1;
            } elseif ($num_page > $last_page) {
                $num_page = $last_page;
            }
            $limit = 'LIMIT ' . ($num_page - 1) * $ntEpp . ',' . $ntEpp;
            $pagination = "";
            $pagination.='<div class="pagination pagination-small pagination-centered">
							<ul>';
            if ($nb > 0) {
                $request=$this->Bdd->prepare("SELECT kp.id,kp.titre,kp.nb_vues, ki.image FROM kna_page kp
                                                  INNER JOIN kna_image ki
                                                  WHERE ki.id_page=kp.id  AND  kp.date_fin > now() AND kp.breaked=0 GROUP BY kp.id ORDER BY kp.created_at ASC $limit");
                $request->execute(array());
                $AllPages=$request->fetchAll(PDO::FETCH_OBJ);
                $request->closeCursor();
                array_push($array,$AllPages);
                if($last_page!=1){
                    if($num_page>1){
                        $precedent=$num_page-1;
                        $pagination .='<li><a href="./index.php?p=pages&r='.$precedent.'">Precedent</a></li>';
                        for($i=$num_page-$nb_pages_max;$i<$num_page;$i++){
                            if($i>0){
                                $pagination .='<li><a href="./index.php?p=pages&r='.$i.'">'.$i.'</a></li>';
                            }
                        }
                    }
                }
                $pagination .= '<li class="active"><a href="#">'.$num_page.'</a></li>';
                for($i=$num_page+1;$i<=$last_page;$i++){
                    $pagination .='<li><a href="./index.php?p=pages&r='.$i.'">'.$i.'</a></li>';



                    if($i>=$num_page+$nb_pages_max){
                        break;
                    }
                }
                if($num_page!=$last_page){
                    $suivant=$num_page+1;
                    $pagination .='<li><a href="./index.php?p=pages&r='.$suivant.'">Suivant</a></li>
							';
                }
                $pagination .='</ul></div>';
                array_push($array, $pagination,$nb);
                return $array;
            } else {
                return false;
            }
        }
        catch(Exception $e){
            die('Erreur : '.$e->getMessage());
        }
    }

    //Cette methode permet de prendre les publications recentes
    public function getRecentes(){
        try
        {
            $request=$this->Bdd->prepare('SELECT kp.id,kp.titre,kp.nb_vues, ki.image FROM kna_page kp
                                                  INNER JOIN kna_image ki
                                  
                                                  WHERE ki.id_page=kp.id AND  kp.date_fin > now() AND kp.breaked=0 GROUP BY kp.id ORDER BY kp.nb_vues DESC LIMIT 3');
            $request->execute(array());
            $resultats=$request->fetchAll(PDO::FETCH_OBJ);
            $request->closeCursor();
            return $resultats;
        }
        catch(Exception $e){
            die('Erreur : '.$e->getMessage());
        }
    }

    //Cette methode permet de prendre les promotions recentes
    public function getRecentesPromotions(){
        try
        {
            $request=$this->Bdd->prepare('SELECT kp.id,kp.titre,kp.nb_vues,ka.nom,kp.prix,kp.prix_reduit,kp.devise, ki.image FROM kna_promotion kp
                                                  INNER JOIN kna_annonceur ka
                                                  INNER JOIN kna_image_p ki
                                                
                                                  WHERE ki.id_promotion=kp.id AND kp.id_annonceur=ka.id AND  kp.date_fin > now() AND kp.breaked=0 GROUP BY kp.id ORDER BY kp.nb_vues DESC LIMIT 3');
            $request->execute(array());
            $resultats=$request->fetchAll(PDO::FETCH_OBJ);
            $request->closeCursor();
            return $resultats;
        }
        catch(Exception $e){
            die('Erreur : '.$e->getMessage());
        }
    }
}
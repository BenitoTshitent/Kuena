<?php

require_once ('../config/config.php');
class pageDao
{
    private $Bdd;

    public function __construct()
    {
        $this->Bdd = Config::getConnexion();
    }
    public function getExistence($id_membre,$id_page){
        $request=$this->Bdd->prepare('SELECT id FROM kna_espace WHERE id_membre=? AND id_page=?');
        $request->execute(array($id_membre,$id_page));
        $nb=$request->rowCount();
        $request->closeCursor();
        if($nb==1){
            return true;
        }
        else{
            return false;
        }
    }
    //Cette methode ajoute une nouvelle page a l'espace apres toutes les verifications possibles
    public function addPage(page $page){
        try
        {
            $request=$this->Bdd->prepare('INSERT INTO kna_espace(id_page,id_membre,created_at) 
            VALUES (:id_page,:id_membre,now())');
            $request->execute(array(
                'id_page'=>$page->getIdPage(),
                'id_membre'=>$page->getIdMembre()
            ));
            $request->closeCursor();
            return true;

        }
        catch(Exception $e){
            die('Erreur : '.$e->getMessage());
        }
    }
    //Cette methode retourne l'ip du client
    public function getIp(){
        if(isset($_SERVER['HTTP_CLIENT_IP'])){
            return $_SERVER['HTTP_CLIENT_IP'];
        }
        else if(isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            return $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        else{
            return (isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '');
        }

    }
    //Cette methode verifie si le visiteur a deja visite la meme page generale
    public function getVisited($ip,$id_page){
        $request=$this->Bdd->prepare('SELECT id FROM kna_vue WHERE ip_adresse=? AND id_page=?');
        $request->execute(array($ip,$id_page));
        $nb=$request->rowCount();
        $request->closeCursor();
        if($nb==1){
            return true;
        }
        else{
            return false;
        }
    }

    //Cette methode ajoute une visite de la page generale apres toutes les verifications possibles
    public function addVisite($ip,$id_page){
        try
        {
            $request=$this->Bdd->prepare('INSERT INTO kna_vue(id_page,ip_adresse,created_at) 
            VALUES (:id_page,:ip_adresse,now())');
            $request->execute(array(
                'ip_adresse'=>$ip,
                'id_page'=>$id_page

            ));
            $this->updateNbVuePage($id_page);
            $request->closeCursor();
            return true;
        }
        catch(Exception $e){
            die('Erreur : '.$e->getMessage());
        }
    }

    //Cette methode met a jour l'espace du membre
    private function updateEspace($id_membre,$id_page,$prix){
        try
        {
            $request=$this->Bdd->prepare("UPDATE kna_espace SET nb_vue = nb_vue+1,som_page=som_page+$prix WHERE md5(id_membre) =:id_membre AND id_page =:id_page");
            $request->execute(array(
                'id_membre'=>$id_membre,
                'id_page'=>$id_page
            ));
            $request->closeCursor();
            return true;
        }
        catch(Exception $e){
            die('Erreur : '.$e->getMessage());
        }
    }
    //Cette methode met a jour le nombre de vues de la page
    private function updateNbVuePage($id_page){
        try
        {
            $request=$this->Bdd->prepare("UPDATE kna_page SET nb_vues = nb_vues+1 WHERE md5(id) =:id_page");
            $request->execute(array(
                'id_page'=>$id_page
            ));
            $request->closeCursor();
            return true;
        }
        catch(Exception $e){
            die('Erreur : '.$e->getMessage());
        }
    }
    //Cette methode met a jour le compte du membre (la somme de son compte principal)
    private function updateCompte($id_membre,$prix){
        try
        {
            $request=$this->Bdd->prepare("UPDATE kna_compte SET somme = somme+$prix WHERE md5(id_membre) =:id_membre");
            $request->execute(array(
                'id_membre'=>$id_membre
            ));
            $request->closeCursor();
            return true;
        }
        catch(Exception $e){
            die('Erreur : '.$e->getMessage());
        }
    }
    //Cette methode comptabilise la visite d'une page d'un membre
    public function addVisitedUnit($visited,$id_membre,$ip){
        try
        {
            //Selection des donnees sur la page
            $request=$this->Bdd->prepare('SELECT prix_page,nb_max,nb_vues FROM kna_page WHERE md5(id)=? and breaked=0');
            $request->execute(array($visited));
            $results=$request->fetchAll(PDO::FETCH_OBJ);
            $prix=$results[0]->prix_page;
            $nb_max=$results[0]->nb_max;
            $nb_vue=$results[0]->nb_vues;
            if($nb_vue<=$nb_max){
                //Mise a jour de l'espace du membre
                $this->updateEspace($id_membre,$visited,$prix);
                //Insertion dans la table de visites, donc la page est maintenant consideree comme visitee
                $this->addVisite($ip,$visited);
                //Mettre a jour le compte du membre
                $this->updateCompte($id_membre,$prix);
                //Mettre a jour le nombre de vues dans la page
                $this->updateNbVuePage($visited);
            }
            else{
                //Insertion dans la table de visites, donc la page est maintenant consideree comme visitee
                $this->addVisite($ip,$visited);
                //Mettre a jour le nombre de vues dans la page
                $this->updateNbVuePage($visited);
            }
            $request->closeCursor();
            return true;
        }
        catch(Exception $e){
            die('Erreur : '.$e->getMessage());
        }
    }

    //Cette methode verifie si le visiteur a deja visite la meme page du site lui-meme (googleAnalytics)
    public function getSiteVisited($ip){
        $request=$this->Bdd->prepare('SELECT TIMESTAMPDIFF(HOUR,created_at, NOW())   FROM kna_visite WHERE  id IN (SELECT MAX(id) FROM kna_visite WHERE ip_adress=? AND breaked=0 GROUP BY ip_adress)');
        $request->execute(array($ip));
        $nb_heures=$request->fetch();
        $request->closeCursor();
        return $nb_heures;
    }

    //Cette methode ajoute une visite de la page apres toutes les verifications possibles
    public function addVisiteSite($ip){
        try
        {
            $request=$this->Bdd->prepare('INSERT INTO kna_visite(ip_adress,created_at) 
            VALUES (:ip_adresse,now())');
            $request->execute(array(
                'ip_adresse'=>$ip,
            ));
            $request->closeCursor();
            return true;
        }
        catch(Exception $e){
            die('Erreur : '.$e->getMessage());
        }
    }



}
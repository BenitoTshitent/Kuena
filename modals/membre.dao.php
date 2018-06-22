<?php


require_once ('../config/config.php');
class membreDao
{
    private $Bdd;

    public function __construct()
    {
        $this->Bdd = Config::getConnexion();
    }
    //Cette methode verifie le numero de telephone
    public function verifyPhone($telephone){
        $error=false;
        $validity=preg_match('#(\+243)(81|80|82|84|85|89|97|99|90)([0-9]{7})$#',$telephone);
        if(!$validity){
            $error=true;
        }

        return $error;
    }

    //Cette methode verifie l'existence d'un pseudo semblable a celui du visiteur qui veut s'inscrire
    public function getExistence($username){
        $request=$this->Bdd->prepare('SELECT id FROM kna_membre WHERE pseudo=?');
        $request->execute(array($username));
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
    //Cette methode ajoute un nouveau membre apres toutes les verifications possibles
    public function addMembre(membre $membre){
        try
        {
            $request=$this->Bdd->prepare('INSERT INTO kna_membre(nom,pseudo,telephone,password,created_at) 
            VALUES (:nom,:pseudo,:telephone,:password, now())');
            $request->execute(array(
                'nom'=>$membre->getNom(),
                'pseudo'=>$membre->getPseudo(),
                'telephone'=>substr($membre->getTelephone(),1,strlen($membre->getTelephone())),
                'password'=>$membre->getPassword()
            ));
            $last_id=$this->Bdd->lastInsertId();
            //Prendre le dernier id insere
            //Ajout du compte membre
            $this->addCompte($last_id);
            //Ajout du code membre
            $link='http://127.0.0.1/'.'kuenea/index.php?p=request&id='.md5($last_id).'&pseudo='.$membre->getPseudo().'&tel='.substr($membre->getTelephone(),1,strlen($membre->getTelephone())).'&token='.$membre->getPassword();
            $this->addCode($last_id,$membre->getCode(),$link);
            $request->closeCursor();
            return true;

        }
        catch(Exception $e){
            die('Erreur : '.$e->getMessage());
        }
    }
    //Cette methode ajoute un nouveau compte du membre apres toutes les verifications possibles
    private function addCompte($id_membre){
        try
        {
            $request=$this->Bdd->prepare('INSERT INTO kna_compte(id_membre,created_at) 
            VALUES (:id_membre, now())');
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
    //Cette methode ajoute un nouveau code du membre apres toutes les verifications possibles
    private function addCode($id_membre,$code,$link){
        try
        {
            $request=$this->Bdd->prepare('INSERT INTO kna_code(id_membre,code,link,created_at) 
            VALUES (:id_membre,:code,:link, now())');
            $request->execute(array(
                'id_membre'=>$id_membre,
                'code'=>$code,
                'link'=>$link
            ));
            $request->closeCursor();
            return true;

        }
        catch(Exception $e){
            die('Erreur : '.$e->getMessage());
        }
    }

    //Cette methode s'occupe de la connexion du membre
    public function getConnexion($pseudo,$password){
        $array=array();
        $request=$this->Bdd->prepare('SELECT id FROM kna_membre WHERE pseudo=? and password=? and breaked=0 and activited=1 ');
        $request->execute(array($pseudo,sha1($password)));
        $UserHasBeenFound=$request->rowCount();
        $id=$request->fetch();
        if($UserHasBeenFound){
            $array[0]=true;
            $array[1]=$id['id'];
        }
        else{
            $array[0]=false;
            $array[1]=null;
        }
        $request->closeCursor();
        return $array;
    }



    public function random_str($type = 'alphanum', $length = 8)
    {
        switch($type)
        {
            case 'basic'    : return mt_rand();
                break;
            case 'alpha'    :
            case 'alphanum' :
            case 'num'      :
            case 'nozero'   :
                $seedings             = array();
                $seedings['alpha']    = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $seedings['alphanum'] = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $seedings['num']      = '0123456789';
                $seedings['nozero']   = '123456789';

                $pool = $seedings[$type];

                $str = '';
                for ($i=0; $i < $length; $i++)
                {
                    $str .= substr($pool, mt_rand(0, strlen($pool) -1), 1);
                }
                return $str;
                break;
            case 'unique'   :
            case 'md5'      :
                return md5(uniqid(mt_rand()));
                break;
        }
    }

}
<?php
/**
 * Created by PhpStorm.
 * User: Adrien
 * Date: 24/05/2018
 * Time: 13:48
 */

if(isset($_POST['nom'],$_POST['pseudo'],$_POST['numero'],$_POST['pass1'],$_POST['pass2']) &&
    !empty($_POST['nom']) && !empty($_POST['pseudo']) && !empty($_POST['numero'])
    && !empty($_POST['pass1']) && !empty($_POST['pass2'])){
    require_once ("../modals/membre.dao.php");
    require_once ("../modals/membre.class.php");
    $membreDao=new membreDao();
    extract($_POST);
    $nom=addslashes(htmlentities(trim($nom)));
    $nom=strip_tags(trim($nom));
    $pseudo=strip_tags(trim($pseudo));
    $pseudo=addslashes(htmlentities(trim($pseudo)));
    $pseudo=preg_replace('#[^a-z0-9]#i', '', $pseudo);
    $numero=addslashes(htmlentities(trim($numero)));
    $numero=strip_tags(trim($numero));
    $pass1=addslashes(htmlentities(trim($pass1)));
    $pass1=strip_tags($pass1);
    $pass2=addslashes(htmlentities(trim($pass2)));
    $pass2=strip_tags($pass2);
    $existence=$membreDao->getExistence($pseudo);
    if(mb_strlen($nom)==0 || $nom==false){
        echo '<b class="alert alert-danger">Le champ nom est obligatoire !</b>';
        exit();
    }
    else if(mb_strlen($pseudo)<4 || $pseudo==false){
        echo '<b class="alert alert-danger">Le nom d\'utilisateur doit avoir au moins 4 caractères !</b>';
        exit();
    }
    else if($membreDao->verifyPhone($numero)){
        echo '<b class="alert alert-danger">Le format du telephone est +243xxxxxxxxx</b>';
        exit();
    }
    else if(mb_strlen($pass1)<8 || $pass1==false){
        echo '<b class="alert alert-danger">Le mot de passe est faible !</b>';
        exit();
    }
    else if(mb_strlen($pass1)>0 && $pass1 !=$pass2){
        echo '<b class="alert alert-danger">Les deux mots de passe sont différents !</b>';
        exit();
    }
    else if(strlen($pseudo)<=3||strlen($pseudo)>16){
        echo '<b class="alert alert-danger">Le pseudo doit etre compris entre 4-16 caracteres</b>';

        exit();
    }
    else if(is_numeric($pseudo[0])){
        echo '<b class="alert alert-danger">Le pseudo doit commencer par une lettre</b>';
        exit();
    }
    else if($existence){
        echo '<b class="alert alert-danger">Ce pseudo est déjà utilisé !</b>';
        exit();
    }else{
        $password=sha1($pass1);
        $membre=new membre($nom,$pseudo,$numero,$password,$membreDao->random_str('alphanum', 16),0,0,null);
        if($membreDao->addMembre($membre)){
            echo 'success';
            exit();
        }
        else{
            echo '<b class="alert alert-danger">Une erreur est survenue lors de votre inscription !</b>';
            exit();
        }
    }

}
require_once ('views/register.view.php');
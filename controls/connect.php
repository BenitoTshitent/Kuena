<?php
/**
 * Created by PhpStorm.
 * User: Adrien
 * Date: 08/04/2018
 * Time: 03:54
 */
if(isset($_SESSION) && sizeof($_SESSION>0) && isset($_SESSION['kna_pseudo'],$_SESSION['kna_id'])
    && !empty($_SESSION['kna_pseudo']) && !empty($_SESSION['kna_id'])){
    header('Location:index.php');
}
else{
    if(isset($_POST['pseudo'],$_POST['pass']) && !empty($_POST['pseudo']) && !empty($_POST['pass'])){
        require_once ("../modals/membre.dao.php");
        $membreDao=new membreDao();
        extract($_POST);
        $pseudo=addslashes(htmlentities(trim($pseudo)));
        $pseudo=strip_tags(trim($pseudo));
        $pass=addslashes(htmlentities(trim($pass)));
        $pass=strip_tags($pass);

        if($pseudo == false){
            echo '<b>Le champ pseudo est obligatoire !</b>';
            exit();
        }
        else if(mb_strlen($pseudo)==0){
            echo '<b>Le champ pseudo est obligatoire !</b>';
            exit();

        }else{
            $MembreParams=$membreDao->getConnexion($pseudo,$pass);
            if ($MembreParams[0]){
                session_start();
                $_SESSION['kna_pseudo']=$pseudo;
                $_SESSION['kna_id']=$MembreParams[1];
                echo 'success';
                exit();
            }
            else{
                echo '<b>Vérifiez votre pseudo ou votre mot de passe, si la sitution persiste contactez-nous !</b>';
                exit();
            }
        }
    }

}

<?php


if(isset($_GET['msg']) && is_numeric($_GET['msg'])){
    extract($_GET);
    $message='';
    if($msg==0){
        $message ='<div>
                        <h1 class="alert alert-success">Activation réussie !</h1>
                        <p>Félicitations, votre compte est maintenant activé. </p>
                        <P> <a href="./index.php?p=register">Connectez-vous</a> pour profiter de nos services.</P>
                 </div>';
    }
    else if($msg==1){
        $message ='<div>
                        <h1 class="alert alert-danger">Echec d\'activation !</h1>
                        <p>Désolé, votre compte n\'a pas pu etre activé. </p>
                        <P> <a href="./index.php?p=register">Créer un compte</a> pour profiter de nos services.</P>
                 </div>';
    }
    else if($msg==4){
        $message ='<div>
                        <h1 class="alert alert-success">Création réussie !</h1>
                        <p>Salutations, vous compte a été créé avec succès. Vous recevrez dans le plus bref délai un message d\'activation et un code de membre.</p>
              
                 </div>';
    }
    //Si il cherche a se connecter ou a creer un compte pendant qu'il est deja connecte
    else if($msg==5){
        if(isset($_SESSION) && sizeof($_SESSION>0) && isset($_SESSION['kna_pseudo'],$_SESSION['kna_id'])
            && !empty($_SESSION['kna_pseudo']) && !empty($_SESSION['kna_id'])){
            $message ='<div>
                        <h1 class="alert alert-error">Attention !</h1>
                        <p>Salutations, vous devez vous déconnecter si vous voulez créer un autre compte.</p>
              
                 </div>';
        }
        else{
            $message ='<div>
                        <h1 class="alert alert-info">Message numéro 5 !</h1>
                        <p>Quand vous verrez cette erreur, cela signifierais que vous cherchez à créer un compte pendant que conecté.</p>
              
                 </div>';
        }

    }
    else  {
        $message ='<div>
                        <h1 class="alert alert-danger">Paramètres non corrects !</h1>
                        <p>Désolé, vérifiez les paramètres de l\'URL qui vous a été donné. </p>
                 </div>';

    }
    require_once ('views/info.view.php');
}
else{
    header('Location:index.php?p=error&ms=403');
}
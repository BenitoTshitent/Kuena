<?php
/**
 * Created by PhpStorm.
 * User: Adrien
 * Date: 23/05/2018
 * Time: 10:21
 */
if(isset($_GET['id'],$_GET['pseudo'],$_GET['tel'],$_GET['token'])
    && !empty($_GET['id']) && !empty($_GET['pseudo']) && !empty($_GET['tel']) && !empty($_GET['token'])){
    extract($_GET);
    $id=strip_tags($id);
    $pseudo=strip_tags($pseudo);
    $tel=strip_tags($tel);
    $token=strip_tags($token);
    require_once ('modals/include.dao.php');
    $includeDao=new includeDao();
    $value1=$includeDao->confirmRegister($id,$pseudo,$tel,$token);
    if($value1){
        //Deuxieme verification
        $value2=$includeDao->reconfirmRegister($id);
        if($value2){
            //Confirmation reussie
            header('Location:index.php?p=info&msg=0');
        }
        else{
            //Confirmation echouee
            header('Location:index.php?p=info&msg=1');
        }
    }
    else{
        //Les parametres sont errones
        header('Location:index.php?p=info&msg=2');
    }

}
else{
    header('Location:index.php?p=error&ms=403');
}
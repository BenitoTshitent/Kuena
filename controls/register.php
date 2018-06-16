<?php
/**
 * Created by PhpStorm.
 * User: Adrien
 * Date: 24/05/2018
 * Time: 12:00
 */

if(isset($_SESSION) && sizeof($_SESSION>0) && isset($_SESSION['kna_pseudo'],$_SESSION['kna_id'])
    && !empty($_SESSION['kna_pseudo']) && !empty($_SESSION['kna_id'])){
    header('Location:index.php?p=info&msg=5');
}
else{
    require_once ('views/register.view.php');
}

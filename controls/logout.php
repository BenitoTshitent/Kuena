<?php
/**
 * Created by PhpStorm.
 * User: Adrien
 * Date: 01/01/2018
 * Time: 17:42
 */
session_unset();
session_destroy();
$_SESSION[]='';
if(empty($_SESSION) && sizeof($_SESSION)==0){
    header('Location:index.php?p=register');
}


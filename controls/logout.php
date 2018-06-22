<?php
 
session_unset();
session_destroy();
$_SESSION[]='';
if(empty($_SESSION) && sizeof($_SESSION)==0){
    header('Location:index.php?p=register');
}


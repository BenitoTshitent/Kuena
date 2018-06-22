<?php

if(isset($_GET['ms']) && !empty($_GET['ms']) && is_numeric($_GET['ms'])){
    extract($_GET);
    if($ms==403){
        $message=' 
                <img src="assets/themes/images/erreur-403.png" class="img-responsive" alt="acces-refuse-403" />
                <h5><b>OPPS!</b> Accès Réfusé</h5>
                <p>Il semblerait que vous n\'ayez pas le droit d\'accéder à cette page.</p>';
    }
    else if($ms==404){
        $message=' <img src="assets/themes/images/error.png" class="img-responsive" alt="perdu-404" />
        <h1>ERREUR 404</h1>
        <h5><b>OPPS!</b> La page n\'a pas été trouvée</h5>
        <p>La page n\'existe pas ou elle est temporairement innaccésible.</p>';
    }
    else{
        header('Location:index.php');
    }
    require_once ('views/error.view.php');
}
else{
    header('Location:index.php');
}

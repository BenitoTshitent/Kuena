<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php echo $title;?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <!--[if ie]><meta content='IE=8' http-equiv='X-UA-Compatible'/><![endif]-->
    <!-- bootstrap -->
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link href="assets/themes/css/bootstrappage.css" rel="stylesheet"/>

    <!-- global styles -->
    <link href="assets/themes/css/flexslider.css" rel="stylesheet"/>
    <link href="assets/themes/css/font-awesome.min.css" rel="stylesheet"/>
    <link href="assets/themes/css/main.css" rel="stylesheet"/>

    <link href="assets/themes/css/jquery.fancybox.css" rel="stylesheet"/>

    <!-- scripts -->
    <script src="assets/themes/js/jquery-1.7.2.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/themes/js/superfish.js"></script>
    <script src="assets/themes/js/jquery.scrolltotop.js"></script>
    <script src="assets/themes/js/jquery.fancybox.js"></script>
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <script src="assets/js/respond.min.js"></script>
    <![endif]-->

</head>
<body>
        <div id="top-bar" class="container">
            <div class="row">
                <div class="span4">
                    <form method="POST" class="search_form">
                        <input type="text" class="input-block-level search-query" Placeholder="ex. Page">
                    </form>
                </div>
                <div class="span8">
                    <div class="account pull-right">
                        <ul class="user-menu">
                            <li><a href="index.php?p=register">Inscription</a></li>
                            <?php if(isset($_SESSION['kna_pseudo'],$_SESSION['kna_id']) && !empty($_SESSION['kna_pseudo']) && !empty($_SESSION['kna_id'])):?>
                                <li><a href="index.php?p=logout">Déconnexion</a></li>
                                <li><a href="index.php?p=espace&i=<?php echo md5($_SESSION['kna_id']);?>">Mon espace</a></li>
                            <?php else:?>
                                <li><a href="index.php?p=register">Connexion</a></li>
                            <?php endif;?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div id="wrapper" class="container">
            <section class="navbar main-menu">
                <div class="navbar-inner main-menu">
                    <a href="index.php" class="logo pull-left"> <H3>ku2za</H3></a>
                    <nav id="menu" class="pull-right">
                        <ul>
                            <li>
                                <a href="index.php?p=pages">Pages</a>
                            </li>
                            <li><a href="index.php?p=apropos">A Propos</a></li>
                            <li><a href="index.php?p=conditions">conditions</a></li>
                            <li><a href="index.php?p=faq">faq</a></li>
                        </ul>
                    </nav>
                </div>
            </section>

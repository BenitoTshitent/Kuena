
    <section  class="homepage-slider" id="home-slider">
        <div class="flexslider">
            <ul class="slides">
                <li>
                    <img src="contents/bannieres/banner-2.jpg" alt="banniere" />

                </li>
            </ul>
        </div>
    </section>
    <section class="header_text">
        Ici vous trouverez les dernières pages qui ont été ajoutées à la plateforme
        <br/>Vous n'avez pas à aller loin, vous avez juste à cliquer sur la page que vous voulez voir.
    </section>
    <section class="main-content">
        <div class="row">
            <div class="span12">
                <div class="row">
                    <div class="span12">
                        <div class="row">
                            <div class="span12">
                                <?php if(!empty($promotions) && sizeof($promotions)>0):?>
                                <h4 class="title">
                                    <span class="pull-left"><span class="text"><span class="line">EN <strong>PROMOTIONS</strong></span></span></span>
                                    <span class="pull-right">
										<a class="left button" href="#myCarousel" data-slide="prev"></a><a class="right button" href="#myCarousel" data-slide="next"></a>
									</span>
                                </h4>
                                <div id="myCarousel" class="myCarousel carousel slide">
                                    <div class="carousel-inner">
                                        <div class="active item">
                                            <ul class="thumbnails">
                                            <?php foreach($promotions as $promotion):?>
                                                <li class="span3">
                                                    <div class="product-box">
                                                        <span class="sale_tag"></span>
                                                        <p><a href="#"><img src="contents/promotions/<?php echo $promotion->image ;?>" alt="<?php echo $promotion->image ;?>" /></a></p>
                                                        <a href="#" class="title"><?php echo $promotion->titre ;?></a><br/>
                                                        <a href="#" class="category"><?php echo $promotion->nom ;?></a>
                                                        <p class="price">
                                                            <span style="text-decoration:line-through; color: red; font-size: small;"><?php echo $promotion->prix_reduit.' '.$promotion->devise ;?></span><span><?php echo $promotion->prix.' '.$promotion->devise ;?></span>
                                                        </p>

                                                    </div>
                                                </li>
                                            <?php endforeach;?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <?php else:?>
                                    <div><p class="alert alert-info">Pas de récentes promotions !</p></div>
                                <?php endif;?>
                            </div>
                        </div>
                        <br/>
                        <?php if(!empty($recentes) && sizeof($recentes)>0):?>
                        <h4 class="title">
                            <span class="pull-left"><span class="text"><span class="line">Récentes <strong>Pages</strong></span></span></span>
                            <span class="pull-right">
										<a class="left button" href="#myCarousel-2" data-slide="prev"></a><a class="right button" href="#myCarousel-2" data-slide="next"></a>
									</span>
                        </h4>
                        <div id="myCarousel-2" class="myCarousel carousel slide">
                            <div class="carousel-inner">
                                <div class="active item">
                                    <ul class="thumbnails">
                                        <?php foreach($recentes as $page):?>
                                        <li class="span3">
                                            <div class="product-box">
                                                <span class="sale_tag"></span>
                                                <p><a href="./index.php?p=page&r=<?php echo md5($page->id);?>"><img src="contents/pages/<?php echo $page->image;?>" alt="<?php echo $page->titre;?>" /></a></p>
                                                <a href="./index.php?p=page&r=<?php echo md5($page->id);?>" class="title"><?php echo $page->titre;?></a><br/>
                                                <a href="#" class="category"><?php echo $page->nb_vues .' vues';?></a>
                                            </div>
                                        </li>
                                        <?php endforeach;?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <?php else:?>
                            <div><p class="alert alert-info">Pas de récentes pages!</p></div>
                        <?php endif;?>
                    </div>
                </div>

                <div class="row feature_box">
                    <div class="span4">
                        <div class="service">
                            <div class="responsive">
                                <img src="assets/themes/images/feature_img_2.png" alt="design_moderne" />
                                <h4>DESIGN <strong>MODERNE</strong></h4>
                                <p>La plaforme s'adapte à votre appareil, les smartphones et les tablettes.</p>
                            </div>
                        </div>
                    </div>
                    <div class="span4">
                        <div class="service">
                            <div class="customize">
                                <img src="assets/themes/images/feature_img_1.png" alt="utilisation_gratuite" />
                                <h4>UTILISATION <strong>GRATUITE</strong></h4>
                                <p>Vous avez un accès gratuit en tant que membre à tous nos services.</p>
                            </div>
                        </div>
                    </div>
                    <div class="span4">
                        <div class="service">
                            <div class="support">
                                <img src="assets/themes/images/feature_img_3.png" alt="support_7_24" />
                                <h4>24/7 SUPPORT <strong>EN LIGNE</strong></h4>
                                <p>Vous avez des préoccupations, contactez-nous et nous vous répondons dans le plus bref délai.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

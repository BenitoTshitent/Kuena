    <section class="header_text sub">
        <img class="pageBanner" src="assets/themes/images/pageBanner.png" alt="New products" >
        <h1><span>Pages</span></h1>
    </section>
    <section class="main-content">
        <div class="row">
            <div class="span9">
                <?php if(!empty($Allpages)):?>
                <ul class="thumbnails listing-products">
                    <?php foreach($Allpages as $page):?>
                    <li class="span3">
                        <div class="product-box">
                            <span class="sale_tag"></span>
                            <a href="index.php?p=page&r=<?php echo md5($page->id);?>"><img alt="<?php echo $page->titre;?>" src="contents/pages/<?php echo $page->image; ?>"></a><br/>
                            <a href="index.php?p=page&r=<?php echo md5($page->id);?>" class="title"> <?php echo $page->titre;?></a><br/>
                            <a href="#" class="category"><?php echo $page->nb_vues;?> vues</a>
                        </div>
                    </li>
                    <?php endforeach;?>

                </ul>
                <hr>
                <?php echo $pagination;?>
                <?php else:?>
                    <h4 class="alert alert-info">Il n'y a aucune page dispobible</h4>
                <?php endif;?>
            </div>
            <div class="span3 col">
                <div class="block">
                    <h4 class="title">Les <strong>Plus</strong> Visitées</h4>
                    <?php if(!empty($recentes)):?>
                    <ul class="small-product">
                        <?php foreach($recentes as $page):?>
                        <li>
                            <a href="./index.php?p=page&r=<?php echo md5($page->id);?>" title="<?php echo $page->titre;?>">
                                <img src="contents/pages/<?php echo $page->image; ?>" alt="<?php echo $page->titre;?>">
                            </a>
                            <a href="./index.php?p=page&r=<?php echo md5($page->id);?>"> <?php echo $page->titre;?></a>
                        </li>
                        <?php endforeach;?>
                    </ul>
                    <?php else:?>
                        <h4 class="alert alert-info">Il n'y a aucune page dispobible</h4>
                    <?php endif;?>
                </div>
            </div>
        </div>
    </section>


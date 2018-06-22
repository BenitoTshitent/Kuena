<section class="header_text sub">
    <?php require_once ('controls/banniere.php');?>
    <h1><span>Espace</span></h1>
</section>
<section class="main-content">
    <div class="row">
        <div class="span12">
            <h4 class="title"><span class="text"><strong>Mon</strong> Espace</span></h4>
            <?php if(sizeof($allPages)==0): ?>
                <div>
                    <h4 style="text-align: center; color: red;">Vous n'avez aucune page dans votre espace, vous avez 0 point.</h4>
                </div>
            <?php else:?>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Titre de  la page</th>
                    <th>CPC</th>
                    <th>Vues restantes</th>
                    <th>Vos vues</th>
                    <th>Votre gain</th>
                    <th>Date d'ajout</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($allPages as $page):;?>
                    <tr>
                        <td><a href="index.php?p=unit&r=<?php echo $page->id_page;?>&i=<?php echo $i;?>"><?php echo $page->titre;?></a></td>
                        <td class="alert alert-danger"><?php echo $page->prix_page .' POINT(S)';?></td>
                        <td><?php echo $page->nb_max-$page->nb_vues;?> vue(s)</td>
                        <td><?php echo $page->nb_vue;?> vue(s)</td>
                        <td><?php echo $page->som_page;?> POINT(S)</td>
                        <td><?php echo $includeDao->Date($page->created_at);?></td>
                    </tr>
                <?php endforeach;?>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td><strong><?php echo 'Vous avez '. $somme->somme .' Point(s)';?></strong></td>
                </tr>
                </tbody>
            </table>
            <?php endif;?>
            <hr>
            <hr/>
        </div>
    </div>
</section>
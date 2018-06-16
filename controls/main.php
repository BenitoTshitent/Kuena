<?php
/**
 * Created by PhpStorm.
 * User: Adrien
 * Date: 08/04/2018
 * Time: 03:22
 */
require_once ('modals/include.dao.php');
$includeDao=new includeDao();
$recentes=$includeDao->getRecentes();
$promotions=$includeDao->getRecentesPromotions();
require_once ('views/main.view.php');
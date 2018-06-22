<?php

require_once ('modals/include.dao.php');
$includeDao=new includeDao();
$recentes=$includeDao->getRecentes();
$promotions=$includeDao->getRecentesPromotions();
require_once ('views/main.view.php');
<?php if (!defined ('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();?>

<?php 

use Bitrix\Main\Page\Asset;

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <?php $APPLICATION->ShowHead()?>

    <?php 

    // Meta
    Asset::getInstance()->addString('<meta name="viewport" content="width=device-width, initial-scale=1.0" />');

    // Fonts
    Asset::getInstance()->addString('<link
    href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet" />');
    Asset::getInstance()->addString('<link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800"
    rel="stylesheet" type="text/css" />');
    
    // Custom CSS
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/style.css");
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/responsive.css");

    // jQuery
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/jquery-3.5.1.min.js");

    // Custom JS
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/app.js");
    ?>
    
    <title><?php $APPLICATION->ShowTitle() ?></title>
</head>

<body>
    <!-- bitrix admin panel -->
    <div id="panel">
        <?php $APPLICATION->ShowPanel() ?>
    </div>
    <!-- navbar -->

    <?$APPLICATION->IncludeComponent("bitrix:menu", "menu", Array(
        "ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
            "CHILD_MENU_TYPE" => "left",	// Тип меню для остальных уровней
            "DELAY" => "N",	// Откладывать выполнение шаблона меню
            "MAX_LEVEL" => "1",	// Уровень вложенности меню
            "MENU_CACHE_GET_VARS" => "",	// Значимые переменные запроса
            "MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
            "MENU_CACHE_TYPE" => "N",	// Тип кеширования
            "MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
            "ROOT_MENU_TYPE" => "main",	// Тип меню для первого уровня
            "USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
            "COMPONENT_TEMPLATE" => "horizontal_multilevel",
            "MENU_THEME" => "site"
        ),
        false
    );?>

    <!-- end navbar -->
    
    <!-- Header -->
    <header class="header">
        <h1 class="header__title">What's new today?</h1>
    </header>

    <!-- News section -->
    <section class="news">
        <h2 class="news__title__main">Last 3 News</h2>
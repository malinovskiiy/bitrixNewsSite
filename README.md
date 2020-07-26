# Тестовое задание на битрикс

1. Установлен битрикс редакции Стандарт на локальный сервер php скриптом

2. Создана своя тема (исходная верстка в папке template)

3. Подключен стандарный компонент Битрикса 'Меню'

### template.php
```php
<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?php if(empty($arResult)) return; ?>
<nav class="menu">
	<div class="menu__title">
		<a href="/">News Site</a>
	</div>

	<div class="menu__burger">
		<span class="bar"></span>
		<span class="bar"></span>
		<span class="bar"></span>
	</div>
	<ul class="menu__list">
		<?php foreach($arResult as $arItem): ?>
		<li class="menu__item">
			<a href="<?= $arItem['LINK'] ?>" class="menu__link">
				<?= $arItem['TEXT'] ?>
			</a>
		</li>
		<?php endforeach ?>
	</ul>
</nav>
```
### header.php
```php
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
```

4. Создан инфоблок 'Новости' с доп. свойством Автор типа Строка

5. Заполнены 5 элементов инфоблока 

* Заголовок
* Текст анонса
* Подробный текст
* Изображение анонса
* Автор

6. В блоке контента выводятся 3 последние новости по дате добавления
   Использовался метод API CIBlockElement::GetList()
   
### index.php

```php
<?php 
	CModule::IncludeModule("iblock");

	// Сортировка по дате создания
	$arSort = array('SORT' => 'ASC', 'DATE_CREATE' => 'DESC');

	// Поля для вывода новостей
	$arSelect = array('ID', 'NAME', 'IBLOCK_ID', 'PREVIEW_TEXT', 'PREVIEW_PICTURE', 'DATE_CREATE');

	// Выбор инфоблока новости
	$arFilter = array('IBLOCK_ID' => 3);
	
	// GetList
	$res = CIBlockElement::GetList(
		$arSort,
		$arFilter,
		false,
		false,
		$arSelect					
	);
?>
<?php 	
for($i = 0; $i < 3; $i++): 
	// Обьект новостей
	$ob = $res->GetNextElement();

	// Поля для вывода
	$arFields = $ob->GetFields(); 

	// Дополнительные свойства
	$arProps = $ob->GetProperties();

	// Путь до изображения с id = $arFields['PREVIEW_PICTURE']
	$previewPicturePath = CFile::GetPath($arFields['PREVIEW_PICTURE']);
?>
	<div class="news__item">
		<img src="<?= $previewPicturePath ?>" class="news__image" alt=" post_image" />
		<div class="news__content">
			<h3 class="news__title">
				<?= $arFields['NAME'] ?>
			</h3>
			<p class="news__text">
				<?= $arFields['PREVIEW_TEXT'] ?>
			</p>

			<div class="news__meta">
				Posted by <span class="news__author"><?= $arProps['AUTHOR']['VALUE'] ?></span> on
				<span class="news__date"><?= $arFields['DATE_CREATE'] ?></span>
			</div>
		</div>
	</div>		
<?php endfor ?>
```







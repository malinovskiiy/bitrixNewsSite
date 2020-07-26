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

4. Создан инфоблок 'Новости' с доп. свойством Автор






<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Bitrix News");?>

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


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
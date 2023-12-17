<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>

<ul class="pagination mx-auto">
	<?if ($arResult["NavPageNomer"] > 1):?>

		<?if($arResult["bSavePage"]):?>
			<li class="page-item disabled">
				<a class="page-link" href="<?=$arResult["sUrlPath"]?>?PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]-1)?>">&laquo;</a>
			</li>
		<?else:?>
			<?if ($arResult["NavPageNomer"] > 2):?>
				<li class="page-item disabled">
					<a class="page-link" @click="pagination('<?=$_GET['PAGEN_1']-1?>')">&laquo;</a>
				</li>
			<?else:?>
				<li class="page-item disabled">
					<a class="page-link" @click="pagination('<?=$_GET['PAGEN_1']-1?>')">&laquo;</a>
				</li>
			<?endif?>
		<?endif?>

	<?else:?>
		<?/* 
			<li class="page-item">
				<a class="page-link">&laquo;</a>
			</li> 
		*/?>
	<?endif?>
	<?if($arResult["nEndPage"] != 5):?>
		<?if($arResult["NavPageNomer"] > 3):?>
			<li class="page-item">
				<a class="page-link" @click="pagination('1')">1</a>
			</li>
			<?while($arResult["nStartPage"] < $arResult["nEndPage"]):?>
				<?if ($arResult["nStartPage"] == $arResult["NavPageNomer"]):?>
					<li class="page-item active">
						<a class="page-link" href="#"><?=$arResult["nStartPage"]?></a>
					</li>
				<?elseif($arResult["nStartPage"] == 1 && $arResult["bSavePage"] == false):?>
					<li class="page-item">
						<a class="page-link" @click="pagination('1')"><?=$arResult["nStartPage"]?></a>
					</li>
				<?else:?>
					<?if($arResult["NavPageNomer"] < $arResult["nStartPage"]):?>
						<li class="page-item">
							<a class="page-link" @click="pagination('<?=$arResult["nStartPage"]?>')"><?=$arResult["nStartPage"]?></a>
						</li>
						<li class="page-item">
							<a class="page-link" @click="pagination('<?=$arResult["nStartPage"]+1?>')"><?=$arResult["nStartPage"]+1?></a>
						</li>
						<li class="page-item">
							<a class="page-link" @click="pagination('<?=$arResult["nStartPage"]+2?>')"><?=$arResult["nStartPage"]+2?></a>
						</li>
					<?else:?>
						<li class="page-item">
							<a class="page-link" @click="pagination('<?=$arResult["nStartPage"]?>')"><?=$arResult["nStartPage"]?></a>
						</li>
					<?endif;?>
				<?endif?>
				<?$arResult["nStartPage"]++?>
			<?endwhile?>
		<?else:?>
			<?while($arResult["nStartPage"] <= $arResult["nEndPage"]):?>
				<?if ($arResult["nStartPage"] == $arResult["NavPageNomer"]):?>
					<li class="page-item active">
						<a class="page-link" href="#"><?=$arResult["nStartPage"]?></a>
					</li>
				<?elseif($arResult["nStartPage"] == 1 && $arResult["bSavePage"] == false):?>
					<li class="page-item">
						<a class="page-link" @click="pagination('1')"><?=$arResult["nStartPage"]?></a>
					</li>
				<?else:?>
					<li class="page-item">
						<a class="page-link" @click="pagination('<?=$arResult["nStartPage"]?>')"><?=$arResult["nStartPage"]?></a>
					</li>
				<?endif?>
				<?$arResult["nStartPage"]++?>
			<?endwhile?>
		<?endif;?>
	<?else:?>
		<?while($arResult["nStartPage"] <= $arResult["nEndPage"]):?>
			<?if ($arResult["nStartPage"] == $arResult["NavPageNomer"]):?>
				<li class="page-item active">
					<a class="page-link" href="#"><?=$arResult["nStartPage"]?></a>
				</li>
			<?elseif($arResult["nStartPage"] == 1 && $arResult["bSavePage"] == false):?>
				<li class="page-item">
					<a class="page-link" @click="pagination('1')"><?=$arResult["nStartPage"]?></a>
				</li>
			<?else:?>
				<li class="page-item">
					<a class="page-link" @click="pagination('<?=$arResult["nStartPage"]?>')"><?=$arResult["nStartPage"]?></a>
				</li>
			<?endif?>
			<?$arResult["nStartPage"]++?>
		<?endwhile?>
	<?endif;?>
	<?if($arResult["NavPageNomer"] < $arResult["NavPageCount"]):?>
		<?if($_GET['PAGEN_1']):?>
			<li class="page-item">
				<a class="page-link" @click="pagination('<?=$_GET['PAGEN_1']+1?>')">&raquo;</a>
			</li>
		<?else:?>
			<li class="page-item">
				<a class="page-link" @click="pagination('<?=$_GET['PAGEN_1']+2?>')">&raquo;</a>
			</li>
		<?endif;?>
	<?else:?>
		<?/* 
			<li class="page-item">
				<a class="page-link">&raquo;</a>
			</li> 
		*/?>
	<?endif?>
</ul>
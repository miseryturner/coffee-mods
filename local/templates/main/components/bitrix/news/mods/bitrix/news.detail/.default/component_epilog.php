<?php
$rsElement = CIBlockElement::GetList(
    $arOrder  = array("SORT" => "ASC"),
    $arFilter = array(
        "ACTIVE"    => "Y",
        "IBLOCK_ID" => 1,
        "ID"        => $arResult['ID']
    ),
    false,
    false,
    $arSelectFields = array("ID", "NAME", "IBLOCK_ID", "CODE", "PREVIEW_TEXT")
);
while($arElement = $rsElement->getNextElement()) {
    $desc = $arElement->getFields();
}


$APPLICATION->SetPageProperty('description', strip_tags($desc['~PREVIEW_TEXT']));
$APPLICATION->SetPageProperty('description', strip_tags($desc['NAME'])); //на Симс 4 скачать

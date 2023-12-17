<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
CModule::IncludeModule("iblock");

$rsElement = CIBlockElement::GetList(
    $arOrder  = array("SORT" => "ASC"),
    $arFilter = array(
        "ACTIVE"    => "Y",
        "IBLOCK_ID" => '1'
    ),
    false,
    false,
    $arSelectFields = array("ID", "NAME", "IBLOCK_ID", "CODE", "PROPERTY_*")
);
while($arElement = $rsElement->GetNextElement()) {
    print_r(\Bitrix\Main\IO\Path::getExtension(CFile::GetPath($arElement->GetProperties()['FILE']['VALUE'])));
    echo '<br>';
}
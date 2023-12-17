<?
// получение подразделов элемента
$res = CIBlockSection::GetByID($arResult['IBLOCK_SECTION_ID']);
if($arSubSection = $res->GetNext())
    $arResult['SUB_SECTION'] = $arSubSection;

// получение разделов элемента
$res = CIBlockSection::GetByID($arResult['SUB_SECTION']['IBLOCK_SECTION_ID']);
if($arSection= $res->GetNext())
    $arResult['SECTION'] = $arSection;
                                   
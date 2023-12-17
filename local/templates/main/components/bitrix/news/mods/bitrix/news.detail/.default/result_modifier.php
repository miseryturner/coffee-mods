<?
// TODO: 404
$section_code = $arResult['SECTION']['PATH'][0]['CODE'];
$thisPageUrl = explode('/', trim(explode('?', $_SERVER['REQUEST_URI'])[0], '/'));

if($section_code != $thisPageUrl[1]) {
    if (!defined("ERROR_404"))
        define("ERROR_404", "Y");

        \CHTTP::setStatus("404 Not Found");

        if ($APPLICATION->RestartWorkarea())
        {
            require(\Bitrix\Main\Application::getDocumentRoot() . "/404.php");
            die();
        }
}

session_start();

if(in_array($arResult['ID'], $_SESSION['SAVED'])) {
    $arResult['SAVED'] = true;
}

// получение подразделов элемента
$res = CIBlockSection::GetByID($arResult['IBLOCK_SECTION_ID']);
if($arSubSection = $res->GetNext())
    $arResult['SUB_SECTION'] = $arSubSection;

// получение разделов элемента
$res = CIBlockSection::GetByID($arResult['SUB_SECTION']['IBLOCK_SECTION_ID']);
if($arSection= $res->GetNext())
    $arResult['SECTION'] = $arSection;

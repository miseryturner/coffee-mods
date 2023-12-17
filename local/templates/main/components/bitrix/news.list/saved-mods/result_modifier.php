<?
session_start();
$arResult = [];
if($_SESSION['SAVED']) {
    $arSelect = Array("ID", "IBLOCK_ID", "NAME", "DETAIL_PAGE_URL", "PREVIEW_TEXT", "PREVIEW_PICTURE", "PROPERTY_*");
    $arFilter = Array("IBLOCK_ID"=>1, "ID"=>$_SESSION['SAVED'], "ACTIVE"=>"Y");
    $res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>50), $arSelect);
    while($ob = $res->GetNextElement()){ 
        $arFields = $ob->GetFields();
        $arFields['PROPERTIES'] = $ob->GetProperties();
        $arResult[] = $arFields;
    }
} else {
    $arResult['ERROR'] = 'У Вас ещё нет сохранённых модов';
}

?>
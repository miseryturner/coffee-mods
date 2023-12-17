<?
// $arSelect = Array("ID", "IBLOCK_ID", "NAME", "IBLOCK_SECTION_ID", "SECTION_ID", "SECTION_PAGE_URL");
// $arFilter = Array('IBLOCK_ID'=>2, "DEPTH_LEVEL"=>1, "ACTIVE"=>"Y");
// $db_list = CIBlockSection::GetList(Array("NAME"=>"ASC"), $arFilter, true, $arSelect);
// while($ar_result = $db_list->GetNext()) {
//     $arResult['SECTIONS'][$ar_result['ID']] = $ar_result;
// }

// $arSelect = Array("ID", "IBLOCK_ID", "NAME", "IBLOCK_SECTION_ID", "SECTION_ID", "SECTION_PAGE_URL");
// $arFilter = Array('IBLOCK_ID'=>2, "DEPTH_LEVEL"=>2, "ACTIVE"=>"Y");
// $db_list = CIBlockSection::GetList(Array("NAME"=>"ASC"), $arFilter, true, $arSelect);
// while($ar_result = $db_list->GetNext()) {
//     $arResult['SECTIONS'][$ar_result['IBLOCK_SECTION_ID']]['SUB_SECTIONS'][] = $ar_result;
// }

//получение ссылки на текущую страницу
$arResult['URL_PAGE'] = $_SERVER['REQUEST_URI'][0];

//получение get-парраметров текущей страницы
$arResult['GET_PARAMS'] = '?'.$_SERVER['QUERY_STRING'];

//массив вариантов кол-ва вывода элементов
$arResult['ELEMENTS_COUNT'] = [8, 12];
?>

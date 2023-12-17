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

foreach ($arResult['ITEMS'] as $key => $value) {
    if(in_array($value['ID'], $_SESSION['SAVED'])){
        $arResult['ITEMS'][$key]['SAVED'] = true;
    }
}

$arSelect = Array("ID", "IBLOCK_ID", "NAME", "IBLOCK_SECTION_ID", "SECTION_ID", "SECTION_PAGE_URL");
$arFilter = Array('IBLOCK_ID'=>1, "DEPTH_LEVEL"=>1, "ACTIVE"=>"Y");
$db_list = CIBlockSection::GetList(Array("NAME"=>"ASC"), $arFilter, true, $arSelect);
while($ar_result = $db_list->GetNext()) {
    $arResult['SECTIONS'][$ar_result['ID']] = $ar_result;
}

$arSelect = Array("ID", "IBLOCK_ID", "NAME", "IBLOCK_SECTION_ID", "SECTION_ID", "SECTION_PAGE_URL");
$arFilter = Array('IBLOCK_ID'=>1, "DEPTH_LEVEL"=>2, "ACTIVE"=>"Y");
$db_list = CIBlockSection::GetList(Array("NAME"=>"ASC"), $arFilter, true, $arSelect);
while($ar_result = $db_list->GetNext()) {
    $arResult['SECTIONS'][$ar_result['IBLOCK_SECTION_ID']]['SUB_SECTIONS'][] = $ar_result;
}

//получение ссылки на текущую страницу
$arResult['URL_PAGE'] = $_SERVER['REQUEST_URI'][0];

//получение get-парраметров текущей страницы
$arResult['GET_PARAMS'] = '?'.$_SERVER['QUERY_STRING'];

//массив вариантов кол-ва вывода элементов
$arResult['ELEMENTS_COUNT'] = [12, 18, 24, 36, 45];

//массив вариантов сортировки
$arResult['ELEMENTS_SORT'] = [
    [
        'NAME' => 'По дате загрузки',
        'SORT' => 'date',
    ],
    [
        'NAME' => 'По популярности',
        'SORT' => 'views',
    ]
];

<?
session_start();

foreach ($arResult['ITEMS'] as $key => $value) {
    if(in_array($value['ID'], $_SESSION['SAVED'])){
        $arResult['ITEMS'][$key]['SAVED'] = true;
    }
}

//TODO: Bibix ебанулся что-то, и выводит вместо 4ех, 6 модов
//Пришлось вот вырезать руками:
$arResult['ITEMS'] = array_slice($arResult['ITEMS'], 0, 4);
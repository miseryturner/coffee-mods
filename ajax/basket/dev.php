<?
// require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
// CModule::IncludeModule("iblock");
// header("Content-Type: application/json; charset=UTF-8");

// $id = $_GET['id'];
// $modsArray = [];

// if($id) {
//     $rsElement = CIBlockElement::GetList(
//         [], ["ACTIVE" => "Y", "IBLOCK_ID" => 3, "ID" => $id], false, false, 
//         ['IBLOCK_ID', 'ID', 'NAME', 'CODE', 'PROPERTY_*']
//     );
    
//     if($arElement = $rsElement->GetNextElement()) {
//         $prop = $arElement->GetProperties();
//         $rsMods = CIBlockElement::GetList(
//             [], ["ACTIVE" => "Y", "IBLOCK_ID" => [4, 1], "ID" => $prop['BASKET_APP']['VALUE']], false, false, 
//             ['IBLOCK_ID', 'ID', 'NAME', 'CODE', 'DETAIL_PAGE_URL', 'IBLOCK_SECTION_ID', 'PREVIEW_PICTURE', 'PROPERTY_*']
//         );
//         while($arMods = $rsMods->GetNextElement()) {
//             $temp = $arMods->GetFields();
//             $temp['PROP'] = $arMods->GetProperties();
//             if($temp['IBLOCK_ID'] == 1) {
//                 $modsArray[] = [
//                     'name' => $temp['~NAME'],
//                     'url' => 'https://coffee-mods.ru'.$temp['~DETAIL_PAGE_URL'],
//                     'download' => 'https://coffee-mods.ru'.CFile::GetPath($temp['PROP']['FILE']['VALUE']),
//                     'folder_name' => $temp['CODE'],
//                     'section'     => $temp['IBLOCK_SECTION_ID'],
//                     'extension' => \Bitrix\Main\IO\Path::getExtension('https://coffee-mods.ru'.CFile::GetPath($temp['PROP']['FILE']['VALUE'])),
//                     'photo' => 'https://coffee-mods.ru'.CFile::GetPath($temp['PREVIEW_PICTURE'])
//                 ];
//             } else if($temp['IBLOCK_ID'] == 4) {
//                 $modsArray[] = [
//                     'name' => $temp['PROP']['NAME']['VALUE'],
//                     'url' => $temp['NAME'],
//                     'download' =>  $temp['PROP']['DOWNLOAD']['VALUE'],
//                     'folder_name' => $temp['PROP']['CODE']['VALUE'],
//                     'section'     => $temp['PROP']['SECTION']['VALUE'],
//                     'extension' => \Bitrix\Main\IO\Path::getExtension($temp['PROP']['DOWNLOAD']['VALUE']),
//                     'photo' => $temp['PROP']['PHOTO']['VALUE']
//                 ];
//             }
//         }
//         print_r(
//             json_encode($modsArray)
//         );
//     }
// }
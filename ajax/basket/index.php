<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
CModule::IncludeModule("iblock");
header("Content-Type: application/json; charset=UTF-8");
// require_once $_SERVER['DOCUMENT_ROOT'].'/ajax/jwt.php';
// $jwt = new JWT;
// $secret_key = 'I9v0XAESWOY0KeG8N5viNkPFnZ8i4JSmWsD3SAea';
// $token = apache_request_headers()['Authorization'];
// try {
//     $userInfo = $jwt->decode(str_replace('Bearer ', '', $token));
//     $id = get_object_vars($userInfo)['id'];
//     $modsAnother = []; // моды с других сервисов
//     $modsOur = []; // моды с нашего сайта
//     $modsArray = [];
// } catch (Exception $e) {
//     $id = false;
// }

$id = $_GET['id'];

if($id) {
    $rsElement = CIBlockElement::GetList(
        [], ["ACTIVE" => "Y", "IBLOCK_ID" => 3, "ID" => $id], false, false, 
        ['IBLOCK_ID', 'ID', 'NAME', 'CODE', 'PROPERTY_*']
    );
    
    if($arElement = $rsElement->GetNextElement()) {
        $prop = $arElement->GetProperties();
        $ourIds = [];
        $anotherIds = [];
        foreach ($prop['BASKET_APP']['VALUE'] as $key => $value) {
            if($prop['BASKET_APP']['DESCRIPTION'][$key] == 'our') {
                $rsMods = CIBlockElement::GetList(
                    [], ["ACTIVE" => "Y", "IBLOCK_ID" => 1, "ID" => $value], false, false, 
                    ['IBLOCK_ID', 'ID', 'NAME', 'CODE', 'DETAIL_PAGE_URL', 'IBLOCK_SECTION_ID', 'PREVIEW_PICTURE', 'PROPERTY_*']
                );
                while($arMods = $rsMods->GetNextElement()) {
                    $temp = $arMods->GetFields();
                    $temp['PROP'] = $arMods->GetProperties();
                    $modsArray[] = [
                        'name' => $temp['~NAME'],
                        'url' => 'https://coffee-mods.ru'.$temp['~DETAIL_PAGE_URL'],
                        'download' => 'https://coffee-mods.ru'.CFile::GetPath($temp['PROP']['FILE']['VALUE']),
                        'folder_name' => $temp['CODE'],
                        'section'     => $temp['IBLOCK_SECTION_ID'],
                        'extension' => \Bitrix\Main\IO\Path::getExtension('https://coffee-mods.ru'.CFile::GetPath($temp['PROP']['FILE']['VALUE'])),
                        'photo' => 'https://coffee-mods.ru'.CFile::GetPath($temp['PREVIEW_PICTURE'])
                    ];
                }
            } else if($prop['BASKET_APP']['DESCRIPTION'][$key] == 'another') {
                $rsMods = CIBlockElement::GetList(
                    [], ["ACTIVE" => "Y", "IBLOCK_ID" => 4, "ID" => $value], false, false, 
                    ['IBLOCK_ID', 'ID', 'NAME', 'CODE', 'DETAIL_PAGE_URL', 'IBLOCK_SECTION_ID', 'PREVIEW_PICTURE', 'PROPERTY_*']
                );
                while($arMods = $rsMods->GetNextElement()) {
                    $temp = $arMods->GetFields();
                    $temp['PROP'] = $arMods->GetProperties();
                    $modsArray[] = [
                        'name' => $temp['PROP']['NAME']['~VALUE'],
                        'url' => $temp['NAME'],
                        'download' =>  $temp['PROP']['DOWNLOAD']['VALUE'],
                        'folder_name' => $temp['PROP']['CODE']['VALUE'],
                        'section'     => $temp['PROP']['SECTION']['VALUE'],
                        'extension' => \Bitrix\Main\IO\Path::getExtension($temp['PROP']['DOWNLOAD']['VALUE']),
                        'photo' => $temp['PROP']['PHOTO']['VALUE']
                    ];
                }
            }
        }
        if($modsArray) {
            print_r(
                json_encode($modsArray)
            );
        } else {
            print_r(json_encode(['message' => 'корзина пуста']));
        }
    }
} else {
    print_r(json_encode(['message' => 'token invalid']));
}
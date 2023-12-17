<?
session_start();

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
CModule::IncludeModule("iblock");
header("Content-Type: application/json; charset=UTF-8");
require_once $_SERVER['DOCUMENT_ROOT'].'/ajax/jwt.php';
$jwt = new JWT;
$secret_key = 'I9v0XAESWOY0KeG8N5viNkPFnZ8i4JSmWsD3SAea';
$token = apache_request_headers()['authorization'];

$userInfo = $jwt->decode(str_replace('Bearer ', '', $token));
$id = get_object_vars($userInfo)['id'];

$rsElement = CIBlockElement::GetList(
    [], ["ACTIVE" => "Y", "IBLOCK_ID" => 3, "ID" => $id], false, false, 
    ['IBLOCK_ID', 'ID', 'NAME', 'CODE', 'PROPERTY_*']
);

if($arElement = $rsElement->GetNextElement()) {
    $temp = $arElement->GetFields();
    $prop = $arElement->GetProperties();
    $_SESSION['USER_NAME'] = $temp['NAME'];
    $_SESSION['USER_CODE'] = $temp['CODE'];
    $_SESSION['USER_EMAIL'] = $prop['EMAIL']['VALUE'];
    $_SESSION['USER_THEME'] = $prop['THEME']['VALUE'];
    $_SESSION['USER_LANGUAGE'] = $prop['LANGUAGE']['VALUE'];
    print_r(
        json_encode($_SESSION)
    );
}
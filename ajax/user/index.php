<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
CModule::IncludeModule("iblock");
header("Content-Type: application/json; charset=UTF-8");
require_once $_SERVER['DOCUMENT_ROOT'].'/ajax/jwt.php';
$jwt = new JWT;
$secret_key = 'I9v0XAESWOY0KeG8N5viNkPFnZ8i4JSmWsD3SAea';
$token = apache_request_headers()['Authorization'];

$userInfo = $jwt->decode(str_replace('Bearer ', '', $token));
$id = get_object_vars($userInfo)['id'];

$rsElement = CIBlockElement::GetList(
    [], ["ACTIVE" => "Y", "IBLOCK_ID" => 3, "ID" => $id], false, false, 
    ['IBLOCK_ID', 'ID', 'NAME', 'CODE', 'PROPERTY_*']
);

if($arElement = $rsElement->GetNextElement()) {
    $temp = $arElement->GetFields();
    $prop = $arElement->GetProperties();
    print_r(
        json_encode([
            'name' => $temp['NAME'],
            'code' => $temp['CODE'],
            'email' => $prop['EMAIL']['VALUE'],
        ])
    );
}
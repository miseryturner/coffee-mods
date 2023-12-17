<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
CModule::IncludeModule("iblock");
header("Content-Type: application/json; charset=UTF-8");
require_once $_SERVER['DOCUMENT_ROOT'].'/ajax/jwt.php';
$jwt = new JWT;
$secret_key = 'I9v0XAESWOY0KeG8N5viNkPFnZ8i4JSmWsD3SAea';

$name = $_POST['login'];
$email = $_POST['email'];
$password = md5(md5($_POST['password']));

if($name && $password) {
    $rsElement = CIBlockElement::GetList(
        [], ["ACTIVE" => "Y", "IBLOCK_ID" => 3, "NAME" => $name], false, false,
        ["ID", "NAME", "IBLOCK_ID", "CODE", "PROPERTY_*"]
    );
    if($arElement = $rsElement->GetNextElement()) {
        $temp = $arElement->GetFields();
        $temp['PROP'] = $arElement->GetProperties();
        if($temp['PROP']['PASSWORD']['VALUE'] == $password) {
            print_r(json_encode([
                'token' => $jwt->encode([
                    'id'=>$temp['ID'],
                    'name'=>$temp['NAME'],
                    'email' => $temp['PROP']['EMAIL']['VALUE']
                ], $secret_key)
            ]));
        } else {
            print_r(
                json_encode([
                    'pass' => true,
                    'error' => 'пароль не верный'
                ])
            );
        }
    } else {
        print_r(
            json_encode([
                'login' => true,
                'error' => 'аккаунта с таким логином нет'
            ])
        );
    }
} else {
    print_r(
        json_encode([
            'field' => true,
            'error' => 'не все поля заполнены'
        ])
    );
}



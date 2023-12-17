<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
CModule::IncludeModule("iblock");
header("Content-Type: application/json; charset=UTF-8");
require_once $_SERVER['DOCUMENT_ROOT'].'/ajax/jwt.php';
$jwt = new JWT;
$secret_key = 'I9v0XAESWOY0KeG8N5viNkPFnZ8i4JSmWsD3SAea';

$name = $_POST['login'];
$email = $_POST['email'];
$password = md5(md5($_POST['password']));

if($name && $email && $password) {
    $rsElement = CIBlockElement::GetList(
        [], ["ACTIVE" => "Y", "IBLOCK_ID" => 3, "NAME" => $name], false, false, []
    );
    if($arElement = $rsElement->fetch()) {
        print_r('Сорри есть такой');
    } else {
        $rsElement1 = CIBlockElement::GetList(
            [], ["ACTIVE" => "Y", "IBLOCK_ID" => 3, "PROPERTY_EMAIL" => $email], false, false, []
        );
        if($arElement1 = $rsElement1->fetch()) {
            print_r('Сорри есть такой');
        } else {
            $el = new CIBlockElement;
            $arLoadProductArray = [
                "IBLOCK_SECTION_ID" => $category_id,
                "IBLOCK_ID"         => 3,
                "NAME"              => $name,
                "CODE"              => $name,
                "ACTIVE"            => "Y", // активен
                "PROPERTY_VALUES"   => [
                    10 => $password,
                    11 => $email
                ],
            ];
            if($PRODUCT_ID = $el->Add($arLoadProductArray)) {
                print_r(
                    json_encode([
                        'token' => $jwt->encode(['id'=>$PRODUCT_ID, 'name'=>$name, 'email' => $email], $secret_key)
                    ])
                );
            } else {
                print_r(
                    json_encode([
                        'message' => $el->LAST_ERROR
                    ])
                );
            }
        }
    }
} else {
    print_r('не все поля заполнены');
}

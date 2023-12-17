<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
CModule::IncludeModule("iblock");
header("Content-Type: application/json; charset=UTF-8");
require_once $_SERVER['DOCUMENT_ROOT'].'/ajax/jwt.php';
$jwt = new JWT;
$secret_key = 'I9v0XAESWOY0KeG8N5viNkPFnZ8i4JSmWsD3SAea';
$token = apache_request_headers()['Authorization'];
require ($_SERVER['DOCUMENT_ROOT'].'/ajax/phpQuery/phpQuery/phpQuery.php');
try {
    $userInfo = $jwt->decode(str_replace('Bearer ', '', $token));
    $userId = get_object_vars($userInfo)['id'];
    $modId = $_POST['mod_id'];
    $type = $_POST['type'];
    $info = get_object_vars(json_decode($_POST['info']));
    $link = $_POST['link'];
    $basket_list = [];
} catch (Exception $e) {
    $userId = false;
}

if($userId) {
    //делаем запрос на корзину пользователя
    $rsElement = CIBlockElement::GetList(
        [], ["ACTIVE" => "Y", "IBLOCK_ID" => 3, "ID" => $userId], false, false, 
        ['IBLOCK_ID', 'ID', 'NAME', 'CODE', 'PROPERTY_*']
    );
    
    if($arElement = $rsElement->GetNextElement()) {
        $basket_property = $arElement->GetProperties()['BASKET_APP']; // переменная отвечает за список id элементов
        if($basket_property['VALUE']) {
            foreach ($basket_property['VALUE'] as $key => $value) {
                $basket_list[] = [
                    'VALUE' => $value,
                    'DESCRIPTION' => $basket_property['DESCRIPTION'][$key]
                ];
            }
        }
        if($modId) { //если это id мода
            //если коризна не пустая
            if($basket_property['VALUE']) {
                if(in_array($modId, $basket_property['VALUE'])) { // проверка - не добовляем ли мы уже имеющийся элемент
                    print_r(json_encode([
                        'message' => 'Данный мод уже есть в корзине'
                    ]));
                    die();
                }
            } else {
                $basket_list[] = [
                    "VALUE" => $modId,
                    "DESCRIPTION" => $type
                ];
            }
        } else if($info) { //если это мод с расширения
            $rsElements = CIBlockElement::GetList(
                [], ["ACTIVE" => "Y", "IBLOCK_ID" => 4, "name" => $info['name']], false, false, 
                ['IBLOCK_ID', 'ID', 'NAME', 'CODE', 'PROPERTY_*']
            );
    
            if($arElements = $rsElements->fetch()) {
                if(in_array($arElements['ID'], $basket_property['VALUE'])) { // проверка - не добовляем ли мы уже имеющийся элемент
                    print_r(json_encode([
                        'message' => 'Данный мод уже есть в корзине'
                    ]));
                    die();
                }
                $basket_list[] = [
                    "VALUE" => $arElements['ID'],
                    "DESCRIPTION" => $type
                ];
            } else {
                $el = new CIBlockElement;
        
                $PROP = [
                    15 => $info['name'],
                    14 => $info['download'],
                    16 => $info['service'],
                    17 => $info['photo'],
                    18 => $info['file_name'],
                    19 => $info['file_ex']
                ];
                
                $arLoadProductArray = Array(
                    "IBLOCK_ID"         => 4,
                    "NAME"              => $info['link'],
                    "PROPERTY_VALUES"   => $PROP
                );
        
                if($PRODUCT_ID = $el->Add($arLoadProductArray)) {
                    $basket_list[] = [
                        "VALUE" => $PRODUCT_ID,
                        "DESCRIPTION" => $type
                    ];
                } else {
                    print_r(json_encode(["error" => $el->LAST_ERROR]));
                    dir();
                }
            }
        } else if($link) { // если это ссылка:
            // делаем запрос, в целях узнать нет ли такого мода в инфоблоке "моды с других сервисов"
            $rsElement = CIBlockElement::GetList(
                [], ["ACTIVE"=>"Y", "IBLOCK_ID"=>4, "NAME"=>$link],
                false, false, ["ID", "NAME", "IBLOCK_ID", "CODE", "PROPERTY_*"]
            );
            if($arElementes = $rsElement->fetch()) { // если есть в инфоблоке "моды с других сервисов":
                if(in_array($arElementes['ID'], $basket_property['VALUE'])) { // проверка - не добовляем ли мы уже имеющийся элемент
                    print_r(json_encode([
                        'message' => 'Данный мод уже есть в корзине'
                    ]));
                    die();
                } else { // если элемент новый:
                    $basket_list[] = [
                        "VALUE" => $arElementes['ID'],
                        "DESCRIPTION" => $type
                    ];
                }
            } else { // если нет в инфоблоке "моды с других сервисов": запускаем парсер и доавбляем инфу в инфоблок
                $type = 'another';
                $arrayInfo = [];
                $thisSite = str_replace(['https://', 'http://'], '', $link);
                $thisSite = stristr($thisSite, '/', true);
                $mtsLink = str_replace('modthesims.info', 'db.modthesims.info', $link);
                if(strpos($link, 'modthesims.info')) {
                    $hbr = file_get_contents($mtsLink);
                } else {
                    $hbr = file_get_contents($link);
                }
                $document = phpQuery::newDocument($hbr);
                switch ($thisSite) {
                    case 'sims4pack.ru': {
                        $name = $document->find('div.page div.desc > h1')->html();
                        $photo = $document->find('.block-left > img')->attr('src');
                        $file = $document->find('div.new-download > a')->attr('href');
                        if($name && $photo && $file) {
                            $arrayInfo = [
                                'link' => $link,
                                'name' => $name,
                                'photo' => $photo,
                                'site_name' => 'sims4pack',
                                'download' => "https://sims4pack.ru".$file
                            ];
                        } else {
                            print_r(json_encode(['message' => 'К сожалению данная страница не является страницой мода']));
                            die();
                        }
                    } break;
                    case 'modthesims.info': {
                        $name = trim(str_replace(['Featured upload!', 'Mod The Sims - '], '', $document->find('title')->text()));
                        $photo = $document->find('img#carousel_coverimage')->attr('src');
                        $file = $document->find('#scroll_files .message-body table a.btn')->attr('href');
                        if($name && $photo && $file) {
                            $arrayInfo = [
                                'link' => $link,
                                'name' => $name,
                                'photo' => 'https:'.$photo,
                                'site_name' => 'modthesims',
                                'download' => $file
                            ];
                        } else {
                            print_r(json_encode(['message' => 'К сожалению данная страница не является страницой мода']));
                            die();
                        }
                    } break;
                    case 'coffee-mods.ru': {
                        if(explode('/', $link)[6]) {
                            $element_code = explode('/', $link)[6];
                        } else {
                            $element_code = explode('/', $link)[5];
                        }
                        $rsElement = CIBlockElement::GetList(
                            [],["ACTIVE"=>"Y", "IBLOCK_ID"=>1, "CODE"=>$element_code],
                            false, false, ["ID", "IBLOCK_ID"]
                        );
                        if ($arElement = $rsElement->fetch()) {
                            if(in_array($arElement['ID'], $basket_property['VALUE'])) { // проверка - не добовляем ли мы уже имеющийся элемент
                                print_r(json_encode([
                                    'message' => 'Данный мод уже есть в корзине'
                                ]));
                                die();
                            }
                            $basket_list[] = [
                                "VALUE" => $arElement['ID'],
                                "DESCRIPTION" => 'our'
                            ];
                            $coffeParce = true;
                        } else {
                            print_r(json_encode(['message' => 'К сожалению данная страница не является страницой мода']));
                        }
                    } break;
                    default: {
        
                    }
                }
                if($arrayInfo) {
                    $el = new CIBlockElement;
    
                    $PROP = [
                        15 => $arrayInfo['name'],
                        14 => $arrayInfo['download'],
                        16 => $arrayInfo['site_name'],
                        17 => $arrayInfo['photo']
                    ];
                    
                    $arLoadProductArray = Array(
                        "IBLOCK_ID"         => 4,
                        "NAME"              => $arrayInfo['link'],
                        "PROPERTY_VALUES"   => $PROP
                    );
            
                    if($PRODUCT_ID = $el->Add($arLoadProductArray)) {
                        $basket_list[] = [
                            "VALUE" => $PRODUCT_ID,
                            "DESCRIPTION" => $type
                        ];
                    } else {
                        print_r(json_encode(["error" => $el->LAST_ERROR]));
                        die();
                    }
                } else if($coffeParce) {} else {
                    print_r(json_encode(['message' => 'К сожалению данный сайт ещё пока не доступен!']));
                    die();
                }
            }
        }
    }
    
    //2. добавляем новый элемент
    
    if($basket_list) {
        // обновляем данные в корзине
        CIBlockElement::SetPropertyValuesEx($userId, false, array('BASKET_APP' => $basket_list));
        
        print_r(json_encode($basket_list));
    }
} else {
    print_r(json_encode(['message' => 'token invalid']));
}
<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
CModule::IncludeModule("iblock");
header("Content-Type: application/json; charset=UTF-8");
require_once $_SERVER['DOCUMENT_ROOT'].'/ajax/jwt.php';
$jwt = new JWT;
$secret_key = 'I9v0XAESWOY0KeG8N5viNkPFnZ8i4JSmWsD3SAea';
$link = $_POST['link'];
require ($_SERVER['DOCUMENT_ROOT'].'/ajax/phpQuery/phpQuery/phpQuery.php');

try {
    $token = apache_request_headers()['Authorization'];
    $id = get_object_vars($userInfo)['id'];
    $rsElement = CIBlockElement::GetList(
        [], ["ACTIVE"=>"Y", "IBLOCK_ID"=>4, "NAME"=>$link],
        false, false, ['IBLOCK_ID', 'ID', 'NAME', 'CODE', 'DETAIL_PAGE_URL', 'IBLOCK_SECTION_ID', 'PREVIEW_PICTURE', 'PROPERTY_*']
    );
    if($arMods = $rsElement->GetNextElement()) { // если есть в инфоблоке "моды с других сервисов":
        $temp = $arMods->GetFields();
        $temp['PROP'] = $arMods->GetProperties();
        $arrayInfo[] = [
            'name' => $temp['PROP']['NAME']['~VALUE'],
            'url' => $temp['NAME'],
            'download' =>  $temp['PROP']['DOWNLOAD']['VALUE'],
            'folder_name' => $temp['PROP']['CODE']['VALUE'],
            'section'     => $temp['PROP']['SECTION']['VALUE'],
            'extension' => \Bitrix\Main\IO\Path::getExtension($temp['PROP']['DOWNLOAD']['VALUE']),
            'photo' => $temp['PROP']['PHOTO']['VALUE']
        ];
    } else {
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
                    false, false, ["ID", "IBLOCK_ID", "NAME", "DETAIL_PAGE_URL", "PREVIEW_PICTURE", "PROPERTY_*"]
                );
                if ($arElement = $rsElement->GetNextElement()) {
                    $temp = $arElement->getFields();
                    $temp['PROP'] = $arElement->getProperties();
                    $arrayInfo = [
                        'name' => $temp['~NAME'],
                        'url' => 'https://coffee-mods.ru'.$temp['~DETAIL_PAGE_URL'],
                        'download' => 'https://coffee-mods.ru'.CFile::GetPath($temp['PROP']['FILE']['VALUE']),
                        'folder_name' => $temp['CODE'],
                        'section'     => $section['ID'],
                        'extension' => \Bitrix\Main\IO\Path::getExtension('https://coffee-mods.ru'.CFile::GetPath($temp['PROP']['FILE']['VALUE'])),
                        'photo' => 'https://coffee-mods.ru'.CFile::GetPath($temp['PREVIEW_PICTURE'])
                    ];
                } else {
                    print_r(json_encode(['message' => 'К сожалению данная страница не является страницой мода']));
                }
            } break;
            default: {
    
            }
        }
    }
} catch (Exception $e) {
    $arrayInfo = false;
}

if($arrayInfo) {
    print_r(json_encode($arrayInfo));
}
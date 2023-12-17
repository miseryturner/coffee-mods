<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
CModule::IncludeModule("iblock");

$start = strtotime("2022-05-01 00:00:00");
$end = strtotime("2022-07-30 23:59:59");

$randomDate = date("d.m.Y", rand($start, $end));

$name           =   $_POST['name'];
$description    =   $_POST['desc'];
$main_photo     =   $_POST['img'];
$slider_photo   =   explode("!",$_POST['img_array']);
$views          =   $_POST['views'];
$downloads      =   $_POST['downloads'];
$file           =   $_FILES['file'];
$code           =   $_POST['code']; // jopa-popa-pisya-kaka
$category_id    =   $_POST['category_id'];
$date           =   strval($randomDate);

$el = new CIBlockElement;

$PROP = [];
$PROP[5] = [];
foreach($slider_photo as $slider_item) {
    $PROP[5][] = CFile::MakeFileArray($slider_item);
}
$PROP[8] = $downloads;
$PROP[9] = $views;
$PROP[7] = $file;

$arLoadProductArray = Array(
  "IBLOCK_SECTION_ID" => $category_id,
  "IBLOCK_ID"         => 2,
  "ACTIVE_FROM"       => $date,
  "NAME"              => $name,
  "CODE"              => $code,
  "ACTIVE"            => "Y",            // активен
  "PREVIEW_TEXT"      => str_replace('</div>', '', str_replace('<div class=material-description>', '',$description)),
  "PREVIEW_PICTURE"   => CFile::MakeFileArray($main_photo),
  "PROPERTY_VALUES"   => $PROP,
);

if($PRODUCT_ID = $el->Add($arLoadProductArray))
  echo "New ID: ".$PRODUCT_ID;
else
  echo "Error: ".$el->LAST_ERROR;

?>

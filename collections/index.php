<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetPageProperty("title", 'Сборки для TheSims4');

LocalRedirect("/the-sims4/");
?> 
<?
//Колличество элементов на странице
if($_GET['count']) {
    $count = $_GET['count'];
} else {
    $count = 12;
}

//Сортировка
if($_GET['sort'] == 'date') {
    $sort = 'ACTIVE_FROM';
} elseif($_GET['sort'] == 'downloads') {
    $sort = 'PROPERTY_COUNT_DOWNLOAD';
} elseif($_GET['sort'] == 'views') {
    $sort = 'PROPERTY_COUNT_VIEWS';
} else {
    $sort = 'PROPERTY_COUNT_VIEWS';
}


//Поиск
if($_GET['search']) {
    $arrFilter = array("?NAME" => $_GET['search']);
}
?>
<?$APPLICATION->IncludeComponent(
    "bitrix:news",
    "collections",
    Array(
        "DISPLAY_DATE" => "Y",
        "DISPLAY_PICTURE" => "Y",
        "DISPLAY_PREVIEW_TEXT" => "Y",
        "SEF_MODE" => "Y",
        "AJAX_MODE" => "N",
        "IBLOCK_TYPE" => "news",
        "IBLOCK_ID" => "2",
        "NEWS_COUNT" => $count,
        "USE_SEARCH" => "Y",
        "USE_RSS" => "Y",
        "USE_RATING" => "Y",
        "USE_CATEGORIES" => "Y",
        "USE_REVIEW" => "Y",
        "USE_FILTER" => "Y",
        "SORT_BY1" => $sort,
        "SORT_ORDER1" => "DESC",
        "SORT_BY2" => "SORT",
        "SORT_ORDER2" => "ASC",
        "CHECK_DATES" => "Y",
        "PREVIEW_TRUNCATE_LEN" => "",
        "LIST_ACTIVE_DATE_FORMAT" => "d.m.Y",
        "LIST_FIELD_CODE" => Array(),
        "LIST_PROPERTY_CODE" => Array('PHOTOS', 'MODS'),
        "HIDE_LINK_WHEN_NO_DETAIL" => "Y",
        "DISPLAY_NAME" => "Y",
        "META_KEYWORDS" => "-",
        "META_DESCRIPTION" => "-",
        "BROWSER_TITLE" => "-",
        "DETAIL_SET_CANONICAL_URL" => "Y",
        "DETAIL_ACTIVE_DATE_FORMAT" => "d.m.Y",
        "DETAIL_FIELD_CODE" => Array("PREVIEW_TEXT", "NAME", "PREVIEW_PICTURE", "SHOW_COUNTER"),
        "DETAIL_PROPERTY_CODE" => Array('PHOTOS', 'MODS'),
        "DETAIL_DISPLAY_TOP_PAGER" => "Y",
        "DETAIL_DISPLAY_BOTTOM_PAGER" => "Y",
        "DETAIL_PAGER_TITLE" => "Страница",
        "DETAIL_PAGER_TEMPLATE" => "",
        "DETAIL_PAGER_SHOW_ALL" => "Y",
        "STRICT_SECTION_CHECK" => "Y",
        "SET_TITLE" => "Y",
        "ADD_SECTIONS_CHAIN" => "Y",
        "ADD_ELEMENT_CHAIN" => "N",
        "SET_LAST_MODIFIED" => "Y",
        "PAGER_BASE_LINK_ENABLE" => "Y",
        "SET_STATUS_404" => "Y",
        "SHOW_404" => "Y",
        "MESSAGE_404" => "",
        "PAGER_BASE_LINK" => "",
        "PAGER_PARAMS_NAME" => "arrPager",
        "INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
        "USE_PERMISSIONS" => "Y",
        "GROUP_PERMISSIONS" => Array("2"),
        "CACHE_TYPE" => "N",
        "CACHE_TIME" => "3600",
        "CACHE_FILTER" => "Y",
        "CACHE_GROUPS" => "Y",
        "DISPLAY_TOP_PAGER" => "Y",
        "DISPLAY_BOTTOM_PAGER" => "Y",
        "PAGER_TITLE" => "Новости",
        "PAGER_SHOW_ALWAYS" => "Y",
        "PAGER_TEMPLATE" => "",
        "PAGER_DESC_NUMBERING" => "N",
        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
        "PAGER_SHOW_ALL" => "Y",
        "FILTER_NAME" => "",
        "FILTER_FIELD_CODE" => Array(),
        "FILTER_PROPERTY_CODE" => Array(),
        "NUM_NEWS" => "20",
        "NUM_DAYS" => "30",
        "YANDEX" => "Y",
        "MAX_VOTE" => "5",
        "VOTE_NAMES" => Array("0", "1", "2", "3", "4"),
        "CATEGORY_IBLOCK" => Array(),
        "CATEGORY_CODE" => "CATEGORY",
        "CATEGORY_ITEMS_COUNT" => "5",
        "MESSAGES_PER_PAGE" => "10",
        "USE_CAPTCHA" => "Y",
        "REVIEW_AJAX_POST" => "Y",
        "PATH_TO_SMILE" => "/bitrix/images/forum/smile/",
        "FORUM_ID" => "1",
        "URL_TEMPLATES_READ" => "",
        "SHOW_LINK_TO_FORUM" => "Y",
        "POST_FIRST_MESSAGE" => "Y",
        "SEF_FOLDER" => "/collections/",
        "SEF_URL_TEMPLATES" => Array(
            "detail" => "#SECTION_CODE_PATH#/#ELEMENT_CODE#/",
            "news" => "",
            "section" => "#SECTION_CODE_PATH#/",
        ),
        "AJAX_OPTION_JUMP" => "N",
        "AJAX_OPTION_STYLE" => "Y",
        "AJAX_OPTION_HISTORY" => "N",
        "VARIABLE_ALIASES" => Array(
            "detail" => Array(),
            "news" => Array(),
            "section" => Array(),
        ),
        "USE_SHARE" => "Y",
        "SHARE_HIDE" => "Y",
        "SHARE_TEMPLATE" => "",
        "SHARE_HANDLERS" => array("delicious", "lj", "twitter"),
        "SHARE_SHORTEN_URL_LOGIN" => "",
        "SHARE_SHORTEN_URL_KEY" => "",
        )
);?>
<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>
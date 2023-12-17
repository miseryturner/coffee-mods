<div class="container mt-3">
    <div class="row g-2 justify-content-center">
        <div class="image-header d-none d-sm-block mb-5">
            <div class="image-wrap w-100">
                <div class="backdrop"></div>
                <img src="<?=$arResult['PREVIEW_PICTURE']['SRC']?>" alt="<?=$item['NAME']?>" class="image-cover">
            </div>
        </div>

        <div class="col-xl-8 col-lg-8 mt-5" >
            <div class="package-info">
                <div class="row">
                    <div class="col-11 mb-2">
                        <nav class="package-bread breadcrumbs" style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%23282b2e'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item "><a href="/">Главная</a></li>
                                <li class="breadcrumb-item"><a href="/articles/">Статьи</a></li>
                                <li class="breadcrumb-item active text-dark" aria-current="page"><?=$arResult['NAME']?></li>
                            </ol>
                        </nav>
                        <span style="color: #1d202396; font-size: 12px; "><?=$arResult['ACTIVE_FROM']?></span>
                        <div class="d-flex flex-row justify-content-between">
                            <h1 class="h3 mb-0 p-0 py-2 fw-bolder text-dark col-10"><?=$arResult['NAME']?></h1>
                        </div>
                    </div>

                    <div class="col-10 mb-3">
                        <div class="package-description">
                            <?=$arResult['~PREVIEW_TEXT']?>
                        </div>
                        <?if($arResult['ID'] == 1537):?>
                                <img class="photo_articles" src="/local/templates/main/images/bridge.png" />
                        <?endif;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?if(false):?>
        <div class="container mt-4">
            <h4 class="fw-bold text-dark mb-3">Другие коллекции
                <svg style="margin-left: 6px;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                </svg>
            </h4>
            <?
            $GLOBALS['arrFilter'] =  array('!ID' => $arResult['ID']);
            $APPLICATION->IncludeComponent(
                "bitrix:news.list",
                "collections-index",
                Array(
                    "DISPLAY_DATE" => "Y",
                    "DISPLAY_NAME" => "Y",
                    "DISPLAY_PICTURE" => "Y",
                    "DISPLAY_PREVIEW_TEXT" => "Y",
                    "AJAX_MODE" => "Y",
                    "IBLOCK_TYPE" => "news",
                    "IBLOCK_ID" => "2",
                    "NEWS_COUNT" => "2",
                    "FILTER_NAME" => "arrFilter",
                    "SORT_BY1" => "ACTIVE_FROM",
                    "SORT_ORDER1" => "DESC",
                    "SORT_BY2" => "SORT",
                    "SORT_ORDER2" => "ASC",
                    "FIELD_CODE" => Array("ID"),
                    "PROPERTY_CODE" => Array("DESCRIPTION"),
                    "CHECK_DATES" => "Y",
                    "DETAIL_URL" => "",
                    "PREVIEW_TRUNCATE_LEN" => "",
                    "ACTIVE_DATE_FORMAT" => "d.m.Y",
                    "SET_TITLE" => "Y",
                    "SET_BROWSER_TITLE" => "Y",
                    "SET_META_KEYWORDS" => "Y",
                    "SET_META_DESCRIPTION" => "Y",
                    "SET_LAST_MODIFIED" => "Y",
                    "INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
                    "ADD_SECTIONS_CHAIN" => "Y",
                    "HIDE_LINK_WHEN_NO_DETAIL" => "Y",
                    "PARENT_SECTION" => "",
                    "PARENT_SECTION_CODE" => "",
                    "INCLUDE_SUBSECTIONS" => "Y",
                    "CACHE_TYPE" => "N",
                    "CACHE_TIME" => "3600",
                    "CACHE_FILTER" => "Y",
                    "CACHE_GROUPS" => "Y",
                    "DISPLAY_TOP_PAGER" => "Y",
                    "DISPLAY_BOTTOM_PAGER" => "Y",
                    "PAGER_TITLE" => "Новости",
                    "PAGER_SHOW_ALWAYS" => "Y",
                    "PAGER_TEMPLATE" => "",
                    "PAGER_DESC_NUMBERING" => "Y",
                    "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                    "PAGER_SHOW_ALL" => "Y",
                    "PAGER_BASE_LINK_ENABLE" => "Y",
                    "SET_STATUS_404" => "Y",
                    "SHOW_404" => "Y",
                    "MESSAGE_404" => "",
                    "PAGER_BASE_LINK" => "",
                    "PAGER_PARAMS_NAME" => "arrPager",
                    "AJAX_OPTION_JUMP" => "N",
                    "AJAX_OPTION_STYLE" => "Y",
                    "AJAX_OPTION_HISTORY" => "N",
                    "AJAX_OPTION_ADDITIONAL" => ""
                )
            );?>
        </div>
    <?endif;?>
</div>

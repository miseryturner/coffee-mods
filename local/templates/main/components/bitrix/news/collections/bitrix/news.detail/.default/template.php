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
                                <li class="breadcrumb-item"><a href="/collections/">Сборки</a></li>
                                <?if($arResult['SECTION']['NAME']):?>
                                    <li class="breadcrumb-item"><a href="/collections/<?=$arResult['SECTION']['CODE']?>"><?=$arResult['SECTION']['NAME']?></a></li>
                                <?endif;?>
                                <?if($arResult['SUB_SECTION']['NAME']):?>
                                    <li class="breadcrumb-item"><a href="/collections/<?=$arResult['SECTION']['CODE']?>/<?=$arResult['SUB_SECTION']['CODE']?>"><?=$arResult['SUB_SECTION']['NAME']?></a></li>
                                <?endif;?>
                                <li class="breadcrumb-item active text-dark" aria-current="page"><?=$arResult['NAME']?></li>
                            </ol>
                        </nav>
                        <span style="color: #1d202396; font-size: 12px; "><?=$arResult['ACTIVE_FROM']?></span>
                        <div class="d-flex flex-row justify-content-between">
                            <h1 class="h3 mb-0 p-0 py-2 fw-bolder text-dark col-10"><?=$arResult['NAME']?></h1>
                        </div>
                    </div>

                    <div class="col-11 mb-3">
                        <div id="mainCarousel" class="carousel w-10/12 max-w-5xl mx-auto">
                            <?foreach($arResult['PROPERTIES']['PHOTOS']['VALUE'] as $key=>$detail_photo):?>
                                <div
                                    class="carousel__slide"
                                    data-src="<?=CFile::GetPath($detail_photo)?>"
                                    data-fancybox="gallery"
                                >
                                    <img src="<?=CFile::GetPath($detail_photo)?>" alt="<?=$item['NAME']?>"/>
                                </div>
                            <?endforeach?>
                        </div>
                        <?if(count($arResult['PROPERTIES']['PHOTOS']['VALUE']) > 1):?>
                            <div id="thumbCarousel" class="carousel max-w-xl mx-auto">
                                <?foreach($arResult['PROPERTIES']['PHOTOS']['VALUE'] as $key=>$detail_photo):?>
                                    <?
                                        $test = CFile::ResizeImageGet($detail_photo,
                                        Array("width" => 96, "height" => 64),
                                        BX_RESIZE_IMAGE_EXACT, false);
                                    ?>
                                    <div class="carousel__slide">
                                        <img class="panzoom__content" src="<?=$test['src']?>" />
                                    </div>
                                <?endforeach?>
                            </div>
                        <?endif;?>
                    </div>

                    <div class="col-10 mb-3">
                        <div class="package-description">
                            <?=$arResult['~PREVIEW_TEXT']?>
                        </div>
                    </div>

                    <div class="col-10 mb-3">
                        <h4 class="fw-bold mt-4">Часто задаваемые вопросы: </h4>
                        <div class="accordion accordion-flush accordion-faq" id="accordionPanelsStayOpenExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="false"
                                        aria-controls="panelsStayOpen-collapseOne">
                                        Как установить моды в формате .package или .ts4script
                                    </button>
                                </h2>
                                <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse"
                                    aria-labelledby="panelsStayOpen-headingOne">
                                    <div class="accordion-body">
                                        <ul>
                                            <li>Зайдите на страницу с понравившимся Вам модом, после скачайте его с помощью кнопки <span
                                                    class="badge bg-primary dw-badge mx-1">Загрузить <svg xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 16 16" width="11" height="11" fill="currentColor">
                                                        <path fill-rule="evenodd"
                                                            d="M7.47 10.78a.75.75 0 001.06 0l3.75-3.75a.75.75 0 00-1.06-1.06L8.75 8.44V1.75a.75.75 0 00-1.5 0v6.69L4.78 5.97a.75.75 0 00-1.06 1.06l3.75 3.75zM3.75 13a.75.75 0 000 1.5h8.5a.75.75 0 000-1.5h-8.5z">
                                                        </path>
                                                    </svg></span></li>
                                            <li>Извлекаем архив в текущую папку или в папку с тем же названием</li>
                                            <li>Затем помещаем скачанный файл в папку <b>Mods</b>, предварительно создав отдельную подпапку
                                                <i class="text-muted">(По желанию)</i>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false"
                                        aria-controls="panelsStayOpen-collapseTwo">
                                        Как установить моды на дома и симов
                                    </button>
                                </h2>
                                <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse"
                                    aria-labelledby="panelsStayOpen-headingTwo">
                                    <div class="accordion-body">
                                        <ul>
                                            <li>Зайдите на страницу с понравившимся Вам модом, после скачайте его с помощью кнопки <span
                                                    class="badge bg-primary dw-badge mx-1">Загрузить <svg xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 16 16" width="11" height="11" fill="currentColor">
                                                        <path fill-rule="evenodd"
                                                            d="M7.47 10.78a.75.75 0 001.06 0l3.75-3.75a.75.75 0 00-1.06-1.06L8.75 8.44V1.75a.75.75 0 00-1.5 0v6.69L4.78 5.97a.75.75 0 00-1.06 1.06l3.75 3.75zM3.75 13a.75.75 0 000 1.5h8.5a.75.75 0 000-1.5h-8.5z">
                                                        </path>
                                                    </svg></span></li>
                                            <li>Извлекаем архив в текущую папку или в папку с тем же названием</li>
                                            <li> Затем помещаем все файлы из архива с расщирениями: <b>.bpi, .trayitem, .sgi, .hhi,
                                                    .householdbinary</b> и др. в папку <b>Tray</b></li>
                                            <li>Ищите установленных персонажей или дома в библиотеке в игре</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false"
                                        aria-controls="panelsStayOpen-collapseThree">
                                        Как установить моды с более чем одним файлом или папкой
                                    </button>
                                </h2>
                                <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse"
                                    aria-labelledby="panelsStayOpen-headingThree">
                                    <div class="accordion-body">
                                        <ul>
                                            <li>Зайдите на страницу с понравившимся Вам модом, после скачайте его с помощью кнопки <span
                                                    class="badge bg-primary dw-badge mx-1">Загрузить <svg xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 16 16" width="11" height="11" fill="currentColor">
                                                        <path fill-rule="evenodd"
                                                            d="M7.47 10.78a.75.75 0 001.06 0l3.75-3.75a.75.75 0 00-1.06-1.06L8.75 8.44V1.75a.75.75 0 00-1.5 0v6.69L4.78 5.97a.75.75 0 00-1.06 1.06l3.75 3.75zM3.75 13a.75.75 0 000 1.5h8.5a.75.75 0 000-1.5h-8.5z">
                                                        </path>
                                                    </svg></span></li>
                                            <li>Извлекаем архив в текущую папку или в папку с тем же названием</li>
                                            <li>Затем помещаем файлы в формате <b>.package</b> и/или <b>.ts4script</b> в папку <b>Mods</b>,
                                                предварительно создав отдельную подпапку</li>
                                            <li>Затем помещаем все файлы из архива с расширениями: <b>.bpi, .trayitem, .sgi, .hhi,
                                                    .householdbinary</b> и др. в папку <b>Tray</b></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="panelsStayOpen-headingFour">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="false"
                                        aria-controls="panelsStayOpen-collapseThree">
                                        Что делать если мод был установлен правильно, но в игре его нет
                                    </button>
                                </h2>
                                <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse"
                                    aria-labelledby="panelsStayOpen-headingFour">
                                    <div class="accordion-body">
                                        <ul>
                                            <li>Проверьте правильность путей, куда Вы устанавливали моды</li>
                                            <li>Настройки игры &gt; Другое &gt; Поставить галочку на <b>Пользовательский контент и моды</b>
                                                &gt; нажмите <span class="badge bg-light dw-badge mx-1 shadow-lg">Сохранить</span></li>
                                            <li>Перезагрузите игру</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="panelsStayOpen-headingFifth">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#panelsStayOpen-collapseFifth" aria-expanded="false"
                                        aria-controls="panelsStayOpen-collapseThree">
                                        Директории/Пути установки
                                    </button>
                                </h2>
                                <div id="panelsStayOpen-collapseFifth" class="accordion-collapse collapse"
                                    aria-labelledby="panelsStayOpen-headingFifth">
                                    <div class="accordion-body">
                                        <p class="mb-3">Расположение Mods и Tray</p>
                                        <ul>
                                            <li><b>Documents/Electronic Arts/The Sims 4/Mods</b></li>
                                            <li><b>Documents/Electronic Arts/The Sims 4/Tray</b></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-4 mt-5">
            <div class="row row-cols-1 g-2 sticky">
                <div class="row mb-3">
                    <div class="package-card p-0">
                        <img src="<?=$arResult['PREVIEW_PICTURE']['SRC']?>" alt="<?=$item['NAME']?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="package-buttons d-flex flex-row justify-content-between align-items-center p-0 w-100">
                        <a @click="downloadCallback()" v-html="downloadButtonContent" href="<?=CFile::GetPath($arResult['PROPERTIES']['FILE']['VALUE'])?>" download="<?=$arResult['CODE']?>.<?=pathinfo(CFile::GetPath($arResult['PROPERTIES']['FILE']['VALUE']), PATHINFO_EXTENSION)?>" type="button" class="btn btn-primary download-package-button" :class="{ disabled: downloadButtonDisabled }" style="width: 100%">
                            Загрузить
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="15" height="15" fill="currentColor"><path fill-rule="evenodd" d="M7.47 10.78a.75.75 0 001.06 0l3.75-3.75a.75.75 0 00-1.06-1.06L8.75 8.44V1.75a.75.75 0 00-1.5 0v6.69L4.78 5.97a.75.75 0 00-1.06 1.06l3.75 3.75zM3.75 13a.75.75 0 000 1.5h8.5a.75.75 0 000-1.5h-8.5z"></path></svg>
                        </a>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="package-stat-info d-flex flex-row flex-nowrap justify-content-around align-items-center bg-light rounded border">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                            <span><?=$arResult['PROPERTIES']['DOWNLOADS']['VALUE']?></span>
                        </span>
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg"  width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                            </svg>
                            <span>
                                <?
                                    $packFile = CFile::GetByID($arResult['PROPERTIES']['FILE']['VALUE'])->Fetch();
                                    $packFileSize = CFile::FormatSize($packFile['FILE_SIZE']);
                                    echo(trim(preg_replace('/\s+/',' ', $packFileSize)));
                                ?>
                            </span>
                        </span>
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                            <span><?=$arResult['SHOW_COUNTER'] + $arResult['PROPERTIES']['VIEWS']['VALUE']?></span>
                        </span>
                    </div>
                </div>
                <?if($arResult['PROPERTIES']['AUTHOR']['VALUE']):?>
                    <div class="row">
                        <div class="row row-cols-2 g-2 package-author bg-light rounded border m-0 px-1 py-2">
                            <div class="col-2 m-0"><img src="./assets/images/avatar.jpg" alt="" width="35" height="35" class="border rounded-circle"></div>
                            <div class="col-10 m-0 d-flex align-items-center">
                                <a href="#" class="package-author-name text-left p-0 m-0 link-dark">Casper</a>
                                <svg style="margin-left: 3px" xmlns="http://www.w3.org/2000/svg"viewBox="0 0 20 20" width="14" height="14" fill="#3683ff">
                                    <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                    </div>
                <?endif;?>
            </div>
        </div>
    </div>
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
</div>

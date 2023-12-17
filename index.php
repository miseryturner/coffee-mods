<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle("");
$APPLICATION->SetPageProperty('description', 'Моды для Симс 4 скачать бесплатно. Мы собрали для вас большое колличество модов для Симс 4, такие как Командный центр, More Columns in CAS, Wicked Whims');
$APPLICATION->SetPageProperty("title", 'Моды для Симс 4 - CoffeeMods');
?><div class="position-relative overflow-hidden p-3 p-md-5 text-center bg-light mb-5 main-banner">
    <div id="carouselExampleControls" class="container carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="col-md-5 p-lg-4 mx-auto my-4" style="width: 50%">
                    <h1 class="display-4 fw-bold">Coffee<span class="fw-bolder text-primary">Mods</span> + Bridge</h1>
                    <p class="lead fw-normal fs-6">
                        Мы экономим Ваше время с помощью "Bridge"<br> Скачивай моды моментально и бесплатно!
                    </p>
                    <a class="btn btn-primary" href="/articles/bridge/">
                        Подробнее
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                        </svg>
                    </a>
                </div>
            </div>
            <div class="carousel-item">
                <div class="col-md-5 p-lg-4 mx-auto my-4">
                    <h1 class="display-4 fw-bold">Coffee<span class="fw-bolder text-primary">Mods</span></h1>
                    <p class="lead fw-normal fs-6">
                        Моды на Симс 4. Мы собрали для вас<br> огромную библиотеку модов на The Sims 4.<br> Желаем вам приятной игры!
                    </p>
                    <a class="btn btn-primary" href="/the-sims4/">
                        Смотреть каталог
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                        </svg>
                    </a>
                </div>
            </div>
            <div class="carousel-item">
                <div class="col-md-8 mx-auto my-4">
                    <div class="row flex-lg-row-reverse align-items-center">
                        <div class="col">
                            <img src="/local/templates/main/images/sims.png" class="d-block mx-lg-auto img-fluid">
                        </div>
                        <div class="col-7">
                            <h2 class="text-start fw-bold lh-1 mb-3">Добро пожаловать!</h2>
                            <p class="text-start mb-4">
                                Мы очень любим свой проект и хотим сделать его лучше для вас.<br> В связи с этим приглашаем вас в наш телеграм канал для обсуждения обновлений. 
                            </p>			
                            <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                                <a class="btn btn-primary" href="https://t.me/coffeemods" target="_blank">
                                    Перейти
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="col-md-5 p-lg-4 mx-auto my-4" style="width: 55%">
                    <h2 class="h1 display-4 fw-bold">Избранные <span class="fw-bolder text-primary">Моды</span></h2>
                    <p class="lead fw-normal fs-6" style="width: 65%; margin: 0 auto 15px auto;">
                        Вы можете сохранять понравившиеся вам моды. После чего скачать только самые нужные.
                    </p>
                    <a class="btn btn-primary" href="/saved/">
                        Перейти
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>

<div class="container">
    <a href="/the-sims4/" class="d-block h4 fw-bold text-dark mb-3">Моды для Симс 4
        <svg style="margin-left: 6px;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none"
            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3" />
        </svg>
    </a>
    <?$APPLICATION->IncludeComponent(
        "bitrix:news.list",
        "mods-index",
        Array(
            "DISPLAY_DATE" => "Y",
            "DISPLAY_NAME" => "Y",
            "DISPLAY_PICTURE" => "Y",
            "DISPLAY_PREVIEW_TEXT" => "Y",
            "AJAX_MODE" => "Y",
            "IBLOCK_TYPE" => "news",
            "IBLOCK_ID" => "1",
            "NEWS_COUNT" => "4",
            "SORT_BY1" => "SORT",
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

    <!-- Yandex.RTB R-A-1994770-2 -->
    <div id="yandex_rtb_R-A-1994770-2"></div>
    <script type="application/javascript">window.yaContextCb.push(()=>{
    Ya.Context.AdvManager.render({
        renderTo: 'yandex_rtb_R-A-1994770-2',
        blockId: 'R-A-1994770-2'
    })
    })</script>

    <a href="/the-sims4/clothing/" class="d-block h4 fw-bold text-dark mb-3">Одежда для Симс 4
        <svg style="margin-left: 6px;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none"
            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3" />
        </svg>
    </a>
    <?
    $GLOBALS['arrFilter'] = array('IBLOCK_SECTION_ID' => 25);
    $APPLICATION->IncludeComponent(
        "bitrix:news.list",
        "mods-index",
        Array(
            "DISPLAY_DATE" => "Y",
            "DISPLAY_NAME" => "Y",
            "DISPLAY_PICTURE" => "Y",
            "DISPLAY_PREVIEW_TEXT" => "Y",
            "AJAX_MODE" => "Y",
            "IBLOCK_TYPE" => "news",
            "FILTER_NAME" => "arrFilter",
            "IBLOCK_ID" => "1",
            "NEWS_COUNT" => "4",
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

    <p class="h4 fw-bold text-dark mb-3" id="faq">Часто задаваемые вопросы</p>
    <div class="accordion accordion-flush accordion-faq" id="accordionPanelsStayOpenExample">
        <div class="accordion-item">
            <p class="h2 accordion-header" id="panelsStayOpen-headingOne">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="false"
                    aria-controls="panelsStayOpen-collapseOne">
                    Как установить моды в формате .package или .ts4script
                </button>
            </p>
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
            <p class="h2 accordion-header" id="panelsStayOpen-headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false"
                    aria-controls="panelsStayOpen-collapseTwo">
                    Как установить моды на дома и симов
                </button>
            </p>
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
            <p class="h2 accordion-header" id="panelsStayOpen-headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false"
                    aria-controls="panelsStayOpen-collapseThree">
                    Как установить моды с более чем одним файлом или папкой
                </button>
            </p>
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
            <p class="h2 accordion-header" id="panelsStayOpen-headingFour">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="false"
                    aria-controls="panelsStayOpen-collapseThree">
                    Что делать если мод был установлен правильно, но в игре его нет
                </button>
            </p>
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
            <p class="h2 accordion-header" id="panelsStayOpen-headingFifth">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#panelsStayOpen-collapseFifth" aria-expanded="false"
                    aria-controls="panelsStayOpen-collapseThree">
                    Директории/Пути установки
                </button>
            </p>
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

    <div id="yandex_rtb_R-A-1994770-1"></div>
    <script type="application/javascript">window.yaContextCb.push(()=>{
    Ya.Context.AdvManager.render({
        renderTo: 'yandex_rtb_R-A-1994770-1',
        blockId: 'R-A-1994770-1'
    })
    })</script>
</div>
<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>
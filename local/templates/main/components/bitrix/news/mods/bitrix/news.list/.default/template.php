<div class="container mt-3">
    <nav class="package-bread breadcrumbs mb-3" style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Главная</a></li>
            <?if($arResult['SECTION']['PATH'][1]['SECTION_PAGE_URL']):?>
                <li class="breadcrumb-item"><a href="/the-sims4/">Моды на Симс 4</a></li>
                <li class="breadcrumb-item"><a href="<?=$arResult['SECTION']['PATH'][0]['SECTION_PAGE_URL']?>"><?=$arResult['SECTION']['PATH'][0]['NAME']?> для Симс 4</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?=$arResult['SECTION']['PATH'][1]['NAME']?> для Симс 4</li>
            <?elseif($arResult['SECTION']['PATH'][0]['SECTION_PAGE_URL']):?>
                <li class="breadcrumb-item"><a href="/the-sims4/">Моды на Симс 4</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?=$arResult['SECTION']['PATH'][0]['NAME']?> для Симс 4</li>
            <?else:?>
                <li class="breadcrumb-item active" aria-current="page">Моды на Симс 4</li>
            <?endif;?>
        </ol>
    </nav>
    <div class="row g-2 mods-wrapper">
        <div class="col-md-12 mb-2 p-0">
            <div class="input-group">
                <input @keyup.enter="onEnterSearch" type="text" id="search-bar" class="form-control" value="<?=$_GET['search']?>" placeholder="Введите запрос" aria-describedby="button-addon">
                <button type="button" @click="clearSearch" c id="button-addon" class="btn btn-clear">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" width="16" viewBox="0 0 20 20" fill="currentColor" style="transform: rotate(45deg);">
                        <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                    </svg>
                </button>
                <button @click="filterSearch" class="btn btn-primary" type="button" id="button-addon">Поиск</button>
            </div>
        </div>
        <div class="col-xl-9 col-lg-8 browse-container">
            <div class="row g-2">
                <div class="col-12 mb-3">
                    <div class="row g-2">
                        <div class="col d-flex flex-row" style="align-items: center !important;">
                            <?if($arResult['SECTION']['PATH'][1]['NAME']):?>
                                <h1 class="h4 m-0 fw-bold"><?=$arResult['SECTION']['PATH'][1]['NAME']?> для Симс 4</h1>
                            <?elseif($arResult['SECTION']['PATH'][0]['NAME']):?>
                                <h1 class="h4 m-0 fw-bold"><?=$arResult['SECTION']['PATH'][0]['NAME']?> для Симс 4</h1>
                            <?else:?>
                                <h1 class="h4 m-0 fw-bold"><?=$arResult['NAME']?></h1>
                            <?endif;?>
                        </div>
                        <div class="col-auto d-flex flex-row">
                            <p class="m-0 text-mued" style="align-self: center; width: 120px !important;">Показывать по</p>
                            <select @input="filterCount($event)" class="form-select ms-1" id="state" required="">
                                <?foreach($arResult['ELEMENTS_COUNT'] as $elemCountItem):?>
                                    <?if($_GET['count']):?>
                                        <option value="<?=$elemCountItem?>" <?=$_GET['count']==$elemCountItem ? 'selected' : ''?>><?=$elemCountItem?></option>
                                    <?else:?>
                                        <option value="<?=$elemCountItem?>" <?=$elemCountItem==24 ? 'selected' : ''?>><?=$elemCountItem?></option>
                                    <?endif;?>
                                <?endforeach;?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-4">
                <?if($arResult['ITEMS']):?>
                    <?foreach($arResult['ITEMS'] as $item):?>
                        <div class="col-md-4">
                            <div class="card mb-4 border-1 mod-card">
                                <a href="<?=$item['DETAIL_PAGE_URL']?>" class="image-link">
                                    <div class="hover-info">
                                        <div class="package-stat-info d-flex flex-row flex-nowrap justify-content-around align-items-center bg-light rounded border">
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 20 20" fill="#fff"><path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg> 
                                                <span><?=$item['PROPERTIES']['COUNT_DOWNLOAD']['VALUE']?></span>
                                            </span> 
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="#fff" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path></svg> 
                                                <span>
                                                    <?
                                                        $packFile = CFile::GetByID($item['PROPERTIES']['FILE']['VALUE'])->Fetch();
                                                        $packFileSize = CFile::FormatSize($packFile['FILE_SIZE']);
                                                        echo(trim(preg_replace('/\s+/',' ', $packFileSize)));
                                                    ?>
                                                </span>
                                            </span> 
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="#fff" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path> <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg> 
                                                <span><?=$item['PROPERTIES']['COUNT_VIEWS']['VALUE'] + $item['SHOW_COUNTER']?></span>
                                            </span>
                                        </div>
                                    </div>
                                    <?
                                        $resize_photo = CFile::ResizeImageGet($item['PREVIEW_PICTURE'],
                                        Array("width" => 304, "height" => 304),
                                        BX_RESIZE_IMAGE_PROPORTIONAL, false);
                                    ?>
                                    <img class="card-img-top" width="304" height="304" alt="<?=$item['NAME']?>" src="<?=$resize_photo['src']?>" data-holder-rendered="true">
                                </a>
                                <div class="card-body d-flex flex-column justify-content-between">
                                    <div class="card-main-info">
                                        <a href="<?=$item['DETAIL_PAGE_URL']?>" class="text-dark fw-bold fs-6 card-title-link"><?=$item['NAME']?></a>
                                        <div class="card-text mt-2" title="<?if($item['~PREVIEW_TEXT']) echo trim(preg_replace('/\s+/',' ', str_replace('"', '', strip_tags(strval($item['PREVIEW_TEXT'])))))?>">
                                            <?if($item['~PREVIEW_TEXT']):?>
                                                <?=substr(strip_tags(strval($item['~PREVIEW_TEXT'])),0,256)?>
                                            <?endif;?>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-column justify-content-between align-items-center card-buttons">
                                        <?/*if(!$item['SAVED']):?>
                                            <a type="button" @click="saveMod(<?=$item['ID']?>, $event.currentTarget)" class="btn btn-secondary btn-sm">Сохранить мод
                                                <svg class="text-muted" xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 20 20" fill="currentColor"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                            </a>
                                        <?else:?>
                                            <a type="button" class="disabled btn btn-secondary btn-sm">
                                                Сохранено
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" width="16" height="16" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" /></svg>
                                            </a>
                                        <?endif;*/?>

                                        <a 
                                            type="button" 
                                            href="<?=CFile::GetPath($item['PROPERTIES']['FILE']['VALUE'])?>" 
                                            type="button" 
                                            class="btn btn-sm btn-primary download-package-button" 
                                        >   
                                            Скачать мод 
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="13" height="13" fill="currentColor"><path fill-rule="evenodd" d="M7.47 10.78a.75.75 0 001.06 0l3.75-3.75a.75.75 0 00-1.06-1.06L8.75 8.44V1.75a.75.75 0 00-1.5 0v6.69L4.78 5.97a.75.75 0 00-1.06 1.06l3.75 3.75zM3.75 13a.75.75 0 000 1.5h8.5a.75.75 0 000-1.5h-8.5z"></path></svg>
                                        </a>
                                        <a 
                                            @click="downloadBrige(
                                                '<?=CFile::GetPath($item['PROPERTIES']['FILE']['VALUE'])?>', 
                                                '<?=$item['CODE']?>', 
                                                '<?=\Bitrix\Main\IO\Path::getExtension(CFile::GetPath($item['PROPERTIES']['FILE']['VALUE']))?>',
                                                '<?=$item['IBLOCK_SECTION_ID']?>', 
                                                '<?=$item['ID']?>'
                                            )" 
                                            type="button"
                                            class="btn btn-dark download-package-button btn-bridge" 
                                            style="width: 100%"
                                            name="<?=$item['ID']?>"
                                        >
                                            <div class="loadbar"></div>
                                            Скачать через Bridge
                                            <img src="/favicon.svg" style="width: 17px;margin-left: 5px;" alt="">
                                        </a>
                                        <a 
                                            @click="openPopup()" 
                                            type="button" 
                                            class="btn btn-dark download-package-button btn-bridge btn-bridge-fake" 
                                            style="width: 100%"
                                        >
                                            Скачать через Bridge
                                            <img src="/favicon.svg" style="width: 17px;margin-left: 5px;" alt="">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?endforeach;?>
                <?endif;?>
            </div>
        </div>
        <div class="col-xl-3 col-lg-4 side-bar-container">
            <div class="sidebar-sticky">
                <div class="col mb-3">
                    <select @input="filterSort($event)" class="form-select" id="state" required="">
                        <?foreach($arResult['ELEMENTS_SORT'] as $sortItem):?>
                            <option value="<?=$sortItem['SORT']?>" <?=$_GET['sort']==$sortItem['SORT'] ? 'selected' : ''?>><?=$sortItem['NAME']?></option>
                        <?endforeach;?>
                    </select>
                </div>
                <div class="col mb-2">
                    <div class="card bg-light">
                        <div class="card-body">
                            <ul class="side-bar-menu">
                                <li><a class="link-dark side-bar-menu-lnk <?if($category['CODE']==$arResult['SECTION']['PATH'][0]['CODE']){echo 'active';}?>" href="/the-sims4/">Все</a></li>
                                <?foreach($arResult['SECTIONS'] as $category):?>
                                    <li><a class="link-dark side-bar-menu-lnk <?if($category['CODE']==$arResult['SECTION']['PATH'][0]['CODE']){echo 'active';}?>" href="<?=$category['SECTION_PAGE_URL']?>"><?=$category['NAME']?></a>
                                        <ul>
                                            <?foreach($category['SUB_SECTIONS'] as $sub_category):?>
                                                <li><a class="link-dark sub-lnk" href="<?=$sub_category['SECTION_PAGE_URL']?>"><?=$sub_category['NAME']?></a></li>
                                            <?endforeach;?>
                                        </ul>
                                    </li>
                                <?endforeach?>
                            </ul>

                        </div>
                    </div>
                </div>
                <!-- Yandex.RTB R-A-1994770-3 -->
                <div id="yandex_rtb_R-A-1994770-3"></div>
                <script type="application/javascript">window.yaContextCb.push(()=>{
                Ya.Context.AdvManager.render({
                    renderTo: 'yandex_rtb_R-A-1994770-3',
                    blockId: 'R-A-1994770-3'
                })
                })</script>
            </div>
        </div>
    </div>

    <div class="d-flex flex-row justify-content-center align-content-center">
        <?if($arParams["DISPLAY_BOTTOM_PAGER"]) :?>
            <?=$arResult["NAV_STRING"]?>
        <?endif;?>
    </div>
    <!-- Yandex.RTB R-A-1994770-4 -->
    <div id="yandex_rtb_R-A-1994770-4"></div>
    <script type="application/javascript">window.yaContextCb.push(()=>{
    Ya.Context.AdvManager.render({
        renderTo: 'yandex_rtb_R-A-1994770-4',
        blockId: 'R-A-1994770-4'
    })
    })</script>
</div>

<div class="container mt-3">
    <nav class="package-bread breadcrumbs mb-3" style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Главная</a></li>
            <?if($arResult['SECTION']['PATH'][1]['SECTION_PAGE_URL']):?>
                <li class="breadcrumb-item"><a href="/collections/">Сборки</a></li>
                <li class="breadcrumb-item"><a href="<?=$arResult['SECTION']['PATH'][0]['SECTION_PAGE_URL']?>"><?=$arResult['SECTION']['PATH'][0]['NAME']?></a></li>
                <li class="breadcrumb-item active" aria-current="page"><?=$arResult['SECTION']['PATH'][1]['NAME']?></li>
            <?elseif($arResult['SECTION']['PATH'][0]['SECTION_PAGE_URL']):?>
                <li class="breadcrumb-item"><a href="/collections/">Сборки</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?=$arResult['SECTION']['PATH'][0]['NAME']?></li>
            <?else:?>
                <li class="breadcrumb-item active" aria-current="page">Каталог</li>
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
                            <h1 class="h4 m-0 fw-bold"><?=$arResult['SECTION']['PATH'][1]['NAME']?></h1>
                        <?elseif($arResult['SECTION']['PATH'][0]['NAME']):?>
                            <h1 class="h4 m-0 fw-bold"><?=$arResult['SECTION']['PATH'][0]['NAME']?></h1>
                        <?else:?>
                            <h1 class="h4 m-0 fw-bold"><?=$arResult['NAME']?></h1>
                        <?endif;?>
                        </div>
                        <div class="col-auto d-flex flex-row">
                            <p class="m-0 text-mued" style="align-self: center; width: 120px !important;">Показывать по</p>
                            <select @input="filterCount($event)" class="form-select ms-1" id="state" required="">
                                <?foreach($arResult['ELEMENTS_COUNT'] as $elemCountItem):?>
                                    <option value="<?=$elemCountItem?>" <?=$_GET['count']==$elemCountItem ? 'selected' : ''?>><?=$elemCountItem?></option>
                                <?endforeach;?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <pre>
                <?print_r($arResult['ITEMS'])?>
            </pre> -->
            <div class="row mb-4">
                <?if($arResult['ITEMS']):?>
                    <?foreach($arResult['ITEMS'] as $item):?>
                        <div class="col-md-6 collection-card-item">
                            <div class="card collection-card position-relative">
                                <img src="<?=$item['PREVIEW_PICTURE']['SRC']?>" alt="<?=$item['NAME']?>" class="card-img">
                                <div class="card-black-overlay position-absolute w-100 h-100 p-0 m-0 top-0"></div>
                                <div class="card-img-overlay">
                                    <div class="nativer position-absolute bottom-0 py-3">
                                        <!-- <p class="text-light m-0" style="font-size: 12px !important">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z" />
                                            </svg>
                                            <?=count($item['PROPERTIES']['MODS']['VALUE'])?> элементов
                                        </p> -->
                                        <a href="<?=$item['DETAIL_PAGE_URL']?>" class="link-light fw-bold fs-5 card-title-link collection-title-link"><?=$item['NAME']?></a>
                                        <div class="d-flex justify-content-between align-items-end mt-2">
                                            <p class="text-light my-auto" title="<?if($item['PREVIEW_TEXT']) echo trim(preg_replace('/\s+/',' ', str_replace('"', '', strip_tags(strval($item['~PREVIEW_TEXT'])))))?>"><?=mb_substr(strip_tags(strval($item['~PREVIEW_TEXT'])),0,40)."..."?></p>
                                            <a  
                                                type="button" 
                                                @click="downloadCallbackList($event.currentTarget)" 
                                                v-html="downloadButtonContent" 
                                                href="<?=CFile::GetPath($item['PROPERTIES']['FILE']['VALUE'])?>" 
                                                download="<?=$item['CODE']?>.<?=pathinfo(CFile::GetPath($item['PROPERTIES']['FILE']['VALUE']), PATHINFO_EXTENSION)?>" 
                                                type="button" 
                                                class="btn btn-light btn-sm" 
                                                :class="{ disabled: downloadButtonDisabled }"
                                            >
                                                Загрузить
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="13" height="13" fill="currentColor"><path fill-rule="evenodd" d="M7.47 10.78a.75.75 0 001.06 0l3.75-3.75a.75.75 0 00-1.06-1.06L8.75 8.44V1.75a.75.75 0 00-1.5 0v6.69L4.78 5.97a.75.75 0 00-1.06 1.06l3.75 3.75zM3.75 13a.75.75 0 000 1.5h8.5a.75.75 0 000-1.5h-8.5z"></path></svg>
                                            </a>
                                        </div>
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
            <div class="col mb-2">
                    <div class="card bg-light">
                        <div class="card-body">
                            <ul class="side-bar-menu">
                                <li><a class="link-dark side-bar-menu-lnk <?if($category['CODE']==$arResult['SECTION']['PATH'][0]['CODE']){echo 'active';}?>" href="/collections/<?=$arResult['GET_PARAMS']?>">Все</a></li>
                                <?foreach($arResult['SECTIONS'] as $category):?>
                                    <li><a class="link-dark side-bar-menu-lnk <?if($category['CODE']==$arResult['SECTION']['PATH'][0]['CODE']){echo 'active';}?>" href="<?=$category['SECTION_PAGE_URL']?><?=$arResult['GET_PARAMS']?>"><?=$category['NAME']?></a>
                                        <ul>
                                            <?foreach($category['SUB_SECTIONS'] as $sub_category):?>
                                                <li><a class="link-dark sub-lnk" href="<?=$sub_category['SECTION_PAGE_URL']?><?=$arResult['GET_PARAMS']?>"><?=$sub_category['NAME']?></a></li>
                                            <?endforeach;?>
                                        </ul>
                                    </li>
                                <?endforeach?>
                            </ul>

                        </div>
                    </div>
                </div>
                <div class="col mb-2">
                    <select @input="filterSort($event)" class="form-select" id="state" required="">
                        <?foreach($arResult['ELEMENTS_SORT'] as $sortItem):?>
                            <option value="<?=$sortItem['SORT']?>" <?=$_GET['sort']==$sortItem['SORT'] ? 'selected' : ''?>><?=$sortItem['NAME']?></option>
                        <?endforeach;?>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex flex-row justify-content-center align-content-center">
        <?if($arParams["DISPLAY_BOTTOM_PAGER"]) :?>
            <?=$arResult["NAV_STRING"]?>
        <?endif;?>
    </div>
</div>

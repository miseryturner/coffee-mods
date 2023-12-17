<div class="row mb-3">
    <?foreach($arResult['ITEMS'] as $modsItem):?>
        <div class="col-md-3">
            <div class="card mb-4 border-1 mod-card">
                <a href="<?=$modsItem['DETAIL_PAGE_URL']?>" class="image-link">
                    <div class="hover-info">
                        <div class="package-stat-info d-flex flex-row flex-nowrap justify-content-around align-items-center bg-light rounded border">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 20 20" fill="#fff"><path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg> 
                                <span><?=$modsItem['PROPERTIES']['COUNT_DOWNLOAD']['VALUE']?></span>
                            </span> 
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="#fff" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path></svg> 
                                <span>
                                    <?
                                        $packFile = CFile::GetByID($modsItem['PROPERTIES']['FILE']['VALUE'])->Fetch();
                                        $packFileSize = CFile::FormatSize($packFile['FILE_SIZE']);
                                        echo(trim(preg_replace('/\s+/',' ', $packFileSize)));
                                    ?>
                                </span>
                            </span> 
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="#fff" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path> <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg> 
                                <span><?=$modsItem['PROPERTIES']['COUNT_VIEWS']['VALUE'] + $modsItem['SHOW_COUNTER']?></span>
                            </span>
                        </div>
                    </div>
                    <img class="card-img-top" width="304" height="304"
                        src="<?=$modsItem['PREVIEW_PICTURE']['SRC']?>" alt="$modsItem['NAME']">
                </a>
                <div class="card-body d-flex flex-column justify-content-between">
                    <div class="card-main-info">
                        <a href="<?=$modsItem['DETAIL_PAGE_URL']?>" class="text-dark fw-bold fs-6 card-title-link"><?=$modsItem['NAME']?></a>
                        <div class="card-text mt-2" title="<?if($modsItem['PREVIEW_TEXT']) echo trim(preg_replace('/\s+/',' ', str_replace('"', '', strip_tags(strval($item['PREVIEW_TEXT'])))))?>">
                            <?if($modsItem['PREVIEW_TEXT']):?>
                                <?=substr(strip_tags(strval($modsItem['~PREVIEW_TEXT'])),0,256)?>
                            <?endif;?>
                        </div>                    
                    </div>

                    <div class="d-flex justify-content-between align-items-center downloads-btn">
                        
                        <?/*if(!$modsItem['SAVED']):?>
                            <a type="button" @click="saveMod(<?=$modsItem['ID']?>, $event.currentTarget)" class="btn btn-secondary btn-sm">Сохранить мод
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
                            href="<?=CFile::GetPath($modsItem['PROPERTIES']['FILE']['VALUE'])?>" 
                            type="button" 
                            class="btn btn-sm btn-primary download-package-button" 
                        >   
                            Загрузить
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="13" height="13" fill="currentColor"><path fill-rule="evenodd" d="M7.47 10.78a.75.75 0 001.06 0l3.75-3.75a.75.75 0 00-1.06-1.06L8.75 8.44V1.75a.75.75 0 00-1.5 0v6.69L4.78 5.97a.75.75 0 00-1.06 1.06l3.75 3.75zM3.75 13a.75.75 0 000 1.5h8.5a.75.75 0 000-1.5h-8.5z"></path></svg>
                        </a>
                            <a 
                                @click="downloadBrige(
                                    '<?=CFile::GetPath($modsItem['PROPERTIES']['FILE']['VALUE'])?>', 
                                    '<?=$modsItem['CODE']?>', 
                                    '<?=\Bitrix\Main\IO\Path::getExtension(CFile::GetPath($modsItem['PROPERTIES']['FILE']['VALUE']))?>',
                                    '<?=$modsItem['IBLOCK_SECTION_ID']?>', 
                                    '<?=$modsItem['ID']?>'
                                )" 
                                type="button" 
                                class="btn btn-dark download-package-button btn-bridge" 
                                style="width: 100%"
                                name="<?=$modsItem['ID']?>"
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
</div>
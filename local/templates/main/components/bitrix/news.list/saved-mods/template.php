<div class="container py-5">
    <h2 class="fw-bold mb-2"><?=$APPLICATION->GetTitle()?></h2>
    <p class="text-muted mb-3 ">Здесь находятся моды, которые Вы сохранили. Используйте <i>Избранные моды»</i> в качестве закладок.</p>
    <?if(!$arResult['ERROR']):?>
        <div class="saved-package-list">
            <div class="error_saved">
                У Вас ещё нет сохранённых модов
            </div>
            <?foreach($arResult as $item):?>
                <div data-id="<?=$item['ID']?>" class="saved-package d-flex position-relative mt-4">
                    <?
                        $resize_photo = CFile::ResizeImageGet($item['PREVIEW_PICTURE'],
                        Array("width" => 165, "height" => 165),
                        BX_RESIZE_IMAGE_PROPORTIONAL, false);
                    ?>
                    <img src="<?=$resize_photo['src']?>" width="165" height="165" class="rounded border flex-shrink-0 me-3">
                    <div>
                        <a href="<?=$item['DETAIL_PAGE_URL']?>" class="link-dark mt-0 saved-package-name">
                            <?=$item['NAME']?>
                        </a>
                        <p class="saved-package-desc m-0 mt-2 mb-2">
                            <?=strip_tags($item['~PREVIEW_TEXT'])?>
                        </p>
                        <div class="saved-package-buttons">
                            <a href="<?=$item['DETAIL_PAGE_URL']?>" class="btn btn-light btn-sm" type="button" name="button">Перейти
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="13" height="13" fill="currentColor"><path fill-rule="evenodd" d="M8.22 2.97a.75.75 0 011.06 0l4.25 4.25a.75.75 0 010 1.06l-4.25 4.25a.75.75 0 01-1.06-1.06l2.97-2.97H3.75a.75.75 0 010-1.5h7.44L8.22 4.03a.75.75 0 010-1.06z"></path></svg>
                            </a>
                            <a 
                                type="button" 
                                href="<?=CFile::GetPath($item['PROPERTIES']['FILE']['VALUE'])?>" 
                                type="button" 
                                class="btn btn-sm btn-primary download-package-button" 
                            >   
                                Загрузить
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="13" height="13" fill="currentColor"><path fill-rule="evenodd" d="M7.47 10.78a.75.75 0 001.06 0l3.75-3.75a.75.75 0 00-1.06-1.06L8.75 8.44V1.75a.75.75 0 00-1.5 0v6.69L4.78 5.97a.75.75 0 00-1.06 1.06l3.75 3.75zM3.75 13a.75.75 0 000 1.5h8.5a.75.75 0 000-1.5h-8.5z"></path></svg>
                            </a>
                            <a @click="removeSavedMod(<?=$item['ID']?>, $event.currentTarget)" class="btn btn-danger btn-sm" type="button" name="button">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16" fill="currentColor"><path fill-rule="evenodd" d="M6.5 1.75a.25.25 0 01.25-.25h2.5a.25.25 0 01.25.25V3h-3V1.75zm4.5 0V3h2.25a.75.75 0 010 1.5H2.75a.75.75 0 010-1.5H5V1.75C5 .784 5.784 0 6.75 0h2.5C10.216 0 11 .784 11 1.75zM4.496 6.675a.75.75 0 10-1.492.15l.66 6.6A1.75 1.75 0 005.405 15h5.19c.9 0 1.652-.681 1.741-1.576l.66-6.6a.75.75 0 00-1.492-.149l-.66 6.6a.25.25 0 01-.249.225h-5.19a.25.25 0 01-.249-.225l-.66-6.6z"></path></svg>
                            </a>
                        </div>
                    </div>
                </div>
            <?endforeach;?>
        </div>
    <?else:?>
        <div class="non-saved">
            <?=$arResult['ERROR']?><br><br>
            <a class="btn btn-primary" href="/the-sims4/">
                Перейти к списку модов
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                </svg>
            </a>
        </div>
    <?endif;?>
</div>
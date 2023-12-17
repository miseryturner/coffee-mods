<div class="row mb-3">
    <?foreach($arResult['ITEMS'] as $coolectionItem):?>
        <div class="mb-4 col-md-6 collection-card-item">
            <div class="card collection-card position-relative">
                <img src="<?=$coolectionItem['PREVIEW_PICTURE']['SRC']?>" alt="$modsItem['NAME']" class="card-img">
                <div class="card-black-overlay position-absolute w-100 h-100 p-0 m-0 top-0"></div>
                <div class="card-img-overlay">
                    <div class="nativer position-absolute bottom-0 py-3">
                        <a href="<?=$coolectionItem['DETAIL_PAGE_URL']?>"
                            class="link-light fw-bold fs-5 card-title-link collection-title-link"><?=$coolectionItem['NAME']?></a>
                        <div class="d-flex justify-content-between align-items-end mt-2">
                            <p class="text-light my-auto"
                                title="<?=$coolectionItem['PREVIEW_TEXT']?>">
                                <?=substr(strip_tags(strval($coolectionItem['PREVIEW_TEXT'])),0,64)."..."?>
                            </p>
                            <a  
                                type="button" 
                                @click="downloadCallbackList($event.currentTarget)" 
                                v-html="downloadButtonContent" 
                                href="<?=CFile::GetPath($coolectionItem['PROPERTIES']['FILE']['VALUE'])?>" 
                                download="<?=$coolectionItem['CODE']?>.<?=pathinfo(CFile::GetPath($coolectionItem['PROPERTIES']['FILE']['VALUE']), PATHINFO_EXTENSION)?>" 
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
</div>
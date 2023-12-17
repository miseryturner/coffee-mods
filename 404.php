<?
include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');

CHTTP::SetStatus("404 Not Found");
@define("ERROR_404","Y");

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->SetPageProperty("title", '404 - Страница не найдена');
?>

<div class="fzf-wrap d-flex justify-content-center align-items-center">
    <div class="col-md-12 text-center">
        <h1 class="display-1 d-block fw-bold">404</h1>
        <div class="mb-4 lead">Страница, которую Вы ищете, не найдена.</div>
        <a href="/" class="btn btn-primary">Вернуться на Главную</a>
    </div>
</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
<?
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
	die();
use Bitrix\Main\Page\Asset;

session_start();

$lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
?>
<!DOCTYPE html>
<html>
<head>
	<?$APPLICATION->ShowHead();?>
	<title><?$APPLICATION->ShowTitle();?></title>
	<?
		Asset::getInstance()->addString('<meta charset="UTF-8">');
		Asset::getInstance()->addString('<meta http-equiv="X-UA-Compatible" content="IE=edge">');
		Asset::getInstance()->addString('<meta name="viewport" content="width=device-width, initial-scale=1.0">');
		Asset::getInstance()->addString('<meta name="msapplication-TileColor" content="#ffffff">');
		Asset::getInstance()->addString('<meta name="theme-color" content="#ffffff">');
		Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/bootstrap.min.css");
		Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/fancybox.min.css");
		Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/google-translate.css");

		Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/vue.js');
	?>
		<link rel="icon" href="https://coffee-mods.ru/favicon.ico" type="image/x-icon">
		<link rel="icon" type="image/svg+xml" href="/favicon.svg">
		<link rel="icon" type="image/png" href="/favicon.png">
		<link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH . "/css/fancybox.min.css"?>">
	<?
		/* <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico" />
		<link rel="apple-touch-icon" sizes="180x180" href="./favicon/apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="32x32" href="./favicon/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="16x16" href="./favicon/favicon-16x16.png">
		<link rel="manifest" href="./favicon/site.webmanifest">
		<link rel="mask-icon" href="./favicon/safari-pinned-tab.svg" color="#ffffff"> */
	?>
	<meta property="og:title" content="Coffee mods. Лучшие моды на Симс 4."/>
	<meta property="og:description" content="Моды на Симс 4. Мы собрали для вас большое колличество модов для Симс 4, такие как Командный центр, More Columns in CAS, Wicked Whims"/>
	<meta property="og:image" content="/local/templates/main/images/sims.png">
	<?
		$canonical = explode('?', ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'])[0];
	?>
	<link rel="canonical" href="<?=$canonical?>"/>
	
	<!-- Yandex.RTB -->
	<script>window.yaContextCb=window.yaContextCb||[]</script>
	<script src="https://yandex.ru/ads/system/context.js" async></script>

	<!-- Yandex.Metrika counter -->
	<script type="text/javascript" >
		(function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
		var z = null;m[i].l=1*new Date();
		for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
		k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
		(window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

		ym(90056738, "init", {
			clickmap:true,
			trackLinks:true,
			accurateTrackBounce:true
		});
	</script>
	<noscript><div><img src="https://mc.yandex.ru/watch/90056738" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
	<!-- /Yandex.Metrika counter -->
</head>
<body>
<input type="hidden" id="lang" value="<?=$lang?>">
<?$thisSection = explode('?', $_SERVER['REQUEST_URI'])[0];?>
<div id="panel">
	<?$APPLICATION->ShowPanel();?>
</div>
<div class="layout" id="app">
	<div @click="closePopup()" class="background-popup">
		<div @click.stop class="auth-popup">
			<div class="title">Bridge не запущен или не установлен!</div>
			<div class="text">
				Для быстрой установки модов понадобиться запущенная программа Bridge на вашем ПК.<br> Если она ещё не установлена, прочтите информацию, нажав на кнопку "Подробнее" 
			</div>
			<div class="buttons">
				<a @click="closePopup()" class="btn btn-light">
					Ок
				</a>
				<a href="/articles/bridge/" class="btn btn-primary">
					Подробнее
				</a>
			</div>
		</div>
	</div>
	<div id="auth-popup" class="dont-show">
		<div class="container container-popup">
		</div>
	</div>
	<nav class="navbar navbar-expand-lg navbar-light bg-light p-3 site-header">
		<div class="container">
			<div class="logo-link">
				<a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none nav-icon">
					<span class="brand-logo"><span class="logo-underline">Co</span>ffee</span>
				</a>
			</div>

			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor03" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarColor03">
				<ul class="navbar-nav mx-auto">
					<li class="nav-item">
						<a class="nav-link <?=$thisSection=='/'?'active':''?>" href="/">Главная</a>
					</li>
					<li class="nav-item">
						<a class="nav-link <?=stripos($thisSection, 'the-sims4')?'active':''?>"  href="/the-sims4/">Моды</a>
					</li>
					<li class="nav-item">
						<a class="nav-link <?=stripos($thisSection, 'saved')?'active':''?>" href="/saved/">Избранное</a>
					</li>
					<li class="nav-item">
						<a class="nav-link nav-link-bridge <?=stripos($thisSection, 'articles/bridge')?'active':''?>" href="/articles/bridge/">Bridge</a>
					</li>
					<?/*if($USER->IsAdmin()):?>
						<li class="nav-item">
							<a class="nav-link fw-bold" style="color:red" href="/bitrix/">Хуинка</a>
						</li>
					<?endif;*/?>
				</ul>

				<div class="nav-msc-btns">
					<?/*
					<a href="/saved/" class="btn btn-saved btn-sm mx-2">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16" fill="currentColor"><path fill-rule="evenodd" d="M8 .25a.75.75 0 01.673.418l1.882 3.815 4.21.612a.75.75 0 01.416 1.279l-3.046 2.97.719 4.192a.75.75 0 01-1.088.791L8 12.347l-3.766 1.98a.75.75 0 01-1.088-.79l.72-4.194L.818 6.374a.75.75 0 01.416-1.28l4.21-.611L7.327.668A.75.75 0 018 .25z"></path></svg>
					</a>
					*/?>
					<div class="transalte-lang">
						<p data-google-lang="ru" class="lang-css language__img"></p>
						<p data-google-lang="en" class="lang-css language__img"></p>
					</div>
					<a class="btn btn-donation btn-sm border" href="https://boosty.to/coffeemods/purchase/1016892?ssource=DIRECT&share=subscription_link" style="font-size: 13px;">
						Помочь проекту
						<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width=18 height=18 x="0px" y="0px" viewBox="0 0 235.6 292.2" fill="currentColor" xml:space="preserve">
							<g id="b_1_">
								<path class="st0" d="M44.3,164.5L76.9,51.6H127l-10.1,35c-0.1,0.2-0.2,0.4-0.3,0.6L90,179.6h24.8c-10.4,25.9-18.5,46.2-24.3,60.9
									c-45.8-0.5-58.6-33.3-47.4-72.1 M90.7,240.6l60.4-86.9h-25.6l22.3-55.7c38.2,4,56.2,34.1,45.6,70.5
									c-11.3,39.1-57.1,72.1-101.7,72.1C91.3,240.6,91,240.6,90.7,240.6z"/>
							</g>
						</svg>
					</a>
					<?if(false):?>
						<?if($_SESSION['USER_NAME']):?>
							<a class="profile-btn"><?=$_SESSION['USER_NAME']?></a>
						<?else:?>
							<a @click="openAuth()" class="btn btn-donation btn-auth btn-sm border" style="font-size: 13px;">
								Войти
							</a>
						<?endif;?>
					<?endif;?>
				</div>
			</div>
		</div>
	</nav>

	<main>

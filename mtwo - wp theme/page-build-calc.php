<?
/*
* Template Name: build-calc
* Template Post Type: post, page, product
*/
?>
<!DOCTYPE html>
<html lang="ru">

<head>
	<? wp_head() ?>
	<link rel="stylesheet" type="text/css" href="<? echo esc_url( get_template_directory_uri() ); ?>/css/plugins/swiper-bundle.min.css">
	<script src="<? echo esc_url( get_template_directory_uri() ); ?>/js/plugins/jquery-3.6.0.min.js"></script>
</head>

<body>
	<? get_header(); ?>
	<header>
        <div class="top">
            <a href="/"><img src="/wp-content/themes/mtwo/img/logotype.png" alt="" class="logo"></a>
            <nav>
                <ul>
                    <li class="main">
                        <a href="/build-about/">
                            <b>M². Строй</b>
                        </a>
                    </li>
                    <li class="mini">
                        <a href="/build-about/">Об услуге</a>
                    </li>
                    <li class="mini active">
                        <a href="/build-calc/">Калькулятор</a>
                    </li>
                    <li class="mini">
                        <a href="/build-faq/">FAQ</a>
                    </li>
                    <li class="mini">
                        <a href="/build-blog/">Блог</a>
                    </li>
                    <li class="mini">
                        <a href="/build-promo/">Акции</a>
                    </li>
                    <li class="main">
                        <a href="/repair-about/">
                            <b>M². Ремонт</b>
                        </a>
                    </li>
                    <li class="main">
                        <a href="/delivery-about/">
                            <b>M². Поставка</b>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="bot">
            <p><? the_field('address', 'option'); ?><br></p>
            <p class="phone"><? the_field('numberone', 'option'); ?></p>
            <p class="phone"><? the_field('numbertwo', 'option'); ?></p>
            <p>e-mail: <? the_field('email', 'option'); ?><br><br></p>
            <a href="<? the_field('maplink', 'option'); ?>" target="_blank">
                <div class="map">
                    <img src="<? the_field('mapimg', 'option'); ?>" alt="">
                </div>
            </a>
            <p><a href="<? the_field('maplink', 'option'); ?>" target="_blank">Смотреть на карте</a></p>
        </div>
    </header>
    <main>
        <div class="content">
            <h1 class="calc">Калькулятор строительства</h1>
            <div class="swiper-container calc" id="buildCalc">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <h2>Шаг 1: Площадь основания, м²</h2>
                        <div class="form">
                            <input id="baseArea" class="number" name="value1" type="number" placeholder="0">
                        </div>
						<div class="hidden"></div>
                    </div>
                    <div class="swiper-slide">
                        <h2>Шаг 2: Участок</h2>
                        <div class="form" id="landStatus">
                            <input id="radio1" name="value2" type="radio"><label class="radio" for="radio1">Нет</label>
                            <input id="radio2" name="value2" type="radio"><label class="radio" for="radio2">Подыскивается</label>
                            <input id="radio3" name="value2" type="radio"><label class="radio" for="radio3">Уже приобритен</label>
                        </div>
						<div class="hidden"></div>
                    </div>
                    <div class="swiper-slide">
                        <h2>Шаг 3: Фундамент</h2>
                        <div class="form" id="foundation">
                            <input id="radio4" name="value3" type="radio" value="5500" coef="1.1"><label class="radio" for="radio4">Плита</label>
                            <input id="radio5" name="value3" type="radio" value="3700"><label class="radio" for="radio5">Свайно-ростверковый</label>
                            <input id="radio6" name="value3" type="radio" value="2900"><label class="radio" for="radio6">На металлических сваях</label>
                        </div>
						<div class="hidden"></div>
                    </div>
                    <div class="swiper-slide">
                        <h2>Шаг 4: Технолгия</h2>
                        <div class="form" id="technology">
                            <input id="radio7" value="20000" name="value4" type="radio"><label class="radio" for="radio7">Каркас</label>
                            <input id="radio8" value="25000" name="value4" type="radio"><label class="radio" for="radio8">Блок</label>
                            <input id="radio9" value="20000" name="value4" type="radio"><label class="radio" for="radio9">ЛСТК</label>
                            <input id="radio10" nocount="" name="value4" type="radio"><label class="radio" for="radio10">Фахверк</label>
                        </div>
						<div class="hidden"></div>
                    </div>
                    <div class="swiper-slide">
                        <h2>Шаг 5: Этажность</h2>
                        <div class="form" id="floor">
                            <input id="radio11" name="value5" type="radio" value="1"><label class="radio" for="radio11">1</label>
                            <input id="radio12" name="value5" type="radio" value="2"><label class="radio" for="radio12">2</label>
                            <input id="radio13" name="value5" type="radio" value="3"><label class="radio" for="radio13">3</label>
                            <input id="radio14" name="value5" type="radio" value="4"><label class="radio" for="radio14">Другое</label>
                        </div>
						<div class="hidden"></div>
                    </div>
                    <div class="swiper-slide">
                        <h2>Шаг 6: Количество комнат на этаж</h2>
                        <div class="form">
                            <input id="number2" class="number" name="value6" type="number" placeholder="0">
                        </div>
						<div class="hidden"></div>
                    </div>
                    <div class="swiper-slide">
                        <h2>Шаг 7: Количество санузлов на этаж</h2>
                        <div class="form">
                            <input id="bathrooms" class="number" name="value7" type="number" placeholder="0">
                        </div>
						<div class="hidden"></div>
                    </div>
                    <div class="swiper-slide">
                        <h2>Шаг 8: Гараж в доме</h2>
                        <div class="form">
                            <input id="radio15" name="value8" type="radio" value="1"><label class="radio" for="radio15">Да</label>
                            <input id="radio16" name="value8" type="radio" value="2"><label class="radio" for="radio16">Нет</label>
                        </div>
						<div class="hidden"></div>
                    </div>
                    <div class="swiper-slide">
                        <h2>Шаг 9: Финишная внутренняя отделка</h2>
                        <div class="form">
                            <input id="radio17" name="value9" type="radio" value="1"><label class="radio" for="radio17">Да</label>
                            <input id="radio18" name="value9" type="radio" value="2"><label class="radio" for="radio18">Нет</label>
                        </div>
						<div class="hidden"></div>
                    </div>
                    <div class="swiper-slide">
                        <h2>Шаг 10: Монтаж инженерных систем</h2>
                        <div class="form">
                            <div class="twocol" id="additionalServices">
                                <div class="l">
                                    <input type="checkbox" name="value10" id="checkbox1" value="1000"><label class="checkbox" for="checkbox1">ХВС</label>
                                    <input type="checkbox" name="value10" id="checkbox2" value="1000"><label class="checkbox" for="checkbox2">ГВС</label>
                                    <input type="checkbox" name="value10" id="checkbox3" value="500"><label class="checkbox" for="checkbox3">Канализация</label>
                                    <input type="checkbox" name="value10" id="checkbox4" value="500"><label class="checkbox" for="checkbox4">Отопление</label>
                                </div>
                                <div class="r">
                                    <input type="checkbox" name="value10" id="checkbox5" value="200"><label class="checkbox" for="checkbox5">Силовая электрика и освещение</label>
                                    <input type="checkbox" name="value10" id="checkbox6" value="800"><label class="checkbox" for="checkbox6">Интернет</label>
                                    <input type="checkbox" name="value10" id="checkbox7" value="800"><label class="checkbox" for="checkbox7">Телевидение</label>
                                    <input type="checkbox" name="value10" id="checkbox8" value="800"><label class="checkbox" for="checkbox8">Видеонаблюдение</label>
                                </div>
                            </div>
                        </div>
						<div class="hidden"></div>
                    </div>
                    <div class="swiper-slide">
                        <h2>Шаг 11: Когда приступать к строительству</h2>
                        <div class="form">
                            <input id="radio19" name="value11" type="radio" value="1"><label class="radio" for="radio19">Немедленно</label>
                            <input id="radio20" name="value11" type="radio" value="2"><label class="radio" for="radio20">К дате<input class="date" id="date1" name="value111" type="date"></label>
                            <input id="radio21" name="value11" type="radio" value="3"><label class="radio" for="radio21">Не определено</label>
                        </div>
						<div class="hidden"></div>
                    </div>
                    <div class="swiper-slide allowSlideNext">
                        <h2>Шаг 12: Акции</h2>
                        <div class="form promo">
                            <div class="twocol">
                                <div class="l promo-l">
									ДОБАВИТЬ АКЦИИ +
                                </div>
                                <div class="r promo-r active">
									УБРАТЬ АКЦИИ -
                                    <? if( have_rows('promo', 117) ): $i = 0; ?>
                                        <? while( have_rows('promo', 117) ): the_row(); $i++; ?>
                                            <div class="item">
                                                <h3 class="name"><? the_sub_field('namecalc'); ?></h3>
                                                <div class="more md-trigger" data-modal="modal-<? echo $i; ?>">ПОДРОБНЕЕ</div>
                                            </div>
                                        <? endwhile; ?>
                                    <? endif; ?>
                                </div>
                            </div>
                        </div>
						<div class="hidden"></div>
                    </div>
                    <div class="swiper-slide">
                        <h2>Шаг 13: Персональные данные</h2>
                        <div class="form">
                            <form class="twocol" id="calcform" method="post" onsubmit="javascript:return validate('calcform','email');">
                                <div class="l">
                                    <p class="msgs"></p>
                                    <p id="message"></p> 
                                    <input class="user formToggle" type="text" name="name" placeholder="Имя" required="">
                                    <input class="user formToggle" id="phone" type="tel" name="phone" placeholder="Телефон" required="">
                                    <input class="user formToggle" id="email" type="email" name="email" placeholder="E-mail" required="" pattern="[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?">
                                    <input class="hidden" type="text" name="type" value="Строительство">
                                    <input class="hidden" type="text" id="sendResult" name="result" value="Сумма">
                                    <input class="hidden" type="text" name="promo" value="">
                                    <button class="formToggle" type="submit" form="calcform">ДЛЯ РАСЧЕТА ЗАПОЛНИТЕ ДАННЫЕ</button>
                                </div>
                                <div class="r">
                                    <p class="formToggle" id="noCountResult">Итого: <span id="showResult">2 000 000</span> руб.<br>(Данная сумма не является окончательной и подлежит обсуждению)*</p>
                                </div>
                            </form>
                        </div>
						<div class="hidden"></div>
                    </div>
                </div>
                <div class="swiper-button-next">ДАЛЕЕ</div>
                <div class="swiper-button-prev"></div>
            </div>
            <!-- window modal -->
            <? if( have_rows('promo', 117) ): $i = 0; ?>
                <? while( have_rows('promo', 117) ): the_row(); $i++; ?>
                    <div class="md-modal md-effect" id="modal-<? echo $i; ?>">
                        <div class="md-content calc">
                            <div class="md-close"></div>
                            <h3><? the_sub_field('title'); ?></h3>
                            <div class="md-scroll">
                                <p>
                                    <? the_sub_field('description'); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                <? endwhile; ?>
            <? endif; ?>
            <!-- end window modal -->
        </div>
    </main>
	<? get_footer(); ?>
	<script src="<? echo esc_url( get_template_directory_uri() ); ?>/js/plugins/jquery.maskedinput.min.js"></script>
	<!-- <script src="<? echo esc_url( get_template_directory_uri() ); ?>/js/plugins/jquery.inputmask.min.js"></script> -->
	<script src="<? echo esc_url( get_template_directory_uri() ); ?>/js/plugins/swiper-bundle.min.js"></script>
	<script src="<? echo esc_url( get_template_directory_uri() ); ?>/js/plugins/window.min.js"></script>
	<script src="<? echo esc_url( get_template_directory_uri() ); ?>/js/plugins/form.js"></script>
	<script src="<? echo esc_url( get_template_directory_uri() ); ?>/js/calc.js"></script>
	<? wp_footer() ?>
</body>

</html>
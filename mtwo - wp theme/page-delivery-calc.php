<?
/*
* Template Name: delivery-calc
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
                    <li class="mini">
                        <a href="/delivery-about/">Об услуге</a>
                    </li>
                    <li class="mini active">
                        <a href="/delivery-calc/">Калькулятор</a>
                    </li>
                    <li class="mini">
                        <a href="/delivery-faq/">FAQ</a>
                    </li>
                    <li class="mini">
                        <a href="/delivery-blog/">Блог</a>
                    </li>
                    <li class="mini">
                        <a href="/delivery-promo/">Акции</a>
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
            <h1 class="calc">Калькулятор ремонта</h1>
            <div class="swiper-container calc" id="repairCalc">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <h2>Шаг 1: Площадь помещения, м²</h2>
                        <div class="form">
                            <input id="area" class="number" name="value1" type="number" placeholder="0">
                        </div>
						<div class="hidden"></div>
                    </div>
                    <div class="swiper-slide">
                        <h2>Шаг 2: Количество комнат</h2>
                        <div class="form">
                            <input id="rooms" class="number" name="value2" type="number" placeholder="0">
                        </div>
						<div class="hidden"></div>
                    </div>
                    <div class="swiper-slide">
                        <h2>Шаг 3: Количество санузлов</h2>
                        <div class="form">
                            <input id="bathrooms" class="number" name="value3" type="number" placeholder="0">
                        </div>
						<div class="hidden"></div>
                    </div>
                    <div class="swiper-slide">
                        <h2>Шаг 4: Тип строения</h2>
                        <div class="form" id="typeOfBuilding">
                            <input id="radio1" name="value4" type="radio" value="+0.2"><label class="radio" for="radio1">Вторичное жилье</label>
                            <input id="radio2" name="value4" type="radio"><label class="radio" for="radio2">Новостройка</label>
                            <input id="radio3" name="value4" type="radio" value="+0.5"><label class="radio" for="radio3">Старый фонд</label>
                            <input id="radio4" name="value4" type="radio" value="-0.1"><label class="radio" for="radio4">Арендуемое помещение</label>
                            <input id="radio5" name="value4" type="radio" value="-0.1"><label class="radio" for="radio5">Отдельностоящие здание</label>
                        </div>
						<div class="hidden"></div>
                    </div>
                    <div class="swiper-slide">
                        <h2>Шаг 5: Проект</h2>
                        <div class="form" id="projectPlan">
                            <input id="radio6" name="value5" type="radio" value="800"><label class="radio" for="radio6">Есть</label>
                            <input id="radio7" name="value5" type="radio" value="800"><label class="radio" for="radio7">Нужно сделать</label>
                            <input id="radio8" name="value5" type="radio" value="0" class="projectPlanNoNeedInput">
                            <label class="radio" for="radio8">Обойдемся без проекта</label>

                            <div class="alertMessage">
                                <p>Мы не работаем без проекта, и Вам не советуем. Уверены, что проект не нужен?</p> 
                                <span class="alertMessage__button" value="yes">да</span> 
                                <span class="alertMessage__button" value="no">нет</span>
                            </div>
                        </div>
						<div class="hidden"></div>
                    </div>
                    <div class="swiper-slide">
                        <h2>Шаг 6: Тип ремонта</h2>
                        <div class="form" id="typeOfRepair">
                            <input type="checkbox" name="value61" class="dismantling" id="toggle1"><label class="checkbox toggle" for="toggle1">ДЕМОНТАЖ</label>
                            <input id="radio71" name="value6" type="radio" value="5000"><label class="radio" for="radio71">Эконом</label>
                            <input id="radio81" name="value6" type="radio" value="3000"><label class="radio" for="radio81">Косметический</label>
                            <input id="radio9" name="value6" type="radio" value="10000"><label class="radio" for="radio9">Комплексный</label>
                            <input id="radio10" name="value6" type="radio" value="15000"><label class="radio" for="radio10">Дизайнерский</label>
                        </div>
						<div class="hidden"></div>
                    </div>
                    <div class="swiper-slide">
                        <h2>Шаг 7: Когда приступать к строительству</h2>
                        <div class="form">
                            <input id="radio19" name="value7" type="radio" value="1"><label class="radio" for="radio19">Немедленно</label>
                            <input id="radio20" name="value7" type="radio" value="2"><label class="radio" for="radio20">К дате<input class="date" id="date1" name="value71" type="date"></label>
                            <input id="radio21" name="value7" type="radio" value="3"><label class="radio" for="radio21">Не определено</label>
                        </div>
						<div class="hidden"></div>
                    </div>
                    <div class="swiper-slide allowSlideNext">
                        <h2>Шаг 8: Акции</h2>
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
                        <h2>Шаг 9: Персональные данные</h2>
                        <div class="form">
                            <form class="twocol" id="calcform">
                                <div class="l">
                                    <p class="msgs"></p>
                                    <input class="user formToggle" type="text" name="name" placeholder="Имя" required="">
                                    <input class="user formToggle" id="phone" type="tel" name="phone" placeholder="Телефон" required="">
                                    <input class="user formToggle" id="email" type="text" name="email" placeholder="E-mail" required="">
                                    <input class="hidden" type="text" name="type" value="Ремонт">
                                    <input class="hidden" type="text" name="result" value="Сумма" id="sendResult_repair">
                                    <button class="formToggle" type="submit" form="calcform">ДЛЯ РАСЧЕТА ЗАПОЛНИТЕ ДАННЫЕ</button>
                                </div>
                                <div class="r">
                                    <p class="formToggle" id="showResult_repair">Итого: <span id="result">2 000 000</span> руб.<br>(Данная сумма не является окончательной и подлежит обсуждению)*</p>
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
	<script src="<? echo esc_url( get_template_directory_uri() ); ?>/js/plugins/jquery.inputmask.min.js"></script>
	<script src="<? echo esc_url( get_template_directory_uri() ); ?>/js/plugins/swiper-bundle.min.js"></script>
	<script src="<? echo esc_url( get_template_directory_uri() ); ?>/js/plugins/window.min.js"></script>
	<script src="<? echo esc_url( get_template_directory_uri() ); ?>/js/plugins/form.js"></script>
	<script src="<? echo esc_url( get_template_directory_uri() ); ?>/js/calc.js"></script>
	<? wp_footer() ?>
</body>

</html>
<?
/*
* Template Name: delivery-about
* Template Post Type: post, page, product
*/
?>
<!DOCTYPE html>
<html lang="ru">

<head>
	<? wp_head() ?>
	<link rel="stylesheet" type="text/css" href="<? echo esc_url( get_template_directory_uri() ); ?>/css/plugins/swiper-bundle.min.css">
	<link rel="stylesheet" type="text/css" href="<? echo esc_url( get_template_directory_uri() ); ?>/css/about.css">
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
                    <li class="mini active">
                        <a href="/delivery-about/">Об услуге</a>
                    </li>
                    <li class="mini">
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
            <h1>О НАС</h1>
            <p>
             <? the_field('textbefore'); ?>
            </p>
            <? if( have_rows('slider') ): $i = 0; ?>
                <div class="slider">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            <? while( have_rows('slider') ): the_row(); $i++; ?>
                                <div class="swiper-slide">
                                    <img src="<? the_sub_field('img'); ?>" alt="">
                                    <p><? the_sub_field('text'); ?></p>
                                </div>
                            <? endwhile; ?>
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            <? endif; ?>
            <p>
                <? the_field('textafter'); ?>
            </p>
            <a href="/delivery-calc/" class="go-to-calc">ПЕРЕЙТИ К РАССЧЕТУ</a>
        </div>
    </main>
	<? get_footer(); ?>
	<script src="<? echo esc_url( get_template_directory_uri() ); ?>/js/plugins/swiper-bundle.min.js"></script>
	<script src="<? echo esc_url( get_template_directory_uri() ); ?>/js/slider.js"></script>
	<? wp_footer() ?>
</body>

</html>
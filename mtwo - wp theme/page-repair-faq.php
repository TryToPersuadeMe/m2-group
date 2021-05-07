<?
/*
* Template Name: repair-faq
* Template Post Type: post, page, product
*/
?>
<!DOCTYPE html>
<html lang="ru">

<head>
	<? wp_head() ?>
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
                    <li class="mini">
                        <a href="/repair-about/">Об услуге</a>
                    </li>
                    <li class="mini">
                        <a href="/repair-calc/">Калькулятор</a>
                    </li>
                    <li class="mini active">
                        <a href="/repair-faq/">FAQ</a>
                    </li>
                    <li class="mini">
                        <a href="/repair-blog/">Блог</a>
                    </li>
                    <li class="mini">
                        <a href="/repair-promo/">Акции</a>
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
            <h1>FAQ</h1>
                <div class="after__h">
                    <? if( have_rows('faq') ): $i = 0; ?>
                        <section class="bpfaq">
                        <? while( have_rows('faq') ): the_row(); $i++; ?>
                            <div class="faq">
                                <p class="md-trigger" data-modal="modal-<? echo $i; ?>">
                                    <? echo $i; ?> <? the_sub_field('name'); ?>
                                </p>
                            </div>
                        <? endwhile; ?>
                        </section>
                    <? endif; ?>
                    <!-- window modal -->
                    <? if( have_rows('faq') ): $i = 0; ?>
                        <? while( have_rows('faq') ): the_row(); $i++; ?>
                            <div class="md-modal md-effect" id="modal-<? echo $i; ?>">
                                <div class="md-content">
                                    <div class="md-close"></div>
                                    <h3>Ответ</h3>
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
        </div>
    </main>
	<? get_footer(); ?>
	<script src="<? echo esc_url( get_template_directory_uri() ); ?>/js/plugins/window.min.js"></script>
	<? wp_footer() ?>
</body>

</html>
<?
/*
* Template Name: delivery-blog
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
                    <li class="main">
                        <a href="/delivery-about/">
                            <b>M². Поставка</b>
                        </a>
                    </li>
                    <li class="mini">
                        <a href="/delivery-about/">Об услуге</a>
                    </li>
                    <li class="mini">
                        <a href="/delivery-calc/">Калькулятор</a>
                    </li>
                    <li class="mini">
                        <a href="/delivery-faq/">FAQ</a>
                    </li>
                    <li class="mini active">
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
            <h1>ПОЛЕЗНАЯ ИНФОРМАЦИЯ</h1>
            <div>
                <div class="after__h">
                    <? if( have_rows('blog') ): $i = 0; ?>
                        <section class="bpfaq">
                        <? while( have_rows('blog') ): the_row(); $i++; ?>
                            <div class="item">
                                <h2 class="blog"><? the_sub_field('name'); ?></h2>
                                <div class="more md-trigger" data-modal="modal-<? echo $i; ?>">ЧИТАТЬ</div>
                            </div>
                        <? endwhile; ?>
                        <? while( have_rows('file') ): the_row(); $i++; ?>
                            <div class="item">
                                <img src="<? the_sub_field('img'); ?>" alt="">
                                <a href="<? the_sub_field('link'); ?>" target="_blank" class="more" rel="noopener">ЧИТАТЬ</a>
                            </div>
                        <? endwhile; ?>
                        <? while( have_rows('video') ): the_row(); $i++; ?>
                            <div class="item video">
                                <? the_sub_field('link'); ?>
                                <div class="more">СМОТРЕТЬ</div>
                            </div>
                        <? endwhile; ?>
                        </section>
                    <? endif; ?>
                    <!-- window modal -->
                    <? if( have_rows('blog') ): $i = 0; ?>
                        <? while( have_rows('blog') ): the_row(); $i++; ?>
                            <div class="md-modal md-effect" id="modal-<? echo $i; ?>">
                                <div class="md-content">
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
            </div>
        </div>
    </main>
	<? get_footer(); ?>
	<script src="<? echo esc_url( get_template_directory_uri() ); ?>/js/plugins/window.min.js"></script>
	<? wp_footer() ?>
</body>

</html>
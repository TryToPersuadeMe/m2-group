<?
/*
* Template Name: main
* Template Post Type: post, page, product
*/
?>
<!DOCTYPE html>
<html lang="ru">

<head>
	<? wp_head() ?>
	<link rel="stylesheet" type="text/css" href="<? echo esc_url( get_template_directory_uri() ); ?>/css/main.css">
</head>

<body>
	<div class="wrapper">
		<a href="/build-about/" class="l">
			<div class="info">M². Строй</div>
		</a>
		<a href="/repair-about/" class="c">
			<div class="info">M². Ремонт</div>
		</a>
		<a href="/delivery-about/" class="r">
			<div class="info">M². Поставка</div>
		</a>
	</div>
	<? get_footer(); ?>
	<? wp_footer() ?>
</body>

</html>
<?

add_theme_support( 'title-tag' );
add_theme_support( 'post-thumbnails');

if( 'Исполняемый PHP код в контенте' ){
	add_filter( 'the_content', 'content_exec_php', 0 );
	function content_exec_php( $content ){
		return preg_replace_callback( '/\[exec( off)?\](.+?)\[\/exec\]/s', '_content_exec_php', $content );
	}
	function _content_exec_php( $matches ){
		if( ' off' === $matches[1] ){
			return "\n\n<".'pre>'. htmlspecialchars( $matches[2] ) .'</pre'.">\n\n";
		}
		else {
			eval( "ob_start(); {$matches[2]}; \$exec_php_out = ob_get_clean();" );
			return $exec_php_out;
		}
	}
}

function wp_insert_header() {
    ?>
	
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="shortcut icon" href="<? echo esc_url( get_template_directory_uri() ); ?>/img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="<? echo esc_url( get_template_directory_uri() ); ?>/css/global.css">
	
    <?
}
add_action( 'wp_head', 'wp_insert_header' );


?>
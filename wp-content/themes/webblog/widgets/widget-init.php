<?php
// register Foo_Widget widget
if( !function_exists( 'register_webblog_widget' ) ):
	
	function register_webblog_widget(){
		
		register_widget( 'Webblog_Recent_Post_Widget' );
	}

endif;

add_action( 'widgets_init', 'register_webblog_widget' );
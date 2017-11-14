<?php
/* ===========================================================
	DEFAULT CONFIG SETTINGS
=========================================================== */

add_action( 'banner_place_to_do_stuff', 'first_banner_thingy', 2 );
add_action( 'banner_place_to_do_stuff', 'second_banner_thingy', 1 );
add_action( 'banner_place_to_do_stuff', 'third_banner_thingy', 3 );

function first_banner_thingy() {
	echo 'First';
}

function second_banner_thingy() {
	echo 'Second';
}

function third_banner_thingy() {
	echo 'Third';
}


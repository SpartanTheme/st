<?php
/************* ACTIVE SIDEBARS ********************/

// Sidebars & Widgetizes Areas
function spartan_register_sidebars() {
	register_sidebar(array(
		'id' => 'sidebar1',
		'name' => __('Sidebar 1', 'spartantheme'),
		'description' => __('The first (primary) sidebar.', 'spartantheme'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	register_sidebar(array(
		'id' => 'sidebar2',
		'name' => __('Sidebar 2', 'spartantheme'),
		'description' => __('The first (primary) sidebar.', 'spartantheme'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

} // don't remove this bracket!
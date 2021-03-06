<?php
// remove stuff from header for HTML5 conformance
add_action('init', 'conformanceRemoval');

function conformanceRemoval() {
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wlwmanifest_link');
	remove_action('wp_head', 'wp_generator');

	remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
	remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
	remove_action('wp_head', 'index_rel_link'); // index link
	remove_action('wp_head', 'parent_post_rel_link', 10, 0); // prev link
	remove_action('wp_head', 'start_post_rel_link', 10, 0); // start link
	remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.
}

function seo_love() {
	$google_it = '<a href="http://www.google.com/#&q='.get_the_title().'" title="Search this post on Google" rel="external">Google it!</a>';
	$yahoo_it = '<a href="http://www.yahoo.com/search?p='.get_the_title().'" title="Search this post on Yahoo" rel="external">Yahoo it!</a>';
	$bing_it = '<a href="http://www.bing.com/search?q='.get_the_title().'" title="Search this post on Bing" rel="external">Bing it!</a>';
	$ask_it = '<a href="http://www.ask.com/web?q='.get_the_title().'" title="Search this post on Ask" rel="external">Ask it!</a>';
	return '<p>' . $google_it . ' | ' . $yahoo_it . ' | ' . $bing_it . ' | ' . $ask_it . '</p>';
}
add_shortcode('seo_love', 'seo_love');

?>

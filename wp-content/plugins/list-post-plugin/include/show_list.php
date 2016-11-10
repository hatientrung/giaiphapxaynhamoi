<?php $args = array(
	'posts_per_page'   => 5,
	'offset'           => 0,
	// 'category'         => '',
	'category_name'    => 'About',
	'orderby'          => 'date',
	'order'            => 'DESC',
	// 'include'          => '',
	// 'exclude'          => '',
	// 'meta_key'         => '',
	// 'meta_value'       => '',
	'post_type'        => 'post',
	// 'post_mime_type'   => '',
	// 'post_parent'      => '',
	// 'author'	   => '',
	// 'author_name'	   => '',
	'post_status'      => 'publish',
	'suppress_filters' => true 
);
$posts_array = get_posts($args); 
?>
<div class='list-services-out'>
<div class='list-services1'>
<?php
foreach ($posts_array as $post) {
	echo '<div class="item-services"><a href="' .post_permalink($post->ID) . '"><div class="img-services" style="background-image: url(' . $post->guid .');">';
	echo '<div class="title-services"><h3 class="valignmiddle uppercase title-bold">' . $post->post_title  . '<br />' . '<span class="solutions">' . '' . '</span>' . '</h3></div>';           
	echo '</div></a></div>';
}
?>
</div>
</div>
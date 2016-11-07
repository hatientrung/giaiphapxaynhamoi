<?php

$taxonomy     = 'product_cat';
$orderby      = 'name';  
  $show_count   = 0;      // 1 for yes, 0 for no
  $pad_counts   = 0;      // 1 for yes, 0 for no
  $hierarchical = 1;      // 1 for yes, 0 for no  
  $title        = '';  
  $empty        = 0;

  $args = array(
  	'taxonomy'     => $taxonomy,
  	'orderby'      => $orderby,
  	'show_count'   => $show_count,
  	'pad_counts'   => $pad_counts,
  	'hierarchical' => $hierarchical,
  	'title_li'     => $title,
  	'hide_empty'   => $empty,
  	'parent' => 0,
  	'hide_empty' => 0
  	);

// $args = array(
//     'orderby' => 'id',
//     'hide_empty' => 0,
//     'parent' => 0
// );
$categories = get_categories($args);
?>
<div class='list-services'>
<div class="div_services_title">
	<h1><b><?php echo get_option('company_name'); ?><b></h1>
</div>
<?php
foreach ($categories as $cat) {
    echo '<div class="item-services"><a href="' . get_category_link($cat->term_id) . '"><div class="img-services" style="background-image: url(' . z_taxonomy_image_url($cat->term_id) .');">';
    echo '<div class="title-services"><h3 class="valignmiddle uppercase title-bold">' . $cat->name  . '<br />' . '<span class="solutions">' . '' . '</span>' . '</h3></div>';           
    echo '</div></a></div>';
}
?>
</div>

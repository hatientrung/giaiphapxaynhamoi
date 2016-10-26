<?php
$args = array(
    'orderby' => 'id',
    'hide_empty' => 0,
    'parent' => 0
);
$categories = get_categories($args);
foreach ($categories as $cat) {
    echo '<div class="img-services" style="background-image: url(' . z_taxonomy_image_url($cat->term_id) .');">';
    echo '<div class="title-services"><h1 class="valignmiddle uppercase title-bold">' . $cat->name . '<img src="' . $cat->term_icon . '" alt=""  class="alignleft"/>' . '<br />' . '<span class="solutions">' . '' . '</span>' . '</h1></div>';           
    echo '</div>';
}
?>
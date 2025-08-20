<?php
/**
 * 
 * 	?		Breadcrumbs NavXT Wrapper - extension, consistency
 * 
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */
// 



// Create id attribute allowing for custom "anchor" value.
$id = 'breadcrumbs--' . $block['id'];

if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}


// Create class attribute allowing for custom "className" and "align" values.
$className = 'nu__breadcrumbs';
if( !empty($block['className']) ) {
	$className .= ' ' . $block['className'];
}

if( !empty($block['align']) ) {
	$className .= ' align' . $block['align'];
}


$background_color = get_field('background_color');
$text_color = get_field('text_color');


$guides['acf-block-container'] = '
<div id="%1$s" class="%2$s%3$s%5$s">
	<div>%4$s</div>
</div>';


if( is_admin() || $is_preview == true ){
	$breadcrumbs = 'Breadcrumbs are currently disabled in the editor, sorry!';
}
else {
	$breadcrumbs = '<div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">'.bcn_display(true).'</div>';
}


?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
	<div>
		<?= $breadcrumbs; ?>
	</div>
</div>
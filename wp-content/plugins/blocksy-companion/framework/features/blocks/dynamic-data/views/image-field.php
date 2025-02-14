<?php

$aspectRatio = blocksy_akg('aspectRatio', $attributes, 'auto');
$imageFit = blocksy_akg('imageFit', $attributes, 'cover');
$height = blocksy_akg('height', $attributes, '');

$lightbox = blocksy_akg('lightbox', $attributes, '');
$video_thumbnail = blocksy_akg('videoThumbnail', $attributes, '');

$image_hover_effect = blocksy_akg('image_hover_effect', $attributes, '');

$has_field_link = blocksy_akg('has_field_link', $attributes, 'no');

$img_attr = [
	'style' => ''
];

// Aspect aspectRatio with a height set needs to override the default width/height.
if (! empty($aspectRatio)) {
	$img_attr['style'] .= 'width:100%;height:100%;';
} elseif (! empty($height) ) {
	$img_attr['style'] .= "height:{$attributes['height']};";
}

$img_attr['style'] .= "object-fit: {$imageFit};";

if (! empty(blocksy_akg('alt_text', $attributes, ''))) {
	$img_attr['alt'] = blocksy_akg('alt_text', $attributes, '');
}

$border_result = get_block_core_post_featured_image_border_attributes(
	$attributes
);

if (! empty($border_result['class'])) {
	$img_attr['class'] = $border_result['class'];
}

if (! empty($border_result['style'])) {
	$img_attr['style'] .= $border_result['style'];
}

$maybe_video = null;

if ($video_thumbnail === 'yes') {
	$maybe_video = blocksy_has_video_element([
		'display_video' => true,
		'attachment_id' => get_post_thumbnail_id(),
	]);
}

$link_attr = [];

if ($field === 'wp:featured_image') {
	$value = wp_get_attachment_image(
		get_post_thumbnail_id(),
		blocksy_akg('sizeSlug', $attributes, 'full'),
		false,
		$img_attr
	);

	if (
		$has_field_link === 'yes'
		&&
		(
			! $maybe_video
			||
			$video_thumbnail !== 'yes'
		)
	) {
		$link_attr = [
			'href' => get_permalink()
		];

		$has_field_link_new_tab = blocksy_akg('has_field_link_new_tab', $attributes, 'no');
		$has_field_link_rel = blocksy_akg('has_field_link_rel', $attributes, '');

		if ($has_field_link_new_tab !== 'no') {
			$link_attr['target'] = '_blank';
		}

		if (! empty($has_field_link_rel)) {
			$link_attr['rel'] = $has_field_link_rel;
		}
	}
}

if (empty($value)) {
	return;
}

if ($field !== 'wp:featured_image') {
	$value = wp_get_attachment_image(
		$value['id'],
		blocksy_akg('sizeSlug', $attributes, 'full'),
		false,
		$img_attr
	);

}

$classes = [];
$styles = [];

if (! empty($attributes['width'])) {
	$styles[] = 'width: ' . $attributes['width'] . ';';
}

if (! empty($attributes['height'])) {
	$styles[] = 'height: ' . $attributes['height'] . ';';
}

if (
	! empty($attributes['aspectRatio'])
	&&
	$aspectRatio !== 'auto'
) {
	$styles[] = 'aspect-ratio: ' . $aspectRatio . ';';
}

if (! empty($attributes['imageAlign'])) {
	$classes[] = 'align' . $attributes['imageAlign'];
}

if (! empty($attributes['className'])) {
	$classes[] = $attributes['className'];
}

$wrapper_attr = [
	'class' => 'ct-dynamic-media'
];

$wrapper_attr['style'] = implode(' ', $styles);

if ($image_hover_effect !== 'none') {
	$wrapper_attr['data-hover'] = $image_hover_effect;
}

if (
	$video_thumbnail === 'yes'
	&&
	$maybe_video
) {
	
	$wrapper_attr['data-media-id'] = get_post_thumbnail_id();

	$value .= $maybe_video['icon'];

	if (blocksy_akg('media_video_player', $maybe_video, 'no') === 'yes') {
		$classes[] = 'ct-simplified-player';
	}

	if (blocksy_akg('media_video_autoplay', $maybe_video, 'no') === 'yes') {
		$wrapper_attr['data-state'] = 'autoplay';
	}
}

$wrapper_attr['class'] .= ' ' . implode(' ', $classes);

$tag_name = 'figure';

if (! empty($link_attr)) {
	$tag_name = 'a';
	$wrapper_attr = array_merge($wrapper_attr, $link_attr);
}

$wrapper_attr = get_block_wrapper_attributes($wrapper_attr);

if (
	$lightbox === 'yes'
	&&
	function_exists('block_core_image_render_lightbox')
	&&
	$has_field_link !== 'yes'
	&&
	$video_thumbnail !== 'yes'
	&&
	!$maybe_video
) {
	echo block_core_image_render_lightbox(blocksy_html_tag($tag_name, $wrapper_attr, $value), []);

	return;
}

echo blocksy_html_tag($tag_name, $wrapper_attr, $value);
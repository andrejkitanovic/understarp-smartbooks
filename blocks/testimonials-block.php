<?php

// ? BLOCK

$block = 'testimonials';
$blockClass = $block;

//  * |-- Block styling

$blockStyle = '';

//  * |---|--> Block background

$bgType  = get_field('background_type');
$bgColor = get_field('background_color');
$bgImage = get_field('background_image');
$bgStyle = '';

if ($bgType) {
	if ($bgType == 'colored') {
		$bgStyle = 'background-color: ' . $bgColor  . ';';
	}
	if ($bgType == 'image') {
		$bgStyle = 'background-image: url(' . $bgImage['url'] . ');';
	}
}

//  * |---|--> Block text alignment

$textStyle = '';
$textAlignment = get_field('text_alignment');

// * |--\--> Block text color

$textColor = get_field('text_color');

//  * |---|--> Block padding

$padding = get_field('padding');

if ($padding) {
	$blockClass .= ' padding-' . $padding;
}

if ($bgStyle) {
	$blockStyle .= $bgStyle;
}

if ($textAlignment) {
	$textStyle .= 'text-align:' . $textAlignment . ';';
}

if ($textColor) {
	$textStyle .= 'color:' . $textColor . ';';
}

if ($textStyle) {
	$blockStyle .= $textStyle;
}

// ? HEADING

$heading = get_field('heading');
$headingClass = $block . '__heading heading';
$headingSize = $heading['size'];
$headingColor = $heading['color'];
$headingText = $heading['text'];

$headingStyle = 'color:' . $headingColor . ';';

// ? DESCRIPTION

$description = get_field('description');
$descriptionClass = $block . '__description description';

// ? SLIDES

$slides = filterDisplayed(get_field('slides'));
$sliderOptions = get_field('slider_options');
$loop = $sliderOptions['loop'];
$autoplay = $sliderOptions['autoplay'];
$interval = $sliderOptions['interval'];
$thumbnailHeight = $sliderOptions['thumbnail_height'];
$thumbnailWidth = $sliderOptions['thumbnail_width'];

$thumbnailStyle = 'height: ' . $thumbnailHeight . 'px; width: ' . $thumbnailWidth . 'px;';

?>

<?php initializeSection($blockClass, $blockStyle) ?>
<div class="container">
	<!-- Heading -->
	<?php createTextElement($headingClass, $headingSize, $headingStyle, $headingText); ?>
	<!-- Description -->
	<?php createTextElement($descriptionClass, 'div', '', $description); ?>

	<!-- Slider -->


	<div class="<?php echo generateClass($block, '__slider-holder'); ?>">
		<?php if ($loop || count($slides) > 2) { ?>
			<div class="<?php echo generateClass($block, '__arrow-right'); ?>">
				<img src="<?php the_field('arrow_right') ?>" alt="">
			</div>
		<?php } ?>
		<div class="<?php echo generateClass($block, '__slider'); ?> swiper-container" data-loop="<?php echo $loop; ?>" data-autoplay="<?php echo $autoplay; ?>" data-interval="<?php echo $interval; ?>">

			<div class="swiper-wrapper">



				<?php foreach ($slides as $slide) { ?>
					<div class="<?php echo generateClass($block, '__slide'); ?> swiper-slide">
						<!-- Slide content -->

						<div class="d-flex">
							<div>
								<!-- Icon -->
								<?php if ($slide['image']) { ?>
									<div style="<?php echo $thumbnailStyle ?>background-image: url('<?php echo $slide['image']['url'] ?>')" class="<?php echo generateClass($block, '__slide-icon') ?>"></div>
								<?php } ?>
							</div>
							<div>
								<!-- Name -->
								<?php createTextElement(generateClass($block, '__slide-name'), 'p', '', $slide['name']); ?>
								<!-- Position -->
								<?php
								$divider = '';
								if ($slide['role'] && $slide['company']) {
									$divider = ' | ';
								}
								?>
								<?php createTextElement(generateClass($block, '__slide-position'), 'p', '', $slide['role'] . $divider . $slide['company']); ?>
							</div>
						</div>
						<!-- Review -->
						<?php createTextElement(generateClass($block, '__slide-review'), 'p', '', '"' . $slide['review'] . '"'); ?>

					</div>
				<?php } ?>

			</div>
		</div>
	</div>

</div>
</section>
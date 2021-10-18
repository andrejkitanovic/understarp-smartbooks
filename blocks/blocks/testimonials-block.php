<?php

// ? BLOCK

$block = 'testimonials';
$blockClass = $block;

//  * |-- Block styling

$blockStyle = '';

//  * |---|--> Block background

$bgType  = get_field('background_type');
$bgColor = get_field('background_color');
$bgImage = get_field('baclground_image');
$bgStyle = '';

if ($bgType) {
    if ($bgType == 'colored') {
        $bgStyle = 'background-color: ' . $bgColor  . ';';
    }
    if ($bgType == 'image') {
        $bgStyle = 'background-image: url(' . $bgImage . ');';
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

// ? SLIDES

$slides = filterDisplayed(get_field('slides'));

?>

<?php initializeSection($blockClass, $blockStyle) ?>
<div class="container">
    <!-- Heading -->
    <?php createTextElement($headingClass, $headingSize, $headingStyle, $headingText); ?>

    <!-- Slider -->
    <div class="<?php echo generateClass($block, '__slider'); ?> swiper-container" data-loop="true" data-autoplay="true" data-interval="3000">
        <div class="swiper-wrapper">

            <?php foreach ($slides as $slide) { ?>
                <div class="<?php echo generateClass($block, '__slide'); ?> swiper-slide">
                    <!-- Slide content -->

                    <div class="d-flex">
                        <div>
                            <!-- Icon -->
                            <?php createImageElement(generateClass($block, '__slide-icon'), $slide['image']['url'], $slide['image']['alt'], '') ?>
                        </div>
                        <div>
                            <!-- Name -->
                            <?php createTextElement(generateClass($block, '__slide-name'), 'p', '', $slide['name']); ?>
                            <!-- Position -->
                            <?php createTextElement(generateClass($block, '__slide-position'), 'p', '', $slide['role'] . ' | ' . $slide['company']); ?>
                        </div>
                    </div>
                    <!-- Review -->
                    <?php createTextElement(generateClass($block, '__slide-review'), 'p', '', '"' . $slide['review'] . '"'); ?>

                </div>
            <?php } ?>

        </div>
    </div>

</div>
</section>
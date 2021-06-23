<?php

// ? BLOCK

$block = 'hero';
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

if ($bgStyle) {
    $blockStyle .= $bgStyle;
}

// ? HEADING

$heading = get_field('heading');

if ($heading && $heading['marked_word']) {
    $heading = str_replace($heading['marked_word'], '<span style="color:' . $heading['marked_color'] . '">' . $heading['marked_word'] . '</span>', $heading);
}

$headingStyle = '';

$headingStyle = 'color: ' . $heading['color']  . ';';

// ? DESCRIPTION

$description = get_field('description');

// ? SLIDES

$slides = filterDisplayed(get_field('slides'));
$slidesInterval = get_field('slides_interval');

// ? BUTTON

$button = get_field('button');
$buttonStyle = '';
$buttonTitle = '';
$buttonLink = '';

if ($button && $button['link']) {
    $buttonStyle = 'background-color: ' . $button['color']  . ';';
    $buttonTitle = $button['link']['title'];
    $buttonLink = $button['link']['url'];
}


?>

<?php initializeSection($blockClass, $blockStyle) ?>

<div class="container">
    <div class="row">
        <div class="col-12 col-xl-6">
            <div class="<?php echo generateClass($block, '__content'); ?>">
                <!-- Heading -->
                <?php createTextElement(generateClass($block, '__heading heading'), 'h1', $headingStyle, $heading['text']); ?>
                <!-- Description -->
                <?php createTextElement(generateClass($block, '__description description'), 'p', '', $description); ?>
                <!-- Button -->
                <?php createLinkElement(generateClass($block, '__button button'), $buttonStyle, $buttonTitle, $buttonLink); ?>
            </div>
        </div>
    </div>
</div>

<!-- Images -->
<div class="<?php echo generateClass($block, '__images'); ?>" data-interval="<?php echo $slidesInterval; ?>">
    <?php foreach ($slides as $key => $slide) { ?>
        <!-- Image -->
        <?php
        $slideStyle = '';

        if ($key != 0) {
            $slideStyle = 'display:none;';
        }

        createDivImageElement(generateClass($block, '__image'), $slide['image']['url'], $slideStyle, 'data-word= ' . $slide['header_word']);
        ?>
    <?php } ?>
</div>

</section>
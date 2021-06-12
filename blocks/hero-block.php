<?php

// ? BLOCK

$block = 'multi-column';
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

// ? SLIDES

$slides = get_field('slides');
$slidesInterval = get_field('slides_interval');

// ? BUTTON

$button = get_field('button');
?>

<?php initializeSection($blockClass, $blockStyle) ?>
    <div class="col-6">

    </div>
    <div class="col-6">

    </div>
</section>
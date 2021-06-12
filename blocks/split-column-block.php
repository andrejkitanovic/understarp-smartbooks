<?php

// ? BLOCK

$block = 'split-column';

//  * |--> Block styling

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

if($textAlignment){
    $textStyle = 'text-align:' . $textAlignment . ';';
}


if($bgStyle){
    $blockStyle .= $bgStyle;
}
if($textStyle){
    $blockStyle .= $textStyle;
}

// ? PROPORTION


$proportion = get_field('proportion');

/*

    30% / 70% -> col-4 / col-8 => 4/8
    60% / 40% -> col-7 / col-5 => 7/5
    50% / 50% -> col-6 / col-6 => 6/6

    * |--> calculation is Round number of (n / 10 * 1.2) where n is from 1% to 100%
*/

$firstCol = '6';
$secondCol = '6';

if($proportion){
    $proportion = $explode('/',$proportion);
    $firstCol = $proportion[0];
    $secondCol = $proportion[1];
}


// ? ORDER

$order = get_field('order');

// ? HEADING

$heading = get_field('heading');
$headingClass = $block . '__heading';
$headingSize = get_field('heading_size');
$headingColor = get_field('heading_color');

$headingStyle = 'color:' . $headingColor . ';';

// ? TEXT

$text = get_field('text');

// ? IMAGE

$image = get_field('image');
$imageAlignment = get_field('image_alignment');
?>


<?php initializeSection($block, $blockStyle) ?>
    <?php createHeaderElement($headingClass, $headingSize, $headingStyle, $heading); ?>

</section>
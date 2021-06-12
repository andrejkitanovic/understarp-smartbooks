<?php

// ? BLOCK

$block = 'split-column';
$blockClass = $block;

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

if ($textAlignment) {
    $textStyle = 'text-align:' . $textAlignment . ';';
}

//  * |---|--> Block padding

$padding = get_field('padding');

if ($padding) {
    $blockClass .= ' padding-' . $padding;
}

if ($bgStyle) {
    $blockStyle .= $bgStyle;
}
if ($textStyle) {
    $blockStyle .= $textStyle;
}

// ? PROPORTION

$proportion = get_field('proportion');

/*

    30% / 70% -> col-4 / col-8 => 4/8
    40% / 60% -> col-5 / col-7 => 5/7
    50% / 50% -> col-6 / col-6 => 6/6

    * |--> calculation is Round number of (n / 10 * 1.2) where n is from 1% to 100%
*/

$firstCol = '6';
$secondCol = '6';

// ! TO BE FIXED
if ($proportion) {
    $proportion = explode('/', $proportion);
    $firstCol = $proportion[0];
    $secondCol = $proportion[1];
}


// ? ORDER

$order = get_field('order');

// ? HEADING

$heading = get_field('heading');
if ($heading) {
    $headingClass = $block . '__heading';
    $headingSize = $heading['size'];
    $headingColor = $heading['color'];
    $headingText = $heading['text'];
}


$headingStyle = 'color:' . $headingColor . ';';

// ? TEXT

$text = get_field('text');

// ? IMAGE

$image = get_field('image');
$imageAlignment = get_field('image_alignment');
?>


<?php initializeSection($blockClass, $blockStyle) ?>
<?php createHeaderElement($headingClass, $headingSize, $headingStyle, $headingText); ?>

</section>
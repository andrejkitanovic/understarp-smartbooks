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

// * |--\--> Block text color

$textColor = get_field('text_color');

//  * |---|--> Block padding

$padding = get_field('padding');

if ($padding) {
    $blockClass .= ' padding-' . $padding;
}

if ($textAlignment) {
    $textStyle .= 'text-align:' . $textAlignment . ';';
}

if ($textColor) {
    $textStyle .= 'color:' . $textColor . ';';
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
    $headingClass = $block . '__heading heading';
    $headingSize = $heading['size'];
    $headingColor = $heading['color'];
    $headingText = $heading['text'];
}

$headingStyle = 'color:' . $headingColor . ';';

// ? DESCRIPTION

$description = get_field('description');

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


// ? IMAGE

$image = get_field('image');
$imageAlignment = get_field('image_alignment');
?>


<?php initializeSection($blockClass, $blockStyle) ?>
<div class="container">
    <div class="row <?php if ($order === 'right') {
                        echo 'flex-row-reverse';
                    } ?>">
        <div class="col-<?php echo $firstCol; ?>">
            <!-- Heading -->
            <?php createTextElement($headingClass, $headingSize, $headingStyle, $headingText); ?>
            <!-- Description -->
            <?php createTextElement(generateClass($block, '__description description'), 'p', '', $description); ?>
            <!-- Button -->
            <?php createLinkElement(generateClass($block, '__button button'), $buttonStyle, $buttonTitle, $buttonLink); ?>
        </div>
        <div class="col-<?php echo $secondCol; ?>">


        </div>
    </div>
</div>
</section>
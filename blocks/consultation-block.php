<?php

// ? BLOCK

$block = 'consultation';
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

if ($textAlignment) {
    $textStyle .= 'text-align:' . $textAlignment . ';';
}

if ($textColor) {
    $textStyle .= 'color:' . $textColor . ';';
}

if ($padding) {
    $blockClass .= ' padding-' . $padding;
}

if ($bgStyle) {
    $blockStyle .= $bgStyle;
}
if ($textStyle) {
    $blockStyle .= $textStyle;
}

// ? LABEL

$label = get_field('label');

if ($label) {
    $labelClass = $block . '__label';
    $labelColor = $label['color'];
    $labelText = $label['text'];
}

$labelStyle = 'color:' . $labelColor . ';';

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

?>

<?php initializeSection($blockClass, $blockStyle) ?>
<div class="container">
    <div class="row">
        <div class="col-6">

        </div>
        <div class="col-6">
            <!-- Label -->
            <?php createTextElement($labelClass, 'p', $labelStyle, $labelText); ?>
            <!-- Heading -->
            <?php createTextElement($headingClass, $headingSize, $headingStyle, $headingText); ?>
            <!-- Description -->
            <?php createTextElement(generateClass($block, '__description description'), 'p', '', $description); ?>
        </div>
    </div>
</div>
</section>
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

//  * |---|--> Block text alignment

$textStyle = '';
$textAlignment = get_field('text_alignment');

if($textAlignment){
    $textStyle = 'text-align:' . $textAlignment . ';';
}

//  * |---|--> Block padding

$padding = get_field('padding');

if ($padding) {
    $blockClass .= ' padding-' . $padding;  
}

if($bgStyle){
    $blockStyle .= $bgStyle;
}
if($textStyle){
    $blockStyle .= $textStyle;
}

// ? HEADING

$heading = get_field('heading');
$headingClass = $block . '__heading';
$headingSize = $heading['size'];
$headingColor = $heading['color'];
$headingText = $heading['text'];

$headingStyle = 'color:' . $headingColor . ';';

// ? TEXT

$text = get_field('text');

// ? COLUMNS

$columns = get_field('columns');
$numberOfColumns = count($columns);
?>


<?php initializeSection($blockClass, $blockStyle) ?>
    <?php createHeaderElement($headingClass, $headingSize, $headingStyle, $headingText); ?>

</section>
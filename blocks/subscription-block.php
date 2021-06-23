<?php

// ? BLOCK

$block = 'subscription';
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
    <!-- Heading -->
    <?php createTextElement($headingClass, $headingSize, $headingStyle, $headingText); ?>
    <!-- Description -->
    <?php createTextElement(generateClass($block, '__description description'), 'p', '', $description); ?>
    <!-- Subscription -->
    <div class="<?php echo generateClass($block, '__form') ?>">
        <?php gravity_form('New Subscribe', false, false, false, false, true, 1, true); ?>
    </div>

</div>
</section>
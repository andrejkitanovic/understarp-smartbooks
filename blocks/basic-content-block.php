<?php

// ? BLOCK

$block = 'basic-content';
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
$descriptionClass = $block . '__description description';

// ? IMAGES

$images = filterDisplayed(get_field('images'));

?>

<?php initializeSection($blockClass, $blockStyle) ?>
<div class="container">
    <!-- Heading -->
    <?php createTextElement($headingClass, $headingSize, $headingStyle, $headingText); ?>
    <!-- Description -->
    <?php createTextElement($descriptionClass, 'p', '', $description); ?>

    <div class="row justify-content-center">
        <?php foreach ($images as $image) { ?>
            <div class="<?php echo generateClass($block, '__image-holder'); ?> ">
                <!-- Image -->
                <?php createImageElement(generateClass($block, '__image'), $image['image']['url'], $image['image']['title']); ?>
            </div>
        <?php } ?>
    </div>
</div>

</section>
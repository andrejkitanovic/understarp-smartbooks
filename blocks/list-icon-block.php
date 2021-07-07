<?php

// ? BLOCK

$block = 'list-icon';
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

// ? TEXT

$text = get_field('text');
$textClass = $block . '__text text';

// ? ICONS

$icons = filterDisplayed(get_field('icons'));

?>

<?php initializeSection($blockClass, $blockStyle) ?>
<div class="container">
    <!-- Text -->
    <?php createTextElement(generateClass($block, '__text text'), 'p', '', $text); ?>

    <div class="<?php echo generateClass($block, '__holder') ?> row justify-content-center">
        <?php foreach ($icons as $icon) { ?>
            <div class="<?php echo generateClass($block, '__icon-holder'); ?> ">
                <!-- Icon -->
                <?php createImageElement(generateClass($block, '__icon'), $icon['icon']['url'], $icon['icon']['title']); ?>
            </div>
        <?php } ?>
    </div>
</div>
</section>
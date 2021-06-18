<?php

function initializeSection($class = '', $style = '')
{
    echo '<section class="' . $class . ' new-container" style="' . $style . '">';
}

function createTextElement($class = '', $size = 'p', $style = '', $text = '')
{
    if ($text) {
        echo '<' . $size . ' class="' . $class . '" style="' . $style . '">' . $text . '</' . $size . '>';
    }
}

function createLinkElement($class = '', $style = '', $text = '', $href = '#')
{
    if ($text) {
        echo '<a href="' . $href . '" class="' . $class . '" style="' . $style . '">' . $text . '</a>';
    }
}

function createImageElement($class = '', $image = '', $alt = ''){
    if ($image) {
        echo '<div class="' . $class . '" style="background-image: url(' . $image . ')" alt="' . $alt . '"></div>';
    }
}

function generateClass($class = '', $addon = '')
{
    return $class . $addon;
}

function filterDisplayed($arr)
{
    return array_filter($arr, function($el){ return $el['display'] == true; });
}
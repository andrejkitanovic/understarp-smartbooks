<?php

function initializeSection($class = '', $style = '')
{
    echo '<section class="' . $class . ' new-container" style="' . $style . '">';
}

function createDivElement($class = '', $style = '', $child = '')
{
    echo '<div class="' . $class . '" style="' . $style . '">' . $child . '</div>';
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

function createImageElement($class = '', $image = '', $alt = '', $style = '')
{
    if ($image) {
        echo '<img class="' . $class . '" style="' . $style . '" src="' . $image . '" alt="' . $alt . '"/>';
    }
}

function createDivImageElement($class = '', $image = '', $style = '', $additional = '')
{
    if ($image) {
        echo '<div class="' . $class . '" style="' . $style . 'background-image: url(' . $image . ')" ' . $additional . '></div>';
    }
}

function generateClass($class = '', $addon = '')
{
    return $class . $addon;
}

function filterDisplayed($arr)
{
    return array_filter($arr, function ($el) {
        return $el['display'] == true;
    });
}

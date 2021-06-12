<?php

function initializeSection($class, $style){
    echo '<section class="' . $class . '" style="' . $style . '">';
}

function createHeaderElement($class, $size, $style, $text){
    if($text){
        echo '<' . $size . ' class:"' . $class . '" style:"' . $style . '">' . $text . '</' . $size . '>';
    }
}

function createTextElement($class, $text){
    if($text){
        echo '<p class:"' . $class . '__text">' . $text . '</p>';
    }
}
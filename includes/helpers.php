<?php
$language = 'en';
function get_component($name) {
    global $language;
    include 'components/' . $language . '/' . $name . '.php';
}
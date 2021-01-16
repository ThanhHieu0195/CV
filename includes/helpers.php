<?php
$language = 'en';
function get_component($name, $data) {
    global $language;
    include 'components/' . $language . '/' . $name . '.php';
}
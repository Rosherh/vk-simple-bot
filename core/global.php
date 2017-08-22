<?php

function handlerEvent() {
    return json_decode(file_get_contents('php://input'), true);
}

function debug_enable($enable) {
    if ($enable) {
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
    }
};

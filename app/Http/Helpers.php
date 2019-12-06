<?php

function successStatus() {
    return env('STATUS_CODE_FOR_SUCCESS');
}

function errorStatus() {
    return env('STATUS_CODE_FOR_ERROR');
}

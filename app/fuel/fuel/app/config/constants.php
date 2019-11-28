<?php

const CONSTANTS = [
    'nico_user_email' => [
        'naoki19940317@yahoo.co.jp',
    ],
];

function get_const($key, $default=false) {
    return Arr::get(CONSTANTS, $key, $default);
}

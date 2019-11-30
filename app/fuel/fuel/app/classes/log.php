<?php

class Log extends Fuel\Core\Log {

    public static function var_debug($var, $method = null)
    {
        self::debug(var_export($var, true), $method);
    }

}

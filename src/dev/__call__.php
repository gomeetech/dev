<?php
function __call__($args = [])
{

    return print_r($args);
    if (isset($args[1])) {
        $a = $args;
        $f = $args[1];
        array_shift($a);
        array_shift($a);
        if ($f != 'test_speed' && isset($a[0]) && is_callable($a[0])) {
            $f2 = $a[0];
            array_shift($a);
            for ($i = 0; $i < count($a); $i++) {
                $a[$i] = str_replace('+', ' ', $a[$i]);
            }
            $param = [call_user_func_array($f2, $a)];
        } else {
            $param = $a;
        }
        call_user_func_array($f, $param);
    }
}
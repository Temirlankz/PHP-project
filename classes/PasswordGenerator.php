<?php
class PasswordGenerator {

    public static function generate($length, $upper, $lower, $num, $special) {
        $uppercase = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $lowercase = 'abcdefghijklmnopqrstuvwxyz';
        $numbers = '0123456789';
        $symbols = '!@#$%^&*()_+-={}[]<>?';

        $password = '';

        $password .= substr(str_shuffle($uppercase), 0, $upper);
        $password .= substr(str_shuffle($lowercase), 0, $lower);
        $password .= substr(str_shuffle($numbers), 0, $num);
        $password .= substr(str_shuffle($symbols), 0, $special);

        $used = $upper + $lower + $num + $special;
        $remaining = $length - $used;
        $all = $uppercase . $lowercase . $numbers . $symbols;

        if ($remaining > 0) {
            $password .= substr(str_shuffle($all), 0, $remaining);
        }

        return str_shuffle($password);
    }
}
?>

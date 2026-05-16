<?php 

namespace Framework;

class Validation {
    /*
    * Valudate a string
    * @param string $value
    * @param init $min
    * @param init $max
    * @return bool

    */
    public static function string($value, $min = 1, $max = INF) {
        if(is_string($value)) {
            $value = trim($value);
            $length = strlen($value);

            return $length >= $min && $length <= $max;
        }
        return false;
    }
        /*
    * Valudate an email
    * @param string $value
    * @return mixed
    */
    public static function email($value) {
        $value = trim($value);

        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }

    /**
     * Check if value are matched
     * @param string $value
     * @param string $value2
     * @return bool
     */

    public static function match($value1, $value2) {
        $value1 = trim($value1);
        $value2 = trim($value2);

        return $value1 === $value2;
    }   

    
}

<?php
/**
 * Created by PhpStorm.
 * User: Syamٍ
 * Date: 12/22/2019
 * Time: 06:16 ص
 */

class validationClass {
    /**
     * Method check email is valid or No
     * @param $email
     * @return bool
     */
    public static function validateMail($email){
        if(filter_var($email,FILTER_VALIDATE_EMAIL))
            return true;
        return false;
    }

    /**
     * Method to Valid Length
     * @param $str
     * @param $length
     * @param string $comp
     * @return bool
     */
    public static function validateLength($str,$length,$comp='<'){
        if($comp == '<'){
            if(strlen($str)<$length)
                return true;
            return false;
        }
        elseif($comp == '>'){
                if(strlen($str)>=$length)
                    return true;
                return false;
        }
        return false;
     }
} 
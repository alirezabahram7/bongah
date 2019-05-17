<?php
/**
 * Created by PhpStorm.
 * User: Saeed
 * Date: 11/11/2017
 * Time: 10:28 AM
 */

namespace MPCO\EnglishPersianNumber;


class Numbers
{
    /**
     * convert persian and arabic numbers to english number
     *
     * @param $string
     * @return mixed
     */
    public static function toEnglishNumbers($string, $format_numeber = false) {
        $persian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
        $arabic = ['٩', '٨', '٧', '٦', '٥', '٤', '٣', '٢', '١','٠'];

        $num = range(0, 9);
        $convertedPersianNums = str_replace($persian, $num, $string);
        $englishNumbersOnly = str_replace($arabic, $num, $convertedPersianNums);

        if ($format_numeber) {
            return number_format($englishNumbersOnly);
        }
        return $englishNumbersOnly;
    }

    /**
     * convert english numbers to persian numbers
     *
     * @param $string
     * @return mixed
     */
    public static function toPersianNumbers($string, $format_numeber = false)
    {
        if ($format_numeber) {
            $string =  number_format($string);
        }
        $farsi_array = array("۰", "۱", "۲", "۳", "۴", "۵", "۶", "۷", "۸", "۹");
        $english_array = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9");

        $persian_number = str_replace($english_array, $farsi_array, $string);

        return $persian_number;
    }
}
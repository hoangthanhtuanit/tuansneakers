<?php
/**
 * Created by PhpStorm.
 * User: Tuấn Hoàng
 * Date: 16/6/2020
 * Time: 1:31 PM
 */

namespace App\Helper;


class Date
{
    public static function GetListDayInMonth(){
        $arrDay = [];
        $month = date('m');
        $year = date('Y');
        // Lấy all ngày
        for ($day = 1; $day <= 31; $day++){
            $time = mktime(12, 0, 0, $month, $day, $year);
            if (date('m', $time) == $month) {
                $arrDay[] = date('Y-m-d', $time);
            }
        }
        return $arrDay;
    }
}
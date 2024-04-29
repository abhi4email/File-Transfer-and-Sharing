<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if(!function_exists('run_sql_file')) {
    function secondsToTime($seconds)
    {
        $dtF = new \DateTime('@0');
        $dtT = new \DateTime("@$seconds");

        switch ($seconds) {
            case 0:
                return lang('do_not_expire');
            break;
            case ($seconds < 86400): // if time is less than one day
                $value = $dtF->diff($dtT)->format('%h');
                return $value . ' ' . ($value == 1 ? lang('hour') : lang('hours'));
            break;
            case ($seconds < 604800 && $seconds >= 86400): // if time is between 1 day and 1 week
                $value = $dtF->diff($dtT)->format('%d');
                return $value . ' ' . ($value == 1 ? lang('day') : lang('days'));
            break;
            case ($seconds < 2592000 && $seconds >= 604800): // if time between 1 week and 1 month
                $value = ($dtF->diff($dtT)->format('%d') / 7);
                return $value . ' ' . ($value == 1 ? lang('week') : lang('weeks'));
            break;
            case ($seconds >= 2592000): // if time is longer than 1 month
                $value = ($seconds / 2592000);
                return $value . ' ' . ($value == 1 ? lang('month') : lang('months'));
            break;
        }
    }
}
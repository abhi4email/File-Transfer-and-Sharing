<?php
/**
 * SQL Helper
 *
 * @author: Daan - Abhi
 *
 */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if(!function_exists('run_sql_file')) {
    function startsWith($haystack, $needle){
        $length = strlen($needle);
        return (substr($haystack, 0, $length) === $needle);
    }

    function run_sql_file($file_path, $db){
        //load file
        $commands = file_get_contents($file_path);

        //delete comments
        $lines = explode("\n",$commands);
        $commands = '';
        foreach($lines as $line){
            $line = trim($line);
            if( $line && !startsWith($line,'--') ){
                $commands .= $line . "\n";
            }
        }

        //convert to array
        $commands = explode(";", $commands);

        //run commands
        foreach($commands as $command){
            if(trim($command)){
                $db->query($command);
            }
        }

        return true;
    }
}
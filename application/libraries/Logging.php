<?php

/**
 * Class Logging
 */
class Logging
{
    /**
     * @var CI_Controller
     */
    protected $CI;

    /**
     * Logging constructor.
     */
    public function __construct() {
        $this->CI =& get_instance();
    }

    /**
     * Log
     *
     * @param $text
     * @return void
     */
    public function log($text) {
        if($this->CI->config->item('debug_mode') == 'true') {
            $log_file = FCPATH . 'Sharify.log';
            $data = date('Y-m-d H:i:s') . ' ' . $text . PHP_EOL;
            $fp = fopen($log_file, 'a');
            fwrite($fp, $data);
            fclose($fp);
        }
    }
}
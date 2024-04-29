<?php

/**
 * Class UpdateLib
 */
class UpdateLib
{
    /**
     * @var CI_Controller
     */
    protected $CI, $version;

    /**
     * AdminLib constructor.
     */
    public function __construct() {
        $this->CI =& get_instance();

        $this->version = '2.4.8';
    }

    public function run() {
        $current_version = $this->CI->config->item('version');

        $update_dir = APPPATH . 'update';

        if($current_version < '2.0.2')
        {
            $this->runSQL($update_dir . '/update_2.0.2.sql');
        }
        if($current_version < '2.1.4')
        {
            $this->runSQL($update_dir . '/update_2.1.4.sql');
        }
        if($current_version < '2.1.9')
        {
            $this->runSQL($update_dir . '/update_2.1.9.sql');
        }
        if($current_version < '2.2.0')
        {
            $this->runSQL($update_dir . '/update_2.2.0.sql');
        }
        if($current_version < '2.2.2')
        {
            foreach (glob(dirname(__FILE__) . "/../../assets/js/Aa*") as $filename) {
                unlink($filename);
            }
        }
        if($current_version < '2.2.6')
        {
            $this->runSQL($update_dir . '/update_2.2.6.sql');
        }
        if($current_version < '2.3.0')
        {
            $this->runSQL($update_dir . '/update_2.3.0.sql');
        }
        if($current_version < '2.3.1')
        {
            $this->runSQL($update_dir . '/update_2.3.1.sql');
        }
        if($current_version < '2.3.2')
        {
            $this->runSQL($update_dir . '/update_2.3.2.sql');
        }
        if($current_version < '2.3.3')
        {
            $this->runSQL($update_dir . '/update_2.3.3.sql');
        }
        if($current_version < '2.3.4')
        {
            $this->runSQL($update_dir . '/update_2.3.4.sql');
        }
        if($current_version < '2.3.5')
        {
            $this->runSQL($update_dir . '/update_2.3.5.sql');
        }
        if($current_version < '2.3.6')
        {
            $this->runSQL($update_dir . '/update_2.3.6.sql');
        }
        if($current_version < '2.3.7')
        {
            $this->runSQL($update_dir . '/update_2.3.7.sql');
        }
        if($current_version < '2.3.8')
        {
            $this->runSQL($update_dir . '/update_2.3.8.sql');
        }
        if($current_version < '2.3.9')
        {
            $this->runSQL($update_dir . '/update_2.3.9.sql');
        }
        if($current_version < '2.4.3')
        {
            $this->runSQL($update_dir . '/update_2.4.3.sql');
        }
        if($current_version < '2.4.5')
        {
            $this->runSQL($update_dir . '/update_2.4.5.sql');
        }
        if($current_version < '2.4.6')
        {
            $this->runSQL($update_dir . '/update_2.4.6.sql');
        }

        $this->updateVersion();
    }

    private function runSQL($path) {
        if (file_exists($path))
        {
            $sql = file_get_contents($path);

            $query_array = explode(";", $sql);
            foreach ($query_array as $query)
            {
                if ( ! empty($query))
                {
                    $query = utf8_encode($query);
                    $this->CI->db->query($query);
                }
            }

            unlink($path);
        }
    }

    private function updateVersion() {
        $this->CI->db->query("INSERT INTO `Sharify_updates` (`version`, `type`, `date`) VALUES ('".$this->version."', '', CURRENT_TIMESTAMP);");
        $this->CI->db->query("UPDATE Sharify_settings SET version = '".$this->version."' LIMIT 1;");
    }
}
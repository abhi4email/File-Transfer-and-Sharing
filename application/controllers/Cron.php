<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Cron
 * @property cronlib $cronlib
 */
class Cron extends CI_Controller {
    public function __construct()
    {
        parent::__construct();

        // Load some external models
        $this->load->library('CronLib');
    }

    public function index()
    {
        // Run cron commands
        $this->cronlib->checkUploads();
        $this->cronlib->checkFiles();
        $this->cronlib->purgeTempData();
        $this->cronlib->runPluginCrons();
        $this->cronlib->deleteOldData();
        $this->cronlib->deleteOldEmailVerify();

        echo 'Cron finished at ' . date('Y-m-d H:i:s');
    }
}

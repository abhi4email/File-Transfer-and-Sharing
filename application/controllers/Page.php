<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {
    public function __construct()
    {
        parent::__construct();

        // Load some helpers
        $this->load->helper('language');
        $this->load->helper('url');

        // Load some external models
        $this->load->library('session');
        $this->load->library('plugin');
    }

    public function index()
    {
        $this->load->library('email');

        $request = $this->uri->segment(2, 0);

        // Check if the requested page exists in the plugin page list
        if(isset($this->plugin->_pages[$request])) {
            $plugin_config = $this->plugin->_pages[$request];

            $page_data = array(
                'config' => $this->config->config
            );

            // Check if a POST has been sent
            if($_SERVER['REQUEST_METHOD'] === 'POST') {
                require_once $this->plugin->_pluginDir . $plugin_config['load'] . '/' . $plugin_config['post_handler'];
                exit;
            }

            if(isset($_GET) && !empty($_GET)) {
                require_once $this->plugin->_pluginDir . $plugin_config['load'] . '/' . $plugin_config['get_handler'];
            }

            if(!empty($plugin_config['view'])) {
                // Load the requested view from the plugin
                $this->load->view('../plugins/' . $plugin_config['load'] . '/' . $plugin_config['view'], $page_data);
            }
        }


    }
}

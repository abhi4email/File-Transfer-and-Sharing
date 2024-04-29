<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class ConfigHook
 */
class ConfigHook {
    private $CI;

    function __construct()
    {
        $this->CI =& get_instance();
    }

    /**
     * Get settings from DB
     */
    function getSettings() {
        if($this->CI->router->class != 'install')
        {
            $query = $this->CI->db->query("SELECT * FROM Sharify_settings LIMIT 1");
            $settings = $query->row_array();
            // Store Sharify settings in codeigniter
            foreach ($settings as $key => $value)
            {
                if ($key == 'id')
                    continue;
                if($key == 'language')
                    $key = 'Sharify_language';

                $this->CI->config->set_item($key, $value);
            }

            // Set the site URl from the database as CodeIgniter base URL
            $this->CI->config->set_item('base_url', $this->CI->config->item('site_url'));

            // Set the server time
            if(!empty($settings['timezone'])) {
                date_default_timezone_set($settings['timezone']);
            }

            // Get active theme
            $query = $this->CI->db->query("SELECT * FROM Sharify_themes WHERE status='ready' LIMIT 1");
            $theme = $query->row_object()->path;

            // Set active theme in global config
            $this->CI->config->set_item('theme', $theme);
        }
    }

    /**
     * Load the language
     */
    function loadLanguage()
    {
        if($this->CI->router->class != 'install')
        {
            $this->CI->load->library('session');

            // Get language from session
            $language = $this->CI->session->userdata('language');

            // Check if language is already set
            if (empty($language) || ! isset($language))
            {
                // Language not set, set now.
                $language = strtolower(str_replace('.php', '', $this->CI->config->item('Sharify_language')));

                // Store in session
                $this->CI->session->set_userdata('language', $language);
            }

            // Load the set language
            $this->CI->lang->load('main_lang', $language);
        }
    }

    /**
     * Load all the plugins
     */
    function loadPlugins() {
        if($this->CI->router->class != 'install')
        {
            $this->CI->load->library('plugin');

            $this->CI->plugin->loadPlugins();
        }
    }
}
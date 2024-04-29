<?php

/**
 * Sharify plugin loader
 *
 * @version 1.0
 * @author Abhi
 */
class Plugin {
    private $CI;
    public $_pluginDir, $_plugins, $_pages, $_tabs, $_adminpages, $_crons, $_css;

    /**
     * Plugin constructor.
     */
    function __construct()
    {
        // Codeigniter framework
        $this->CI =& get_instance();

        $this->_pluginDir = APPPATH . 'plugins/';

        $this->_plugins    = array();
        $this->_pages      = array();
        $this->_tabs       = array();
        $this->_adminpages = array();
        $this->_crons      = array();
        $this->_css        = array();
    }

    /**
     * Check the application/plugins/ directory for plugins and start loading their config file
     */
    function loadPlugins() {
        // Loop through the plugins
        foreach(glob($this->_pluginDir . '*') as $dir) {
            // Do not load the index.html file that's inside the folder
            if(basename($dir) == 'index.html')
                continue;

            // Load the plugin config
            $jsonConfig = file_get_contents($dir . '/config.json');
            $arrayConfig = json_decode($jsonConfig, true);

            // Retrieve the key name of the plugin config array
            $pluginName = key($arrayConfig);

            // Check if the json has content
            if(!empty($jsonConfig)) {
                // Convert config json to array
                $this->_plugins = array_merge($this->_plugins, json_decode($jsonConfig, true));
            }

            if(isset($arrayConfig[$pluginName]['cron'])) {
                $this->_crons[] = $arrayConfig[$pluginName]['load'] . '/' . $arrayConfig[$pluginName]['cron'];
            }

            if(isset($arrayConfig[$pluginName]['css'])) {
                $this->_css[] = $arrayConfig[$pluginName]['css'];
            }

            // Check if the plugin requires any custom translation files to be loaded
            if(isset($arrayConfig[$pluginName]['translation'])) {
                // Get the current translation set by the session
                $language = $this->CI->session->userdata('language');
                // Load translation file
                $this->CI->lang->load($arrayConfig[$pluginName]['translation'], $language);
            }

            // Check if plugin has pages file
            if(file_exists($dir . '/pages.json')) {
                // Load pages file
                $pagesConfig = file_get_contents($dir . '/pages.json');

                // Check if the json has content
                if(!empty($pagesConfig)) {
                    // Convert pages json to array
                    $this->_pages = array_merge($this->_pages, json_decode($pagesConfig, true));
                }
            }

            // Specify tab file based on theme
            if($this->CI->config->item('theme') == 'modern') {
                $tabs_file = 'tabs-modern.json';
            }
            elseif(!in_array($this->CI->config->item('theme'), array('default', 'grey', 'oldtimer'))) {
                $tabs_file = 'tabs-'.$this->CI->config->item('theme').'.json';
                if(!file_exists($dir . '/' . $tabs_file)) {
                    $tabs_file = 'tabs.json';
                }
            } else {
                $tabs_file = 'tabs.json';
            }

            // Check if plugin has a tabs file
            if(file_exists($dir . '/' . $tabs_file)) {
                // Load pages file
                $tabsConfig = file_get_contents($dir . '/' . $tabs_file);

                // Check if the json has content
                if(!empty($tabsConfig)) {
                    // Convert tabs json to array
                    $this->_tabs = array_merge($this->_tabs, json_decode($tabsConfig, true));
                }
            }

            // Check if plugin has an admin file
            if(file_exists($dir . '/admin.json')) {
                // Load pages file
                $adminpagesConfig = file_get_contents($dir . '/admin.json');

                // Check if the json has content
                if(!empty($adminpagesConfig)) {
                    // Convert tabs json to array
                    $this->_adminpages = array_merge($this->_adminpages, json_decode($adminpagesConfig, true));
                }
            }

            if(isset($arrayConfig[$pluginName]['init'])) {
                require_once APPPATH . 'plugins/' . $arrayConfig[$pluginName]['load'] . '/' . $arrayConfig[$pluginName]['init'];
            }
        }
    }

    /**
     * Init a plugin
     *
     * @param $type
     * @param $param
     */
    function initPlugin($type, $param) {
        if(isset($this->_plugins[$type][$param])) {
            //require_once $this->_pluginDir . $this->_plugins[$type][$param];
        }
    }

    /**
     * Check if the plugin of $type has been loaded
     *
     * @param $type
     * @return bool
     */
    function pluginLoaded($type) {
        if(array_key_exists($type, $this->_plugins)) {
            return true;
        }
        return false;
    }
}
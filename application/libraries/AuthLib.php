<?php

/**
 * Class AuthLib
 */
class AuthLib
{
    /**
     * @var CI_Controller
     */
    protected $CI;

    /**
     * AdminLib constructor.
     */
    public function __construct() {
        $this->CI =& get_instance();

        $this->CI->load->model('users');
        $this->CI->load->library('session');
    }

    /**
     * Authenticate user
     *
     * @param $post
     * @return bool
     */
    public function authUser($post) {
        $this->CI->load->library('plugin');
        if ($this->CI->plugin->pluginLoaded('auth'))
        {
            $auth_plugin = $this->CI->plugin->_plugins['auth'];

            require_once $this->CI->plugin->_pluginDir . $auth_plugin['load'] . '/' . $auth_plugin['auth_library'];

            $extAuthLib = new ExternalAuthLib();

            return $extAuthLib->login($post);
        }
        else
        {
            $check = $this->CI->users->getByEmail($post['email']);

            if($check !== false && password_verify($post['password'], $check['password']))
            {
                // Start creating a session
                $this->CI->load->library('session');

                $this->CI->session->sess_regenerate();

                // Session data to be set
                $session_data = array(
                    'user' => TRUE,
                    'user_id' => $check['id'],
                    'user_email' => $check['email']
                );

                $this->CI->session->set_userdata($session_data);

                return true;
            }
            return false;
        }
    }

    /**
     * Logout the user
     */
    public function logoutUser() {
        // Start creating a session
        $this->CI->load->library('session');

        // Session data to be set
        $session_data = array(
            'user' => FALSE,
            'user_id' => 0,
            'user_email' => ''
        );

        $this->CI->session->set_userdata($session_data);
    }

    /**
     * Check if page is allowed for user
     *
     * @param $page
     * @return bool
     */
    public function pageAllowed($page) {
        $lock_page = $this->CI->config->item('lock_page');

        $auth = false;
        if($this->CI->session->has_userdata('user') && $this->CI->session->userdata('user') == TRUE && $this->CI->session->has_userdata('user_id') && $this->CI->session->userdata('user_id') != 0) {
            $auth = true;
        }

        if($lock_page == 'false') {
            return true;
        }
        elseif($lock_page == 'both' && $auth) {
            return true;
        }
        elseif($lock_page == 'upload' && $page == 'upload' && $auth) {
            return true;
        }
        elseif($lock_page == 'download' && $page == 'download' && $auth) {
            return true;
        }
        elseif($lock_page == 'download' && $page == 'upload') {
            return true;
        }
        elseif($lock_page == 'upload' && $page == 'download') {
            return true;
        }
        else
        {
            return false;
        }
    }
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property users $users
 * @property  authlib $authlib
 */
class Login extends CI_Controller {
    public function __construct()
    {
        parent::__construct();

        // Load some external models
        $this->load->model('language');
        $this->load->model('themes');
        $this->load->model('backgrounds');
        $this->load->model('users');

        // Load the helpers
        $this->load->helper('language');
        $this->load->helper('url');

        $this->load->library('AuthLib');
    }

    /**
     *
     */
    public function index()
    {
        $data = array(
            'settings'    => $this->config->config,
            'backgrounds' => $this->backgrounds->getAllOrderID(),
            'noad'        => true,
            'mobile'      => false
        );

        if(isset($_GET['login']) && $_GET['login'] == 'failed') {
            $data['result'] = false;
        }

        // Check if auth plugin is installed and if the login page is an external login page such as Azure AD
        $this->load->library('plugin');
        if ($this->plugin->pluginLoaded('auth') && isset($this->plugin->_plugins['auth']['external_login']))
        {
            require_once $this->plugin->_pluginDir . $this->plugin->_plugins['auth']['load'] . '/' . $this->plugin->_plugins['auth']['auth_library'];

            $extAuthLib = new ExternalAuthLib();
            $extAuthLib->login();
        } else {

            $this->load->helper('recaptcha');

            if (isset($_POST) && !empty($_POST)) {
                if (empty($this->config->item('recaptcha_secret')) || validate_recaptcha($_POST['g-recaptcha-response'], $this->config->item('recaptcha_secret'))) {
                    if ($this->authlib->authUser($this->input->post())) {
                        redirect('/');
                    } else {
                        $data['result'] = false;
                    }
                } else {
                    $data['result'] = false;
                }
            }
        }

        $this->load->view('themes/' . $this->config->item('theme') . '/login', $data);

        $this->load->view('themes/' . $this->config->item('theme') . '/_elem/footer', $data);
    }

    public function logout() {
        $this->load->library('plugin');
        if ($this->plugin->pluginLoaded('auth') && isset($this->plugin->_plugins['auth']['external_login'])) {
            require_once $this->plugin->_pluginDir . $this->plugin->_plugins['auth']['load'] . '/' . $this->plugin->_plugins['auth']['auth_library'];

            $extAuthLib = new ExternalAuthLib();
            $extAuthLib->logout();
        } else {
            $this->authlib->logoutUser();

            redirect('/');
        }
    }
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

/**
 * Class Install
 */
class Install extends CI_Controller {
    public function __construct()
    {
        parent::__construct();

        $this->load->library('InstallLib');
        $this->load->helper('url');
    }

    public function index()
    {
        $_SESSION['base_url'] = str_replace('/install', '', ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
        $_SESSION['install'] = 0;

        setcookie("language", "", time()-3600);

        // Data to pass through to views
        $data = array(
            'settings' => $this->config->config,
            'step' => 1,
            'database' => false
        );

        // Check if credentials are set
        if(!empty($this->db->database) && !empty($this->db->password) && !empty($this->db->username) && !empty($this->db->database)) {
            if($this->db->conn_id != NULL) {
                $data['database'] = true;
            }
        }

        $this->load->view('install/_elem/header', $data);

        $this->load->view('install/step1', $data);

        $this->load->view('install/_elem/footer', $data);
    }

    public function step2() {
        // Data to pass through to views
        $data = array(
            'settings' => $this->config->config,
            'step' => 2
        );

        // Post date
        $post = $this->input->post(NULL, TRUE);

        if(!empty($post['code'])) {
            $postdata = array(
                "purchase_code" => $_POST['code'],
                "ip" => $_SERVER['SERVER_ADDR']
            );

            $_SESSION['install'] = 1;
            header('Location: '.$_SESSION['base_url'].'/install/step3');exit;
        }

        $this->load->view('install/_elem/header', $data);

        $this->load->view('install/step2', $data);

        $this->load->view('install/_elem/footer', $data);
    }

    public function step3() {
        $data = array(
            'settings' => $this->config->config,
            'step' => 3
        );

        // Check valid
        if($_SESSION['install'] != 1) {
            header('Location: '.$_SESSION['base_url'].'/install/step2?auth=no');exit;
        }

        if($this->load->database('default', true) === false) {
            $this->load->view('install/_elem/header', $data);

            $this->load->view('install/step3', $data);

            $this->load->view('install/_elem/footer', $data);
        }
        else
        {
            $this->load->helper('sql');

            if($this->db->table_exists('Sharify_settings')) {
                run_sql_file(APPPATH . 'install/updatev2.sql', $this->db);
            }
            else
            {
                run_sql_file(APPPATH . 'install/Sharify.sql', $this->db);
            }

            $this->db->query("UPDATE Sharify_settings SET site_url = '".$_SESSION['base_url']."/' LIMIT 1;");

            header('Location: '.$_SESSION['base_url'].'/install/step4');exit;
        }
    }

    public function step4() {
        // Check valid
        if($_SESSION['install'] != 1) {
            header('Location: '.$_SESSION['base_url'].'/install/step2?auth=no');
        }

        // Data to pass through to views
        $data = array(
            'settings' => $this->config->config,
            'step' => 4
        );

        // Post date
        $post = $this->input->post(NULL, TRUE);

        if($post) {
            $this->load->model('accounts');

            $data = array(
                'email' => $post['email'],
                'password' => password_hash($post['password'], PASSWORD_DEFAULT),
                'ip' => ''
            );

            if($this->accounts->add($data)) {
                header('Location: '.$_SESSION['base_url'].'/install/step5');
            }
        }

        $this->load->view('install/_elem/header', $data);

        $this->load->view('install/step4', $data);

        $this->load->view('install/_elem/footer', $data);
    }

    public function step5() {
        session_destroy();

        // Data to pass through to views
        $data = array(
            'settings' => $this->config->config,
            'step' => 5
        );

        $this->load->view('install/_elem/header', $data);

        $this->load->view('install/step5', $data);

        $this->load->view('install/_elem/footer', $data);
    }
}
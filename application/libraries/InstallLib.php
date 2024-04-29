<?php

/**
 * Class InstallLib
 */
class InstallLib {
    /**
     * InstallLib constructor.
     */
    function __construct()
    {

    }

    /**
     * Post data to an URL
     *
     * @param $url
     * @param $data
     * @return bool|string
     */
    public function post_to_url($url, $data) {
        $fields = '';
        foreach ($data as $key => $value) {
            $fields .= $key . '=' . $value . '&';
        }
        rtrim($fields, '&');

        $post = curl_init();

        curl_setopt($post, CURLOPT_URL, $url);
        curl_setopt($post, CURLOPT_POST, count($data));
        curl_setopt($post, CURLOPT_POSTFIELDS, $fields);
        curl_setopt($post, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($post, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($post, CURLOPT_SSL_VERIFYHOST, FALSE);

        $result = curl_exec($post);

        curl_close($post);
        return $result;
    }

    /**
     * set_db_config
     *
     * Replaces the database config file placeholder with new values
     *
     * @param $values
     * @return bool
     */
    public function set_db_config($values) {
        // Database file path
        $file_path = APPPATH . 'config/database.php';

        // Read the contents of the database file
        $file = file_get_contents($file_path);

        // To replace values
        $replace = array(
            '#db_host#',
            '#db_user#',
            '#db_pass#',
            '#db_name#'
        );

        // New values
        $new = array(
            $values['host'],
            $values['user'],
            $values['pass'],
            $values['name']
        );

        // Replace the placeholder string with the values
        $result = str_replace($replace, $new, $file);

        // Replace file with new content
        if(file_put_contents($file_path, $result)) {
            return true;
        }
        return false;
    }

    /**
     * test_mysql_connection
     *
     * Tests the connection to the database
     *
     * @param $host
     * @param $username
     * @param $password
     * @param $database
     * @return bool
     */
    public function test_mysql_connection($host, $username, $password, $database) {
        $conn = new mysqli($host, $username, $password, $database);

        // Check connection
        if ($conn->connect_error) {
            return false;
        }
        return true;
    }
}
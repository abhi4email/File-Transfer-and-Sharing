<?php

/**
 * Class Downloads
 */
class Accounts extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    /**
     * Will return all rows from the table
     * @param int $start
     * @param int $limit
     * @return array|bool
     */
    function getAll($start = 0, $limit = 0) {
        $this->db->select('*');
        $this->db->from('Sharify_accounts');
        if($limit > 0) {
            $this->db->limit($start, $limit);
        }

        $query = $this->db->get();

        if($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    /**
     * Will return total amount of rows in the Sharify_downloads table
     *
     * @return int
     */
    function getTotal() {
        $this->db->select('id');
        $this->db->from('Sharify_accounts');

        $query = $this->db->get();

        return $query->num_rows();
    }

    /**
     * Select an account by the account ID
     *
     * @param $id
     * @return array|bool
     */
    function getByID($id) {
        $this->db->select('*');
        $this->db->from('Sharify_accounts');
        $this->db->where('id', $id);
        $this->db->limit(1);

        $query = $this->db->get();

        if($query->num_rows() > 0) {
            return $query->row_array();
        }
        return false;
    }

    /**
     * Select an account by email
     *
     * @param $email
     * @return array|bool
     */
    function getByEmail($email) {
        $this->db->select('*');
        $this->db->from('Sharify_accounts');
        $this->db->where('email', $email);
        $this->db->limit(1);

        $query = $this->db->get();

        if($query->num_rows() > 0) {
            return $query->row_array();
        }
        return false;
    }

    /**
     * Update row by ID
     *
     * @param $data
     * @param $id
     * @return bool
     */
    function updateByID($data, $id) {
        $this->db->where('id', $id);
        if($this->db->update('Sharify_accounts', $data)) {
            return true;
        }
        return false;
    }

    /**
     * add
     *
     * Add a new account
     *
     * @param $data
     * @return bool
     */
    function add($data) {
        if($this->db->insert('Sharify_accounts', $data)) {
            return true;
        }
        return false;
    }

    /**
     * Check user from email and return password to verify
     * @param $email
     * @return array|bool
     */
    function login($email) {
        $this->db->select('id,password');
        $this->db->from('Sharify_accounts');
        $this->db->where('email', $email);

        $query = $this->db->get();

        if($query->num_rows() > 0) {
            return $query->row_array();
        }
        return false;
    }
}
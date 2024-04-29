<?php

/**
 * Class Users
 */
class Users extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    /**
     * Add new row into the table
     *
     * @param $data
     * @return bool
     */
    function add($data) {
        $query = $this->db->insert('Sharify_users', $data);

        if($query) {
            return true;
        }
        return false;
    }

    /**
     * Will return all rows
     * @param int $start
     * @param int $limit
     * @return array|bool
     */
    function getAll($start = 0, $limit = 0) {
        $this->db->select('*');
        $this->db->from('Sharify_users');
        if($limit > 0) {
            $this->db->limit($limit, $start);
        }

        $query = $this->db->get();

        if($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    /**
     * Will return total amount of rows
     *
     * @return int
     */
    function getTotal() {
        $this->db->select('id');
        $this->db->from('Sharify_users');

        $query = $this->db->get();

        return $query->num_rows();
    }

    /**
     * Select an row by ID
     *
     * @param $id
     * @return array|bool
     */
    function getByID($id) {
        $this->db->select('*');
        $this->db->from('Sharify_users');
        $this->db->where('id', $id);
        $this->db->limit(1);

        $query = $this->db->get();

        if($query->num_rows() > 0) {
            return $query->row_array();
        }
        return false;
    }

    /**
     * Select an user by email
     *
     * @param $email
     * @return array|bool
     */
    function getByEmail($email) {
        $this->db->select('*');
        $this->db->from('Sharify_users');
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
        if($this->db->update('Sharify_users', $data)) {
            return true;
        }
        return false;
    }

    /**
     * Delete a row by ID
     *
     * @param $id
     * @return bool
     */
    function deleteByID($id) {
        $this->db->delete('Sharify_users', array('id' => $id));

        return true;
    }

    /**
     * Select user by email and password
     *
     * @param $email
     * @param $password
     * @return array

    function getUserByEmailAndPassword($email, $password) {
        $this->db->select('*');
        $this->db->from('Sharify_users');
        $this->db->where('email', $email);
        $this->db->where('password', $password);

        $query = $this->db->get();

        if($query->num_rows() > 0) {
            return $query->row_array();
        }
    }*/
}
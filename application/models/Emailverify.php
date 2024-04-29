<?php

/**
 * Class EmailVerify
 */
class Emailverify extends CI_Model {

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
        $query = $this->db->insert('Sharify_email_verify', $data);

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
        $this->db->from('Sharify_email_verify');
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
        $this->db->from('Sharify_email_verify');

        $query = $this->db->get();

        return $query->num_rows();
    }

    /**
     * Select a row by ID
     *
     * @param $id
     * @return array|bool
     */
    function getByID($id) {
        $this->db->select('*');
        $this->db->from('Sharify_email_verify');
        $this->db->where('id', $id);
        $this->db->limit(1);

        $query = $this->db->get();

        if($query->num_rows() > 0) {
            return $query->row_array();
        }
        return false;
    }

    /**
     * Select a row by email
     *
     * @param $email
     * @return array|bool
     */
    function getByEmail($email) {
        $this->db->select('*');
        $this->db->from('Sharify_email_verify');
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
        if($this->db->update('Sharify_email_verify', $data)) {
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
        $this->db->delete('Sharify_email_verify', array('id' => $id));

        return true;
    }

    function countVerifiedByEmail($email) {
        $this->db->select('*');
        $this->db->from('Sharify_email_verify');
        $this->db->where('email', $email);
        $this->db->where('status', 'verified');

        $query = $this->db->get();

        return $query->num_rows();
    }

    function countByEmailAndCode($email, $code) {
        $this->db->select('*');
        $this->db->from('Sharify_email_verify');
        $this->db->where('email', $email);
        $this->db->where('code', $code);

        $query = $this->db->get();

        return $query->num_rows();
    }

    function countPendingByEmailAndCode($email, $code) {
        $this->db->select('*');
        $this->db->from('Sharify_email_verify');
        $this->db->where('email', $email);
        $this->db->where('code', $code);
        $this->db->where('status', 'pending');

        $query = $this->db->get();

        return $query->num_rows();
    }

    function updatePendingByEmailAndCode($email, $code, $data) {
        $this->db->where('email', $email);
        $this->db->where('code', $code);
        $this->db->where('status', 'pending');

        if($this->db->update('Sharify_email_verify', $data)) {
            return true;
        }
        return false;
    }

    function deleteOldPending() {
        $this->db->query("DELETE FROM Sharify_email_verify WHERE (`time` + 3600) < ".time()." AND status = 'pending'");
    }
}
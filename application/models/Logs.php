<?php

/**
 * Class Logs
 */
class Logs extends CI_Model {

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
        $this->db->from('Sharify_log');
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
     * Will return total amount of rows in the table
     *
     * @return int
     */
    function getTotal() {
        $this->db->select('id');
        $this->db->from('Sharify_log');

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
        $this->db->from('Sharify_log');
        $this->db->where('id', $id);
        $this->db->limit(1);

        $query = $this->db->get();

        if($query->num_rows() > 0) {
            return $query->row_array();
        }
        return false;
    }
}
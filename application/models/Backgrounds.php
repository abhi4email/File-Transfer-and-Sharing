<?php

/**
 * Class Downloads
 */
class Backgrounds extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    /**
     * Will return all backgrounds from the Sharify_backgrounds table
     * @param int $start
     * @param int $limit
     * @return array|bool
     */
    function getAll($start = 0, $limit = 0) {
        $this->db->select('*');
        $this->db->from('Sharify_backgrounds');
        if($limit > 0) {
            $this->db->limit($start, $limit);
        }

        $query = $this->db->get();

        if($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }

    function getAllOrderID($start = 0, $limit = 0) {
        $this->db->select('*');
        $this->db->from('Sharify_backgrounds');
        $this->db->order_by('id');
        if($limit > 0) {
            $this->db->limit($start, $limit);
        }

        $query = $this->db->get();

        if($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }

    /**
     * Will return total amount of rows in the Sharify_backgrounds table
     *
     * @return int
     */
    function getTotal() {
        $this->db->select('id');
        $this->db->from('Sharify_backgrounds');

        $query = $this->db->get();

        return $query->num_rows();
    }

    /**
     * Select a background by ID
     *
     * @param $id
     * @return bool|object
     */
    function getByID($id) {
        $this->db->select('*');
        $this->db->from('Sharify_backgrounds');
        $this->db->where('id', $id);
        $this->db->limit(1);

        $query = $this->db->get();

        if($query->num_rows() > 0) {
            return $query->row_object();
        }
        return false;
    }

    /**
     * Add new background to table
     *
     * @param $data
     * @return bool
     */
    function add($data) {
        if($this->db->insert('Sharify_backgrounds', $data)) {
            return true;
        }
        return false;
    }

    /**
     * Delete background from table by ID
     *
     * @param $id
     * @return bool
     */
    function delete($id) {
        $this->db->where('id', $id);
        if($this->db->delete('Sharify_backgrounds')) {
            return true;
        }
        return false;
    }
}
<?php

class Themes extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    /**
     * Add new row in the table
     *
     * @param $data
     * @return bool
     */
    function add($data) {
        $query = $this->db->insert('Sharify_themes', $data);

        if($query) {
            return true;
        }
        return false;
    }

    /**
     * Will return all rows from the table
     *
     * @return array|bool
     */
    function getAll() {
        $this->db->select('*');
        $this->db->from('Sharify_themes');

        $query = $this->db->get();

        if($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    /**
     * Returns the active theme
     *
     * @return array
     */
    function getActiveTheme() {
        $this->db->select('*');
        $this->db->from('Sharify_themes');
        $this->db->where('status', 'ready');
        $this->db->limit(1);

        $query = $this->db->get();

        return $query->row_array();
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
        if($this->db->update('Sharify_themes', $data)) {
            return true;
        }
        return false;
    }

    /**
     * Update all rows
     *
     * @param $data
     * @return bool
     */
    function updateAll($data) {
        if($this->db->update('Sharify_themes', $data)) {
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
        $this->db->delete('Sharify_themes', array('id' => $id));

        return true;
    }
}
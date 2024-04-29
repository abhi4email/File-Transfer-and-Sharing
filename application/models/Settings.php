<?php

/**
 * Class Settings
 */
class Settings extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    /**
     * Will return all settings from the table
     *
     * @param int $start
     * @param int $limit
     * @return array|bool
     */
    function getAll($start = 0, $limit = 0) {
        $this->db->select('*');
        $this->db->from('Sharify_settings');
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
     * Save new settings
     *
     * @param $arr
     * @return bool
     */
    function save($arr) {
        if($this->db->update('Sharify_settings', $arr)) {
            return true;
        }
    }
}
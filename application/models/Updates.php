<?php

/**
 * Class Updates
 */
class Updates extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    /**
     * Will return updates from the Sharify_updates table
     *
     * @param int $start
     * @param int $limit
     * @return array|bool
     */
    function getAll($start = 0, $limit = 0) {
        $this->db->select('*');
        $this->db->from('Sharify_updates');
        $this->db->order_by('id', 'DESC');

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
     * Insert data into updates table
     *
     * @param $data
     * @return bool
     */
    function insert($data) {
        if($this->db->insert('Sharify_updates', $data)) {
            return true;
        }
        return false;
    }
}
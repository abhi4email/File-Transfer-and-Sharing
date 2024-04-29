<?php

class Socials extends CI_Model {

    /**
     * Get all socials from the social table
     * @return mixed
     */
    function getAll() {
        $this->db->select('*');
        $this->db->from('Sharify_social');
        $this->db->limit(1);

        $query = $this->db->get();

        return $query->row_array();
    }

    /**
     * Save new settings
     * @param $arr
     * @return bool
     */
    function save($arr) {
        if($this->db->update('Sharify_social', $arr)) {
            return true;
        }
    }
}
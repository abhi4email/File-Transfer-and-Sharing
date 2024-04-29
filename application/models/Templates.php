<?php

class Templates extends CI_Model {

    function getByTypeAndLanguage($type, $language) {
        $this->db->select('*');
        $this->db->where('type', $type);
        $this->db->where('lang', $language);
        $this->db->from('Sharify_templates');
        $this->db->limit(1);
        $query = $this->db->get();

        if($query->num_rows() > 0)
        {
            return $query->row_array();
        }
    }

    function checkIfTypeExist($type, $lang) {
        $this->db->select('*');
        $this->db->where('lang', $lang);
        $this->db->where('type', $type);
        $this->db->from('Sharify_templates');
        $this->db->limit(1);
        $query = $this->db->get();

        if($query->num_rows() > 0)
            return true;

        return false;
    }

    function save($data) {
        $lang = $data['lang'];
        unset($data['lang']);

        foreach($data as $key => $msg) {
            if($this->checkIfTypeExist($key, $lang)) {
                $this->db->set('msg', $msg);
                $this->db->where('type', $key);
                $this->db->where('lang', $lang);

                $this->db->update('Sharify_templates');
            } else {
                $insertdata = array(
                    'type'  => $key,
                    'msg'   => $msg,
                    'lang'  => $lang
                );

                $this->db->insert('Sharify_templates', $insertdata);
            }
        }
    }
}
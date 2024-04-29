<?php

class Language extends CI_Model {

    /**
     * Get all languages from the language table
     * @return mixed
     */
    public function getAll()
    {
        $this->db->select('*');
        $this->db->from('Sharify_language');
        $this->db->order_by('name', 'ASC');

        $query = $this->db->get();

        return $query->result();
    }

    public function save($data) {
        $insertdata = array(
            'name' => $data['name'],
            'path' => $data['path']
        );

        if($this->db->insert('Sharify_language', $insertdata))
        {
            return TRUE;
        }
    }

    public function makedefault($path) {
        if($this->db->update('Sharify_settings', array('language' => $path))) {
            return TRUE;
        }
    }

    public function delete($id) {
        $this->db->where('id', $id);

        if($this->db->delete('Sharify_language')) {
            return TRUE;
        }
    }
}
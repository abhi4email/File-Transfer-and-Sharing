<?php

/**
 * Class Receivers
 */
class Receivers extends CI_Model {
    /**
     * Checks if receiver exists for upload
     *
     * @param $upload_id
     * @param $private_id
     * @return array
     */
    function getByUploadAndPrivateID($upload_id, $private_id) {
        $this->db->select('*');
        $this->db->where('upload_id', $upload_id);
        $this->db->where('private_id', $private_id);
        $this->db->from('Sharify_receivers');

        $query = $this->db->get();

        return $query->row_array();
    }

    /**
     * Get receivers by upload id
     *
     * @param $upload_id
     * @return array
     */
    function getByUploadID($upload_id) {
        $this->db->select('*');
        $this->db->where('upload_id', $upload_id);
        $this->db->from('Sharify_receivers');

        $query = $this->db->get();

        return $query->result_array();
    }

    /**
     * Check if the download has already been downloaded by the recipient
     *
     * @param $upload_id
     * @param $private_id
     * @return bool
     */
    function checkAlreadyDownloaded($upload_id, $private_id) {
        $this->load->model('downloads');

        $receiver = $this->getByUploadAndPrivateID($upload_id, $private_id);
        if(is_array($receiver)) {
            $download = $this->downloads->getByUploadIDAndEmail($upload_id, $receiver['email']);
            // Check data
            if($download !== false) {
                // Yup, email has already been sent
                return true;
            }
        }
        return false;
    }

    /**
     * Functions adds new row to Sharify_receivers table
     * @param $upload_id
     * @param $email
     * @param $private_id
     * @return bool
     */
    function add($upload_id, $email, $private_id) {
        $data = array(
            'upload_id'     => $upload_id,
            'email'         => $email,
            'private_id'    => $private_id
        );

        return $this->db->insert('Sharify_receivers', $data);
    }

    /**
     * Delete receivers from table by ID
     *
     * @param $id
     * @return bool
     */
    function deleteByUploadID($id) {
        $this->db->where('upload_id', $id);
        if($this->db->delete('Sharify_receivers')) {
            return true;
        }
        return false;
    }
}
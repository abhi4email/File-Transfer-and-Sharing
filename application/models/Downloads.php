<?php

/**
 * Class Downloads
 */
class Downloads extends CI_Model {
    /**
     * Downloads constructor.
     */
    function __construct() {
        parent::__construct();
    }

    /**
     * Will return all downloads from the Sharify_downloads table
     *
     * @param int $start
     * @param int $limit
     * @return array|bool
     */
    function getAll($start = 0, $limit = 0) {
        $this->db->select('*');
        $this->db->from('Sharify_downloads');
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
     * Will return total amount of rows in the Sharify_downloads table
     *
     * @return int
     */
    function getTotal() {
        $this->db->select('id');
        $this->db->from('Sharify_downloads');

        $query = $this->db->get();

        return $query->num_rows();
    }

    /**
     * Will return the total that
     *
     * @return int
     */
    function getTotalSize() {
        $query = $this->db->query("SELECT SUM(Sharify_uploads.size) AS `total` FROM Sharify_downloads
        LEFT JOIN Sharify_uploads ON Sharify_downloads.download_id = Sharify_uploads.upload_id");

        return $query->row_object()->total;
    }

    /**
     * Returns the total downloads by ID
     *
     * @param $upload_id
     * @return int
     */
    function getTotalByUploadID($upload_id) {
        $this->db->select('*');
        $this->db->from('Sharify_downloads');
        $this->db->where('download_id', $upload_id);

        $query = $this->db->get();

        return $query->num_rows();
    }

    /**
     * Select a download using the download_id
     *
     * @param $upload_id
     * @return array|bool
     */
    function getByUploadID($upload_id) {
        $this->db->select('*');
        $this->db->from('Sharify_downloads');
        $this->db->where('download_id', $upload_id);
        $this->db->limit(1);

        $query = $this->db->get();

        if($query->num_rows() > 0) {
            return $query->row_array();
        }
        return false;
    }

    /**
     * Get download by upload ID and email
     *
     * @param $upload_id
     * @param $email
     * @return array|bool
     */
    function getByUploadIDAndEmail($upload_id, $email) {
        $this->db->select('*');
        $this->db->from('Sharify_downloads');
        $this->db->where('download_id', $upload_id);
        $this->db->where('email', $email);
        $this->db->limit(1);

        $query = $this->db->get();

        if($query->num_rows() > 0) {
            return $query->row_array();
        }
        return false;
    }

    /**
     * Insert new download in downloads table
     *
     * @param $data
     * @return bool
     */
    function insert($data) {
        if($this->db->insert('Sharify_downloads', $data)) {
            return true;
        }
    }

    /**
     * Get the most downloaded upload
     *
     * @return mixed
     */
    function getMostDownloaded() {
        $query = $this->db->query("SELECT download_id, COUNT(*) AS total FROM Sharify_downloads GROUP BY download_id ORDER BY total DESC LIMIT 1");

        return $query->row_array();
    }

    /**
     * Delete download from table by ID
     *
     * @param $id
     * @return bool
     */
    function delete($id) {
        $this->db->where('id', $id);
        if($this->db->delete('Sharify_downloads')) {
            return true;
        }
        return false;
    }

    /**
     * Delete download from table by ID
     *
     * @param $id
     * @return bool
     */
    function deleteByDownloadID($id) {
        $this->db->where('download_id', $id);
        if($this->db->delete('Sharify_downloads')) {
            return true;
        }
        return false;
    }
}
<?php

/**
 * Class Uploads
 */
class Uploads extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    /**
     * Will return all uploads from the Sharify_uploads table
     *
     * @param int $start
     * @param int $limit
     * @return array|bool
     */
    function getAll($start = 0, $limit = 0) {
        $this->db->select('*, (SELECT COUNT(*) FROM Sharify_downloads WHERE Sharify_downloads.download_id = Sharify_uploads.upload_id) AS total_downloads');
        $this->db->from('Sharify_uploads');
        $this->db->order_by('Sharify_uploads.id', 'DESC');

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
     * @param bool|string $status
     * @return int
     */
    function getTotal($status = false) {
        $this->db->select('*');

        if($status !== false) {
            $this->db->where('status', $status);
        }

        $this->db->from('Sharify_uploads');

        $query = $this->db->get();

        return $query->num_rows();
    }

    /**
     * Select an upload using the upload_id
     *
     * @param $upload_id
     * @return array|bool
     */
    function getByUploadID($upload_id) {
        $this->db->select('*');
        $this->db->from('Sharify_uploads');
        $this->db->where('upload_id', $upload_id);
        $this->db->limit(1);
        
        $query = $this->db->get();
        
        if($query->num_rows() > 0) {
            return $query->row_array();
        }
        return false;
    }

    /**
     * Get uploads by their status
     *
     * @param $status
     * @return array|bool
     */
    function getByStatus($status) {
        $this->db->select('*');
        $this->db->from('Sharify_uploads');
        $this->db->where('status', $status);

        $query = $this->db->get();

        if($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    /**
     * Returns expired uploads
     *
     * @return array|bool
     */
    function getExpiringUploads() {
        $this->db->select('*');
        $this->db->from('Sharify_uploads');
        $this->db->group_start()
                 ->where('status', 'ready')
                 ->or_where('status', 'inactive')
                 ->group_end();
        $this->db->where('time_expire <', time());
        $this->db->where('time_expire != time');
        
        $query = $this->db->get();
        
        if($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    /**
     * Update the upload status by upload_id
     *
     * @param $status
     * @param $upload_id
     * @return bool
     */
    function updateStatusByUploadID($status, $upload_id) {
        $update = array(
            'status'    => $status
        );

        $this->db->where('upload_id', $upload_id);
        if($this->db->update('Sharify_uploads', $update)) {
            return true;
        }
        return false;
    }
    
    /**
     * Generate an unique upload ID
     *
     * @return string|boolean
     */
    function genUploadID($len = 8) {
        do {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $upload_ID = '';
            for ($i = 0; $i < $len; $i++) {
                $upload_ID .= $characters[rand(0, $charactersLength - 1)];
            }

            if(!$this->getByUploadID($upload_ID)) {
                break;
            }
        }
        while(true === true);

        if(!empty($upload_ID)) {
            return $upload_ID;
        }
        return false;
    }

    /**
     * Register the new upload in the DB
     *
     * @param $post
     * @return bool
     */
    function register($post) {
        // Check if expire time is giving via post
        if(isset($post['expire']) && !empty($post['expire']) && in_array($post['expire'], explode(',',$this->config->item('expire')))) {
            $expire = $post['expire'];
        } else {
            $expire = explode(',',$this->config->item('expire'))[0];
        }

        $insert = array(
            'upload_id'     => $post['upload_id'],
            'email_from'    => ($post['share'] == 'link' ? '' : $post['email_from']),
            'message'       => $post['message'],
            'password'      => $post['password'],
            'secret_code'   => md5(time() . rand() . rand() . rand()),
            'destruct'      => $post['destruct'],
            'share'         => $post['share'],
            'time'          => time(),
            'ip'            => ($this->config->item('disable_ip_logging') == 'true' ? '' : $this->input->ip_address()),
            'time_expire'   => (time() + (int) $expire),
            'status'        => 'processing',
            'lang'          => $post['language'],
            'file_previews' => $post['file_previews']
        );

        // This should be improved en moved to a more suitable place in the future...
        if(isset($_SESSION['Sharify_premium'])) {
            $insert['pm_email'] = $_SESSION['Sharify_premium'];
        }

        if($this->db->insert('Sharify_uploads', $insert)) {
            return true;
        }
        return false;
    }

    /**
     * Add file to total files in uploads row
     *
     * @param $upload_id
     * @param $size
     * @return bool
     */
    function addFile($upload_id, $size) {
        $this->db->query("UPDATE Sharify_uploads SET `count` = (`count` + 1), `size` = (`size` + ?) WHERE upload_id = ?", array($size, $upload_id));

        return false;
    }

    /**
     * Store the encryption key in the database
     *
     * @param $upload_id
     * @param $key
     * @return bool
     */
    function storeEncryptKey($upload_id, $key) {
        $update = array(
            'encrypt'    => $key
        );

        $this->db->where('upload_id', $upload_id);
        if($this->db->update('Sharify_uploads', $update)) {
            return true;
        }
        return false;
    }

    /**
     * Mark upload as complete
     *
     * @param $data
     * @return bool
     */
    function complete($data) {
        $update = array(
            'status' => 'ready'
        );

        $this->db->where('upload_id', $data['upload_id']);
        $this->db->where('status', 'processing');
        if($this->db->update('Sharify_uploads', $update)) {
            return true;
        }
        return false;
    }

    /**
     * Returns the total storage that's being used right now
     *
     * @return mixed
     */
    function getTotalStorageUsed() {
        $query = $this->db->query("SELECT SUM(`size`) AS `total` FROM Sharify_uploads WHERE `status` = 'ready'");

        return $query->row_object()->total;
    }

    /**
     * Returns the last upload
     *
     * @return array
     */
    function getLastUpload() {
        $this->db->select('*');
        $this->db->from('Sharify_uploads');
        $this->db->order_by('time', 'DESC');
        $this->db->limit(1);

        $query = $this->db->get();

        return $query->row_array();
    }

    /**
     * Update the expiration time of an upload
     *
     * @param $new_time
     * @param $upload_id
     * @return bool
     */
    function updateExpireTime($new_time, $upload_id) {
        $update = array(
            'time_expire' => $new_time
        );

        $this->db->where('upload_id', $upload_id);
        if($this->db->update('Sharify_uploads', $update)) {
            return true;
        }
    }

    /**
     * Update encrypt value in db
     *
     * @param $encrypt
     * @param $upload_id
     * @return bool
     */
    function updateEncrypt($encrypt, $upload_id) {
        $update = array(
            'encrypt' => $encrypt
        );

        $this->db->where('upload_id', $upload_id);
        if($this->db->update('Sharify_uploads', $update)) {
            return true;
        }
    }

    /**
     * Update row by upload id
     *
     * @param $upload_id
     * @param $data
     * @return bool
     */
    function updateByUploadID($upload_id, $data) {
        $this->db->where('upload_id', $upload_id);
        if($this->db->update('Sharify_uploads', $data)) {
            return true;
        }
    }

    /**
     * Delete upload from table by ID
     *
     * @param $id
     * @return bool
     */
    function delete($id) {
        $this->db->where('id', $id);
        if($this->db->delete('Sharify_uploads')) {
            return true;
        }
        return false;
    }
}
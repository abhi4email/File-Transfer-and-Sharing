<?php

/**
 * Class CronLib
 */
class CronLib
{
    protected $CI;

    /**
     * CronLib constructor.
     */
    public function __construct() {
        $this->CI =& get_instance();
        
        // Load models
        $this->CI->load->model('files');
        $this->CI->load->model('uploads');
        
        $this->CI->load->library('UploadLib');
        $this->CI->load->library('Plugin');
    }

    /**
     * Check for expired files
     */
    public function checkFiles() {
        $data = $this->CI->files->getIncompleteUploads();
        
        // Check data returned
        if($data !== false) {
            foreach($data as $row) {
                // Delete the upload
                $this->CI->uploadlib->deleteUpload($row['upload_id']);
            }
        }
    }
    
    /**
     * Check for expired uploads
     */
    public function checkUploads() {
        // Get expiring uploads from the DB
        $uploads = $this->CI->uploads->getExpiringUploads();
        
        // Check if upload returned
        if($uploads !== false) {
            foreach($uploads as $upload) {
                // Delete the upload
                $this->CI->uploadlib->deleteUpload($upload['upload_id']);
            }
        }
    }

    /**
     * Will remove old data from the DB (1 Month)
     * This needs to be enabled in the application/config/config.php file
     */
    public function deleteOldData() {
        $this->CI->load->model('downloads');
        $this->CI->load->model('receivers');

        if($this->CI->config->item('delete_old_data') == true) {
            $get_data = $this->CI->uploads->getByStatus('destroyed');
            foreach($get_data AS $row) {
                if(time() >= $row['time'] + 2628000) {
                    $this->CI->uploads->delete($row['id']);
                    $this->CI->downloads->deleteByDownloadID($row['upload_id']);
                    $this->CI->files->deleteFilesByUploadID($row['upload_id']);
                    $this->CI->receivers->deleteByUploadID($row['upload_id']);
                }
            }
        }
    }

    /**
     * Will remove emails from the email_verify table that are
     * pending for more than 1 hour
     */
    public function deleteOldEmailVerify() {
        $this->CI->load->model('emailverify');

        $this->CI->emailverify->deleteOldPending();
    }

    /**
     * Will remove old data from the temp directory
     * It uses the file time to determine the expire time
     */
    public function purgeTempData() {
        $dir = new DirectoryIterator(FCPATH . $this->CI->config->item('upload_dir') . 'temp');
        foreach ($dir as $file) {
            if (!$file->isDot()) {
                if($file->getFilename() != '.htaccess') {
                    $file_path = FCPATH . $this->CI->config->item('upload_dir') . 'temp/' . $file->getFilename();

                    if (file_exists($file_path)) {
                        if (time() > filectime($file_path) + 43200) {
                            unlink($file_path);
                        }
                    }
                }
            }
        }
    }

    public function runPluginCrons() {
        foreach($this->CI->plugin->_crons AS $cron) {
            require_once APPPATH . 'plugins/' . $cron;
        }
    }
}
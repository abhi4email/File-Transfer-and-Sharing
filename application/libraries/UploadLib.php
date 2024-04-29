<?php

/**
 * Uploads library
 *
 * @version 1.0
 * @author Abhi
 */
class UploadLib {
    private $CI;

    /**
     * Upload constructor.
     */
    function __construct()
    {
        $this->CI =& get_instance();
    }


    public function markDelete($upload_id)
    {
        $upload = $this->CI->uploads->getByUploadID($upload_id);

        if ($upload !== FALSE)
        {
            $new_time = (time() + 10800);

            $this->CI->uploads->updateStatusByUploadID('inactive', $upload_id);
            $this->CI->uploads->updateExpireTime($new_time, $upload_id);

            $this->CI->logging->log("$upload_id > Marked for deletion on $new_time");

            // Send email to uploader
            $this->CI->load->library('email');

            // Send email to uploader
            $this->CI->email->sendEmail('destroyed', array('upload_id' => $upload['upload_id']), array($upload['email_from']), $upload['lang']);

            return true;
        }
        return false;
    }

    /**
     * Delete upload from storage and mark destroyed in database
     *
     * @param $upload_id
     * @return bool
     */
    public function deleteUpload($upload_id)
    {
        // Load models
        $this->CI->load->model('uploads');
        $this->CI->load->model('files');

        $this->CI->load->helper('file_helper');

        $upload = $this->CI->uploads->getByUploadID($upload_id);

        $this->CI->logging->log($upload_id.' > Trying to delete upload');

        // Check if upload exists
        if ($upload !== FALSE)
        {
            // If single file uploaded
            if ($upload['count'] == 1)
            {
                // Single file
                $files = $this->CI->files->getByUploadID($upload_id);

                foreach ($files as $file)
                {
                    $file_name = $file['secret_code'] . '-' . $file['file'];
                    $path = FCPATH . $this->CI->config->item('upload_dir') . $file_name;
                }
            }
            else
            {
                // Check if the upload is an upload with file previews, if so then also delete directory with files
                if($upload['file_previews'] == 'true') {
                    $dir_path = FCPATH . $this->CI->config->item('upload_dir') . $upload_id;

                    if(file_exists($dir_path)) {
                        delete_files($dir_path, TRUE);
                        rmdir($dir_path);
                    }
                }

                // Zip file
                $file_name = $this->CI->config->item('name_on_file') . '-' . $upload_id . '.zip';
                $path = FCPATH . $this->CI->config->item('upload_dir') . $file_name;
            }

            $this->CI->logging->log($upload_id . ' > Deleting file '.$path);

            // Check if the file exists
            if (file_exists($path))
            {
                $this->CI->logging->log($upload_id . ' > Deleted '.$path);
                // Destroy it
                unlink($path);
            }

            // Check if there's any external storage plugin installed
            $this->CI->load->library('plugin');
            if ($this->CI->plugin->pluginLoaded('upload'))
            {
                $this->CI->logging->log($upload_id . ' > Deleting from external source');

                $upload_plugin = $this->CI->plugin->_plugins['upload'];

                require_once $this->CI->plugin->_pluginDir . $upload_plugin['load'] . '/' . $upload_plugin['handler_library'];

                try {
                    $handlerLibrary = new HandlerLibrary();
                    $handlerLibrary->delete($file_name);

                    if($upload['file_previews'] == 'true' && $upload['count'] > 1) {
                        $files = $this->CI->files->getByUploadID($upload_id);

                        foreach ($files as $file) {
                            $external_path = $upload_id . '/' . $file['secret_code'] . '-' . $file['file'];
                            $handlerLibrary->delete($external_path);
                        }

                        $handlerLibrary->delete($upload_id); // Delete the directory
                    }
                } catch(Exception $e) {
                    error_log($e);
                }

                $this->CI->logging->log($upload_id . ' > Deleted from external source');
            }

            // Mark upload destroyed when file has been deleted
            $this->CI->uploads->updateStatusByUploadID('destroyed', $upload_id);
            $this->CI->logging->log($upload_id . ' > Status updated to destroyed');

            // Check if the share type is email
            if($upload['share'] == 'mail') {
                if($upload['status'] !== 'inactive') {
                    // Send email to uploader
                    $this->CI->load->library('email');

                    // Send email to uploader
                    $this->CI->email->sendEmail('destroyed', array('upload_id' => $upload['upload_id']), array($upload['email_from']), $upload['lang']);
                }
            }

            return true;
        }
        return false;
    }

    /**
     * Delete upload by upload ID and matching secret
     *
     * @param $upload_id
     * @param $secret
     * @return bool
     */
    public function deleteUploadBySecret($upload_id, $secret) {
        $upload = $this->CI->uploads->getByUploadID($upload_id);

        // Check if upload exists and secret matches
        if($upload !== FALSE && $upload['secret_code'] == $secret) {
            $this->CI->logging->log($upload_id . ' > Upload deleted using secret code');

            return $this->deleteUpload($upload_id);
        }
        return false;
    }
}
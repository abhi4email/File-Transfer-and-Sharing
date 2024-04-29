<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Force Download
 *
 * Generates headers that force a download to happen
 *
 * @access    public
 * @param    string    filename
 * @param    mixed    the data to be downloaded
 * @return    void
 */
if ( ! function_exists('force_download'))
{
    function force_download($filename = '', $file = '', $delete_after = false, $decrypt = false, $decryptkey = '', $size = 0, $inline = false)
    {
        if ($filename == '' OR $file == '')
        {
            error_log('Filename or path was empty');
            return FALSE;
        }

        // Try to determine if the filename includes a file extension.
        // We need it in order to set the MIME type
        if (FALSE === strpos($filename, '.'))
        {
            error_log('File does not have an extension');
            return FALSE;
        }

        // Grab the file extension
        $x = explode('.', $filename);
        $extension = end($x);

        // Load the mime types
        $mimes = include(APPPATH.'config/mimes.php');

        // Set a default mime if we can't find it
        if ( ! isset($mimes[$extension]))
        {
            $mime = 'application/octet-stream';
        }
        else
        {
            $mime = (is_array($mimes[$extension])) ? $mimes[$extension][0] : $mimes[$extension];
        }

        if($size == 0) {
            $size = filesize($file);
        }

        // Generate the server headers
        if (strpos($_SERVER['HTTP_USER_AGENT'], "MSIE") !== FALSE)
        {
            header('Content-Type: "'.$mime.'"');
            header('Content-Disposition: '.($inline ? 'inline' : 'attachment').'; filename*=UTF-8\'\''.rawurlencode($filename).'; filename="'.$filename.'"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header("Content-Transfer-Encoding: binary");
            header('Pragma: public');
            header("Content-Length: ".$size);
        }
        else
        {
            header('Content-Type: "'.$mime.'"');
            header('Content-Disposition: '.($inline ? 'inline' : 'attachment').'; filename*=UTF-8\'\''.rawurlencode($filename).'; filename="'.$filename.'"');
            header("Content-Transfer-Encoding: binary");
            header('Expires: 0');
            header('Pragma: no-cache');
            header("Content-Length: ".$size);
        }

        readfile_chunked($file, $decrypt, $decryptkey);

        if($delete_after)
            unlink($file);

        die;
    }
}

/**
 * readfile_chunked
 *
 * Reads file in chunks so big downloads are possible without changing PHP.INI
 *
 * @access    public
 * @param    string    file
 * @param    boolean    return bytes of file
 * @return    void
 */
if ( ! function_exists('readfile_chunked'))
{
    function readfile_chunked($file, $decrypt = FALSE, $decryptkey = '', $retbytes=TRUE)
    {
        session_write_close();

        if($decrypt) {
            $key = substr(sha1($decryptkey, true), 0, 16);
            $blocks = 10000;

            if ($fpIn = fopen($file, 'r')) {
                // Get the initialzation vector from the beginning of the file
                $iv = fread($fpIn, 16);

                while (!feof($fpIn)) {
                    $ciphertext = fread($fpIn, 16 * ($blocks + 1)); // we have to read one block more for decrypting than for encrypting
                    $plaintext = openssl_decrypt($ciphertext, 'AES-128-CBC', $key, OPENSSL_RAW_DATA, $iv);

                    // Use the first 16 bytes of the ciphertext as the next initialization vector
                    $iv = substr($ciphertext, 0, 16);

                    //echo $plaintext;
                    echo $plaintext;
                    ob_flush();
                    flush();
                }
                fclose($fpIn);
            }
            else
            {
                error_log('Could not open source file');
            }
        }
        else
        {
            $chunksize = 1 * (1024 * 1024);
            $cnt = 0;

            $handle = fopen($file, 'r');
            if ($handle === FALSE)
            {
                return FALSE;
            }

            while ( ! feof($handle))
            {
                $buffer = fread($handle, $chunksize);
                echo $buffer;
                ob_flush();
                flush();

                if ($retbytes)
                {
                    $cnt += strlen($buffer);
                }
            }

            $status = fclose($handle);

            if ($retbytes AND $status)
            {
                return $cnt;
            }

            return $status;
        }
    }
}
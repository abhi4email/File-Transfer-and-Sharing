<?php
/**
 * Recaptcha Helper
 *
 * @author: Daan - Abhi
 *
 */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if(!function_exists('validate_recaptcha')) {
    /**
     * Validate recaptcha
     *
     * @param $response
     * @param $secret
     *
     * @return mixed
     */
    function validate_recaptcha($response, $secret){
        $data = array(
            'secret' => $secret,
            'response' => $response
        );

        $verify = curl_init();
        curl_setopt($verify, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
        curl_setopt($verify, CURLOPT_POST, true);
        curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($verify, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($verify);

        $captcha_response = json_decode($response);

        return $captcha_response->success;
    }
}
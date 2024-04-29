<?php
/**
 * Sharify - Online file sharing
 * Language
 * @lang English
 * @author Daan (Abhi)
 */

defined('BASEPATH') OR exit('No direct script access allowed');

$lang = array(
    'share_files' 				=> "Share file(s)",
    'ok' 		   				=> "Okay",
    'close' 					=> "Close",
    'files' 					=> "Files",
    'link' 						=> "Link",
    'email' 					=> "E-Mail",
    'success' 					=> "Success!",
    'password'        			=> "Password",
    'message' 					=> "Message",
    'download' 					=> "Download",
    'destruct' 					=> "Destruct",
    'select_files' 				=> "Select file(s)",
    'add_more' 					=> "Add more",
    'total_size' 				=> "Total size",
    'total_files'				=> "Total files",
    'download_id' 				=> "Download id",
    'add_password' 				=> "Add password",
    'upload_error' 				=> "Upload error!",
    'wrong_pass' 				=> "Invalid password!",
    'enter_email' 				=> "Enter email to send to",
    'enter_own_email' 			=> "Enter your email",
    'fill_fields' 				=> "Fill in all fields properly!",
    'message_receiver' 			=> "Message to the receiver",
    'enable_destuct' 			=> "Enable self destruct?",
    'file_too_large' 			=> "Some files were too large.",
    'fill_password' 			=> "Please fill in the password below",
    'download_started' 			=> "Your download has started",
    'upload_not_found' 			=> "Upload not found, it may have been destroyed",
    'processing_files' 			=> "Processing file(s) and generating link, please be patient.",
    'success_link' 				=> "Your file(s) have been uploaded, you can use the link below.",
    'success_email' 			=> "Your file(s) have been uploaded, you can expect an email shortly.",

    //Added in update 1.0.2
    'select_share'              => "Select how to share:",
    'file_blocked'              => "These file(s) are not allowed !",

    //Added in update 1.0.4
    'report_file'               => "Report file",
    'report_file_text'          => "Are you sure you want to report this file ?",
    'report'                    => "Report",
    'max_files'                 => "Too many files selected !",

    //Added in update 1.0.7
    'yes'                       => "Yes",
    'no'                        => "No",
    'max'                       => "Max.",
    'upload_settings'           => "Upload settings",
    'change_language'           => "Change language",
    'terms_service'             => "Terms of service",
    'about_us'                  => "About us",
    'protect_with_pass'         => "Protect with password",
    'destruct_file'             => "Destruct the file",
    'leave_empty_password'      => "Leave empty to disable password",
    'share_type'                => "Share type",
    'share_type_text'           => "You can share the upload by email so the recipients will receive an email or share by link and copy the url and share it with everyone you want.",
    'destruct_text'             => "The upload will destruct itself after all the recipients have downloaded the file.",
    'password_text'             => "Your upload can only be downloaded by entering a password.",
    'select_pref_lang'          => "Select your prefered language",
    'select_language'           => "Select language",
    'copy_url'                  => "Copy URL",
    'sign_in'                   => "Sign in",
    'invalid_login'             => "Login incorrect",
    'upload_processing'         => "We are processing your file, please come back later.",
    'not_allowed'               => "You are not allowed to view this file.",
    'invalid_pass'              => "Invalid password",
    'msg_seconds'               => "Second(s)",
    'msg_minutes'               => "Minute(s)",
    'msg_hours'                 => "Hour(s)",
    'msg_remaining'             => "remaining",
    'remaining'                 => "remaining",
    'save'                      => "Save",

    //Added in update 1.2
    'not_available_pass'        => "(Premium required)",

    //Added in update 1.2.2
    'uploaded_of'               => "uploaded of",
    'cancel'                    => "Cancel",
    'destructed_on'             => "Destructed at",
    'open'                      => "Open",
    'accept_terms'              => "You will need to accept our Terms of service to proceed to our website.",
    'accept'                    => "Accept",

    //Added in update 1.2.3
    'view_terms'                => "View terms",

    //Added in update 1.2.6
    'month'                     => "month",
    'week'                      => "week",
    'day'                       => "day",
    'hour'                      => "hour",
    'months'                    => "months",
    'weeks'                     => "weeks",
    'days'                      => "days",
    'hours'                     => "hours",

    //Added in update 1.2.7
    'drop_files_here'           => "Drop your files here",

    //Added in update 1.4.6
    'are_you_sure'              => "Are you sure ?",

    // Added in update 2.0
    'login'                     => "Login",
    'user_login'                => "User login",

    // Added in update 2.0.3
    'logout'                    => "Logout",

    // Added in update 2.1.4
    'contact'                   => "Contact",
    'subject'                   => "Subject",
    'send'                      => "Send",
    'message_sent'              => "Your message has been sent !",

    // Added in update 2.1.5
    'contact_email_description'   => 'Your email address',
    'contact_subject_description' => 'Your subject',
    'contact_message_description' => 'Your message',
  
    // Added in update 2.1.6
    'invalid_email'               => "The entered email isn't a valid email address",

    // Added in update 2.2.6
    'add_more_files'              => 'Add file(s)',
    'email_to'                    => 'Email to',
    'email_from'                  => 'Email from',
    'how_to_share_file'           => 'How to share the file?',
    'send_using_email'            => 'Send using email',
    'get_sharable_link'           => 'Get a sharable link',
    'protect_upload_password'     => 'Protect the upload with a password',
    'when_file_expire'            => 'When should the file expire?',
    'upload'                      => 'Upload',
    'lets_begin_files'            => "Let's begin by adding some files",
    'files_selected'              => "files selected",
    'selected'                    => "selected",
    'recipient_exists'            => "Recipient already exists",
    'upload_more'                 => "Upload more",
    'refresh'                     => "Refresh",
    'download_will_be_deleted'    => "It will expire on",
    'download_is_ready'           => "Your download is ready",
    'delete'                      => "Delete",

    // Added in update 2.3.6
    'internet_down'               => 'Unable to reach the server, is your internet down?',
    'do_not_expire'               => 'Do not expire',
    'select_recipient'            => '- Select recipient -',

    // Added in update 2.3.9
    'verify_email_title'          => "Verify your email",
    'verify_email_desc'           => "We'll need to know it's really you, so we've sent a verification code to",
    'enter_verify_code'           => "Enter verification code",
    'verify'                      => "Verify",
    'incorrect_verify'            => "The verification code was incorrect!",

    // Added in update 2.4.1
    'error'                       => "Error",
    'download_browser_unsupported'=> "Your browser doesn't support in-app downloading, please open the URL in your mobile browser.",

    // Added in update 2.4.4
    'unlock_download'             => "Unlock download",
    'preview_files'               => "Preview files",

    // Added in update 2.4.5
    'copied'                      => "Copied!",

    // Added in update 2.4.6
    'login_email'                 => "Email",
    'login_password'              => "Password",
    'never'                       => "Never",
    'add_folders'                 => "Add folder(s)",
    'or_select_folder'            => "Or select folder",

    // Added in update 2.4.8
    'are_you_sure_delete'         => "Are your sure you want to delete this file?"
);
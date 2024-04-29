<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
*/

$hook['post_controller_constructor'][] = array( 
    'class'    => 'ConfigHook',
    'function' => 'getSettings',
    'filename' => 'ConfigHook.php',
    'filepath' => 'hooks'
);
$hook['post_controller_constructor'][] = array(
    'class'    => 'ConfigHook',
    'function' => 'loadLanguage',
    'filename' => 'ConfigHook.php',
    'filepath' => 'hooks'
);
$hook['post_controller_constructor'][] = array(
    'class'    => 'ConfigHook',
    'function' => 'loadPlugins',
    'filename' => 'ConfigHook.php',
    'filepath' => 'hooks'
);
<?php
/**
 * Sharify - Online file sharing
 * Language
 * @lang Spanish
 * @author Alexandro
 */

defined('BASEPATH') OR exit('No direct script access allowed');

$lang = array(
    'share_files' 				=> "Compartir archivo(s)",
    'ok' 		   				=> "Ok",
    'close' 					=> "Cerrar",
    'files' 					=> "Archivos",
    'link' 						=> "Enlace",
    'email' 					=> "E-Mail",
    'success' 					=> "¡Correcto!",
    'password'        			=> "Contraseña",
    'message' 					=> "Mensaje",
    'download' 					=> "Descarga",
    'destruct' 					=> "Destruir",
    'select_files' 				=> "Seleccionar archivo(s)",
    'add_more' 					=> "Añadir más",
    'total_size' 				=> "Tamaño total",
    'total_files'				=> "Archivos totales",
    'download_id' 				=> "Id de descarga",
    'add_password' 				=> "Añadir contraseña",
    'upload_error' 				=> "¡Hubo un error al subirlo!",
    'wrong_pass' 				=> "¡Contraseña incorrrecta!",
    'enter_email' 				=> "Introduce email al que mandar el enlace",
    'enter_own_email' 			=> "Introduce tu email",
    'fill_fields' 				=> "¡Hay que rellenar todos los huecos!",
    'message_receiver' 			=> "Mensaje para el receptor",
    'download_started' 			=> "La descarga se ha iniciado...",
    'enable_destuct' 			=> "Activar autodestrucción",
    'file_too_large' 			=> "Algunos archivos son demasiado grandes.",
    'fill_password' 			=> "Por favor, introduce la contraseña aquí abajo",
    'download_started' 			=> "Procesando su descarga, por favor espera",
    'upload_not_found' 			=> "No se ha encontrado la descarga, ¿quizá se ha destruido?",
    'processing_files' 			=> "Procesando su archivo(s) y generando enlace, por favor, se paciente.",
    'success_link' 				=> "Su(s) archivo(s) se han subido, puedes usar el enlace que hay debajo.",
    'success_email' 			=> "Su(s) archivo(s) se han subido, le llegará un email en breve.",

    //Added in update 1.0.2
    'select_share'              => "Selecciona cómo compartirlo:",
    'file_blocked'              => "Este tipo de archivo(s) no están permitidos.",

    //Added in update 1.0.4
    'report_file'               => "Reportar archivo",
    'report_file_text'          => "¿Seguro que quieres reportar el archivo?",
    'report'                    => "Reportar",
    'max_files'                 => "Demasiados archivos seleccionados",

    //Added in update 1.0.7
    'yes'                       => "Sí",
    'no'                        => "No",
    'max'                       => "Max.",
    'upload_settings'           => "Ajustes de subidas",
    'change_language'           => "Cambiar idioma",
    'terms_service'             => "Términos del servicio",
    'about_us'                  => "Sobre mi",
    'protect_with_pass'         => "Proteger con contraseña",
    'destruct_file'             => "Destruir el archivo",
    'leave_empty_password'      => "Dejar en blanco para desactivar la contraseña",
    'share_type'                => "Forma de compartirlo",
    'share_type_text'           => "Puedes compartir el enlace por email así que los receptores recebirán un correo electrónico, o comparte un enlace con quien quieras donde quieras.",
    'destruct_text'             => "La subida se autodestruirá cuando todos los receptores hayan descargado los archivos.",
    'password_text'             => "Tu subida sólo puede descargarse introduciendo la contraseña.",
    'select_pref_lang'          => "Selecciona tu idioma preferido",
    'select_language'           => "Seleccionar idioma",
    'copy_url'                  => "Copiar URL",
    'sign_in'                   => "Iniciar sesión",
    'invalid_login'             => "Inicio de sesión incorrecto",
    'upload_processing'         => "Estamos procesando tu(s) archivo(s), por favor vuelve más tarde.",
    'not_allowed'               => "No estás autorizado para ver este archivo.",
    'invalid_pass'              => "Contraseña incorrecta",
    'msg_seconds'               => "Segundo(s)",
    'msg_minutes'               => "Minuto(s)",
    'msg_hours'                 => "Hora(s)",
    'msg_remaining'             => "restante",
    'remaining'                 => "restante",
    'save'                      => "Guardar",

    //Added in update 1.2
    'not_available_pass'        => "(Suscripción Premium requerida)",

    //Added in update 1.2.2
    'uploaded_of'               => "subido el",
    'cancel'                    => "Cancelar",
    'destructed_on'             => "Destruido el",
    'open'                      => "Abrir",
    'accept_terms'              => "Necesitas aceptar los términos del servicio para seguir al sitio.",
    'accept'                    => "Aceptar",

    //Added in update 1.2.3
    'view_terms'                => "Ver términos",

    //Added in update 1.2.6
    'month'                     => "mes",
    'week'                      => "semana",
    'day'                       => "día",
    'hour'                      => "hora",
    'months'                    => "meses",
    'weeks'                     => "semanas",
    'days'                      => "días",
    'hours'                     => "horas",

    //Added in update 1.2.7
    'drop_files_here'           => "Arrastra tus archivos aquí",

    //Added in update 1.4.6
    'are_you_sure'              => "¿Estás seguro?",

    // Added in update 2.0
    'login'                     => "Iniciar sesión",
    'user_login'                => "Inicio de sesión",

    // Added in update 2.0.3
    'logout'                    => "Cerrar sesión",

    // Added in update 2.1.4
    'contact'                   => "Contactar",
    'subject'                   => "Asunto",
    'send'                      => "Enviar",
    'message_sent'              => "Tu mensaje se ha enviado",

    // Added in update 2.1.5
    'contact_email_description'   => 'Tu correo electrónico',
    'contact_subject_description' => 'Asunto',
    'contact_message_description' => 'Tu mensaje',

    // Added in update 2.1.6
    'invalid_email'               => "El correo electrónico introducido no es un email correcto",

    // Added in update 2.2.6
    'add_more_files'              => 'Añadir más archivos',
    'email_to'                    => 'Enviar correo electrónico a',
    'email_from'                  => 'Enviar correo electrónico desde',
    'how_to_share_file'           => '¿Cómo compartir el archivo?',
    'send_using_email'            => 'Enviar usando el email',
    'get_sharable_link'           => 'Obtener un enlace',
    'protect_upload_password'     => 'Proteger la subida con una contraseña',
    'when_file_expire'            => '¿Cuándo debe caducar el/los archivo/s subido/s?',
    'upload'                      => 'Cargar',
    'lets_begin_files'            => "Vamos a añadir unos archivos",
    'files_selected'              => "archivos seleccionados",
    'selected'                    => "seleccionados",
    'recipient_exists'            => "El receptor ya existe",
    'upload_more'                 => "Subir más",
    'refresh'                     => "Actualizar",
    'download_will_be_deleted'    => "Caducarán el",
    'download_is_ready'           => "Tu carga está lista",
    'delete'                      => "Borrar",

    // Added in update 2.3.6
    'internet_down'               => 'No se puede acceder al servidor, ¿se ha caído Internet?',
    'do_not_expire'               => 'No caduca',
    'select_recipient'            => '- Seleccionar receptor -',

    // Added in update 2.3.9
    'verify_email_title'          => "Verifica tu correo electrónico",
    'verify_email_desc'           => "Necesitaremos saber que eres realmente tú, así que hemos enviado un código de verificación a",
    'enter_verify_code'           => "Introduce el código de verificación",
    'verify'                      => "Verificar",
    'incorrect_verify'            => "El código de verificación no es correcto",

    // Added in update 2.4.1
    'error'                       => "Error",
    'download_browser_unsupported'=> "Su navegador no admite la descarga dentro de la aplicación, abra la URL en el navegador de su móvil.",

    // Added in update 2.4.4
    'unlock_download'             => "Desbloquear la descarga",
    'preview_files'               => "Previsualizar archivos",

    // Added in update 2.4.5
    'copied'                      => "Copiado!",

    // Added in update 2.4.6
    'login_email'                 => "Email",
    'login_password'              => "Password",
    'never'                       => "Never",
    'add_folders'                 => "Add folder(s)",
    'or_select_folder'            => "Or select folder",

    // Added in update 2.4.8
    'are_you_sure_delete'         => "Are your sure you want to delete this file?"

    // Please help translating Sharify by sending this fully translated file to support@Abhi.com
    // and we'll make sure to include it in the next update
);
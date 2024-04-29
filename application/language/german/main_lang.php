<?php
/**
 * Sharify - Online file sharing
 * Language
 * @lang German
 * @author Thomas
 */

defined('BASEPATH') OR exit('No direct script access allowed');

$lang = array(
    'share_files' 				=> "Datentransfer starten",
    'ok' 		   				=> "Okay",
    'close' 					=> "Schliessen",
    'files' 					=> "Datei(en)",
    'link' 						=> "Link",
    'email' 					=> "E-Mail",
    'success' 					=> "Abgeschlossen!",
    'password'        			=> "Passwort",
    'message' 					=> "Nachricht",
    'download' 					=> "Download",
    'destruct' 					=> "Löschen",
    'select_files' 				=> "Datei(en) auswählen",
    'add_more' 					=> "weitere E-Mailadressen",
    'total_size' 				=> "Gesamtgrösse",
    'total_files'				=> "Datei(en) insgesamt",
    'download_id' 				=> "Download id",
    'add_password' 				=> "Passwort hinzufügen",
    'upload_error' 				=> "Fehler beim Hochladen!",
    'wrong_pass' 				=> "Ungültiges Passwort!",
    'enter_email' 				=> "E-Mail des Empfänger",
    'enter_own_email' 			=> "E-Mail des Absenders",
    'fill_fields' 				=> "Bitte alle Felder ausfüllen!",
    'message_receiver' 			=> "Nachricht für den Empfänger",
    'download_started' 			=> "Der Download wurde gestartet...",
    'enable_destuct' 			=> "Nach dem Download löschen",
    'file_too_large' 			=> "Einige Dateien waren zu gross.",
    'fill_password' 			=> "Bitte geben Sie das Passwort ein",
    'download_started' 			=> "Bitte warten Sie, bis der Download abgeschlossen ist",
    'upload_not_found' 			=> "Datei(en) nicht gefunden, vielleicht wurden sie bereits gelöscht?",
    'processing_files' 			=> "Verarbeitung der Datei(en), Downloadlink wird erzeugt. Bitte haben Sie etwas Geduld.",
    'success_link' 				=> "Ihre Datei(en) wurden hochgeladen, Sie können den Link nun verwenden.",
    'success_email' 			=> "Ihre Datei(en) wurden hochgeladen, Sie werden in Kürze eine E-Mail erhalten.",

    //Added in update 1.0.2
    'select_share'              => "Wie wollen Sie teilen:",
    'file_blocked'              => "Diese Dateien sind nicht erlaubt!",

    //Added in update 1.0.4
    'report_file'               => "Datei melden",
    'report_file_text'          => "Sind Sie sicher, dass Sie diese Datei melden wollen?",
    'report'                    => "Melden",
    'max_files'                 => "Zu viele Dateien ausgewählt!",

    //Added in update 1.0.7
    'yes'                       => "Ja",
    'no'                        => "Nein",
    'max'                       => "Max.",
    'upload_settings'           => "Upload Einstellungen",
    'change_language'           => "Sprache ändern",
    'terms_service'             => "AGB",
    'about_us'                  => "Impressum",
    'protect_with_pass'         => "Mit Passwort schützen",
    'destruct_file'             => "Datei(en) automatisch löschen",
    'leave_empty_password'      => "Leer lassen, um das Kennwort zu deaktivieren",
    'share_type'                => "Transfer Möglichkeiten",
    'share_type_text'           => "Sie können den Upload per Mail oder per Link teilen.",
    'destruct_text'             => "Der Upload wird automatisch gelöscht, sobald alle Empfänger die Dateien heruntergeladen haben.",
    'password_text'             => "Dieser Upload kann nur durch die Eingabe eines Passwortes heruntergeladen werden.",
    'select_pref_lang'          => "Wählen Sie Ihre bevorzugte Sprache",
    'select_language'           => "Sprache auswählen",
    'copy_url'                  => "URL kopieren",
    'sign_in'                   => "Anmelden",
    'invalid_login'             => "Falscher Login",
    'upload_processing'         => "Diese Dateien werden gerade hochgeladen,bitte kommen Sie später zurück.",
    'not_allowed'               => "Sie sind nicht berechtigt, diese Datei herunterzuladen.",
    'invalid_pass'              => "Passwort falsch",
    'msg_seconds'               => "Sekunde(n)",
    'msg_minutes'               => "Minute(n)",
    'msg_hours'                 => "Stunde(n)",
    'msg_remaining'             => "verbleibend",
    'remaining'                 => "verbleibend",
    'save'                      => "Speichern",

    //Added in update 1.2
    'not_available_pass'        => "(Premium erforderlich)",

    //Added in update 1.2.2
    'uploaded_of'               => "hochgeladen von",
    'cancel'                    => "Abbrechen",
    'destructed_on'             => "Endgültig gelöscht am",
    'open'                      => "Öffnen",
    'accept_terms'              => "Sie müssen die AGB akzeptieren, um fortzusetzen.",
    'accept'                    => "Akzeptieren",

    //Added in update 1.2.3
    'view_terms'                => "Bedingungen anzeigen",

    //Added in update 1.2.6
    'month'                     => "Monat",
    'week'                      => "Woche",
    'day'                       => "Tag",
    'hour'                      => "Stunde",
    'months'                    => "Monate",
    'weeks'                     => "Wochen",
    'days'                      => "Tage",
    'hours'                     => "Stunden",

    //Added in update 1.2.7
    'drop_files_here'           => "Dateien hier ablegen",

    //Added in update 1.4.6
    'are_you_sure'              => "Sind Sie sicher?",

    // Added in update 2.0
    'login'                     => "Anmelden",
    'user_login'                => "Benutzeranmeldung",

    // Added in update 2.0.3
    'logout'                    => "Abmeldung",

    // Added in update 2.1.4
    'contact'                   => "Kontakt",
    'subject'                   => "Betreff",
    'send'                      => "Senden",
    'message_sent'              => "Ihre Nachricht wurde gesendet!",

    // Added in update 2.1.5
    'contact_email_description'   => 'Ihre E-Mail Adresse',
    'contact_subject_description' => 'Ihr Betreff',
    'contact_message_description' => 'Ihre Nachricht',

    // Added in update 2.1.6
    'invalid_email'               => "Die eingegebene E-Mail-Adresse ist ungültig",

    // Added in update 2.2.6
    'add_more_files'              => 'Weitere Dateien hinzufügen',
    'email_to'                    => 'E-Mail an',
    'email_from'                  => 'E-Mail von',
    'how_to_share_file'           => 'Wie möchten Sie die Datei senden?',
    'send_using_email'            => 'Senden per E-Mail',
    'get_sharable_link'           => 'Einen teilbaren Link erhalten',
    'protect_upload_password'     => 'Schützen Sie den Upload mit einem Passwort',
    'when_file_expire'            => 'Wann soll die Datei ablaufen?',
    'upload'                      => 'Hochladen',
    'lets_begin_files'            => "Beginne mit dem Hinzufügen von Dateien",
    'files_selected'              => "ausgewählte Dateien",
    'selected'                    => "ausgewählt",
    'recipient_exists'            => "Empfänger existiert bereits",
    'upload_more'                 => "Mehr hochladen",
    'refresh'                     => "Aktualisieren",
    'download_will_be_deleted'    => "Läuft ab am",
    'download_is_ready'           => "Ihr Download ist fertig",
    'delete'                      => "Löschen",

    // Added in update 2.3.6
    'internet_down'               => 'Server nicht erreichbar, sind Sie mit dem Internet verbunden?',
    'do_not_expire'               => 'Läuft nicht ab',
    'select_recipient'            => '- Empfänger auswählen -',

    // Added in update 2.3.9
    'verify_email_title'          => "Bestätigung der EMail-Adresse",
    'verify_email_desc'           => "Wir müssen wissen, dass Sie es wirklich sind, deshalb haben wir einen Bestätigungscode an folgende Adresse gesendet: ",
    'enter_verify_code'           => "Bestätigungscode eingeben",
    'verify'                      => "Bestätigung",
    'incorrect_verify'            => "Der Bestätigungscode war nicht korrekt!",

    // Added in update 2.4.1
    'error'                       => "Fehler",
    'download_browser_unsupported'=> "Ihr Browser unterstützt keinen In-App-Download, bitte öffnen Sie die URL in Ihrem mobilen Browser.",

    // Added in update 2.4.4
    'unlock_download'             => "Download freischalten",
    'preview_files'               => "Dateivorschau",

    // Added in update 2.4.5
    'copied'                      => "Kopiert!",

    // Added in update 2.4.6
    'login_email'                 => "E-Mail",
    'login_password'              => "Passwort",
    'never'                       => "Niemals",
    'add_folders'                 => "Ordner hinzufügen",
    'or_select_folder'            => "Oder einen kompletten Ordner auswählen",

    // Added in update 2.4.8
    'are_you_sure_delete'         => "Are your sure you want to delete this file?"

    // Please help translating Sharify by sending this fully translated file to support@Abhi.com
    // and we'll make sure to include it in the next update
);
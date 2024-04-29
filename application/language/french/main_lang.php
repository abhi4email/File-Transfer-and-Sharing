<?php
/**
 * Sharify - Online file sharing
 * Language
 * @lang French
 * @author Bruno G (DropTansfert.com) - 22/09/2021
 */

defined('BASEPATH') OR exit('No direct script access allowed');

$lang = array(
    'share_files' 				=> 'Partager',
    'ok' 		   				=> 'OK',
    'close' 					=> 'Fermer',
    'files' 					=> 'Fichiers',
    'link' 						=> 'Lien',
    'email' 					=> 'E-Mail',
    'success' 					=> 'Fini !',
    'password'        			=> 'Mot de passe',
    'message' 					=> 'Message',
    'download' 					=> 'Télécharger',
    'destruct' 					=> 'Supprimer',
    'select_files' 				=> 'Sélectionner le(s) fichier(s)',
    'add_more' 					=> 'Ajouter',
    'total_size' 				=> 'Taille totale',
    'total_files'				=> 'Fichiers totaux',
    'download_id' 				=> 'ID de téléchargement',
    'add_password' 				=> 'Ajouter un mot de passe',
    'upload_error' 				=> "Erreur lors de l'upload",
    'wrong_pass' 				=> 'Mot de passe incorrect !',
    'enter_email' 				=> "E-mail de l'ami",
    'enter_own_email' 			=> 'Votre adresse e-mail',
    'fill_fields' 				=> 'Remplissez tous les champs !',
    'message_receiver' 			=> 'Ajoutez un message',
    'download_started' 			=> 'Le téléchargement a commencé',
    'enable_destuct' 			=> 'Activer la destruction automatique',
    'file_too_large' 			=> 'Le fichier est trop volumineux.',
    'fill_password' 			=> "Merci d'indiquer le mot de passe ci-dessous",
    'upload_not_found' 			=> 'Fichier non trouvé, peut-être a t-il été supprimé ?',
    'processing_files' 			=> "Fichier en cours de traitement et génération du lien, un instant s'il vous plaît",
    'success_link' 				=> 'Votre fichier est en ligne, vous pouvez utiliser le lien ci-dessous',
    'success_email' 			=> 'Votre fichier est en ligne, vous allez recevoir un e-mail sous peu',

    //Added in update 1.0.2
    'select_share' => 'Sélectionner le mode de partage:',
    'file_blocked' => "Ce type de fichier n'est pas autorisé !",

    //Added in update 1.0.4
    'report_file' => 'Signaler le fichier',
    'report_file_text' => 'Êtes-vous certain de vouloir signaler ce fichier ?',
    'report' => 'Signaler',
    'max_files' => 'Trop de fichiers sélectionnés !',

    //Added in update 1.0.7
    'yes' => 'Oui',
    'no' => 'Non',
    'max' => 'Max.',
    'upload_settings' => 'Paramètres',
    'change_language' => 'Langue',
    'terms_service' => "CGU",
    'about_us' => 'À propos',
    'protect_with_pass' => 'Protéger avec un mot de passe',
    'destruct_file' => 'Supprimer le fichier',
    'leave_empty_password' => 'Laisser vide pour désactiver le mot de passe',
    'share_type' => 'Type de partage',
    'share_type_text' => 'Vous pouvez partager vos fichiers par e-mail, ou directement partager le lien en le copiant là où vous voulez.',
    'destruct_text' => "Le fichier sera détruit automatiquement après que tous les destinataires l'aient téléchargé.",
    'password_text' => "Votre fichier ne peut être téléchargé qu'après avoir donné un mot de passe.",
    'select_pref_lang' => 'Sélectionner la langue de votre choix',
    'select_language' => 'Changer de langue',
    'copy_url' => "Copier l'URL",
    'sign_in' => 'Se connecter',
    'invalid_login' => 'Identifiants incorrects',
    'upload_processing' => 'Nous traitons votre fichier, merci de revenir plus tard.',
    'not_allowed' => 'Vous n\'êtes pas autorisé à accéder à ce fichier.',
    'invalid_pass' => 'Mot de passe incorrect',
    'msg_seconds' => 'Seconde(s)',
    'msg_minutes' => 'Minute(s)',
    'msg_hours' => 'Heure(s)',
    'msg_remaining' => 'restant',
    'save' => 'Enregistrer',

    //Added in update 1.2
    'not_available_pass' => '(Compte premium uniquement)',

    //Added in update 1.2.2
    'uploaded_of'               => 'téléchargé de',
    'cancel'                    => 'Annuler',
    'destructed_on'             => 'Sera détruit le',
    'open'                      => 'Ouvrir',
    'accept_terms'              => 'Vous devrez accepter nos CGU pour accéder à notre site Web..',
    'accept'                    => 'Accepter',

    //Added in update 1.2.3
    'view_terms'                => 'Voir les CGU',

    //Added in update 1.2.6
    'month'                     => 'mois',
    'week'                      => 'semaine',
    'day'                       => 'jour',
    'hour'                      => 'heure',
    'months'                    => 'mois',
    'weeks'                     => 'semaines',
    'days'                      => 'jours',
    'hours'                     => 'heures',

    //Added in update 1.2.7
    'drop_files_here'           => 'Déposez vos fichiers ici',

    // Added in update 2.0
    'login'                     => "S'identifier",
    'user_login'                => "Utilisateur en ligne",

    // Added in update 2.0.3
    'logout'                    => "Déconnexion",

    // Added in update 2.1.4
    'contact'                   => "Contact",
    'subject'                   => "Sujet",
    'send'                      => "Envoyer",
    'message_sent'              => "Votre message a bien été envoyé !",

    // Added in update 2.1.5
    'contact_email_description'   => 'Votre adresse mail',
    'contact_subject_description' => 'Sujet du message',
    'contact_message_description' => 'Votre message',
  
    // Added in update 2.1.6
    'invalid_email'               => "Cette adresse mail est invalide",

    // Added in update 2.2.6
    'add_more_files'              => 'Ajouter plus de fichiers',
    'email_to'                    => 'Mail du destinataire',
    'email_from'                  => "Mail de l'expéditeur",
    'how_to_share_file'           => 'Comment partager les fichier ?',
    'send_using_email'            => 'Par mail',
    'get_sharable_link'           => 'Avec un lien',
    'protect_upload_password'     => 'Protégez le téléchargement avec un mot de passe',
    'when_file_expire'            => 'Quand le téléchargement doit-il expirer?',
    'upload'                      => 'Télécharger',
    'lets_begin_files'            => "Commençons par ajouter quelques fichiers",
    'files_selected'              => "fichiers sélectionnés",
    'selected'                    => "Taille",
    'recipient_exists'            => "Le destinataire existe déjà",
    'upload_more'                 => "Télécharger plus",
    'refresh'                     => "Rafraichier",
    'download_will_be_deleted'    => "Le fichier sera détruit le",
    'download_is_ready'           => "Votre téléchargement est prêt",
    'delete'                      => "Supprimer",

    // Added in update 2.3.6
    'internet_down'               => "Impossible d'atteindre le serveur, votre connexion Internet est-elle en panne?",
    'do_not_expire'               => "N'expire pas",
    'select_recipient'            => '- Sélectionnez le destinataire -',

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

    // Please help translating Sharify by sending this fully translated file to support@Abhi.com
    // and we'll make sure to include it in the next update
);
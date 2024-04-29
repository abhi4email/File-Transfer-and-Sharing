CREATE TABLE `Sharify_accounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `ip` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `Sharify_backgrounds` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `src` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  `duration` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `Sharify_backgrounds` WRITE;
/*!40000 ALTER TABLE `Sharify_backgrounds` DISABLE KEYS */;

INSERT INTO `Sharify_backgrounds` (`id`, `src`, `url`)
VALUES
	(1,'assets/backgrounds/default_1.jpg','http://Abhi.com'),
	(2,'assets/backgrounds/default_2.jpg','http://Abhi.com'),
	(3,'assets/backgrounds/default_3.jpg','http://Abhi.com');

/*!40000 ALTER TABLE `Sharify_backgrounds` ENABLE KEYS */;
UNLOCK TABLES;

CREATE TABLE `Sharify_downloads` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `download_id` varchar(100) NOT NULL,
  `time` int(100) NOT NULL,
  `ip` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `Sharify_files` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `upload_id` varchar(500) NOT NULL,
  `secret_code` varchar(500) NOT NULL,
  `file` varchar(500) NOT NULL,
  `original_path` LONGTEXT NOT NULL,
  `size` varchar(100) DEFAULT NULL,
  `time` int(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `Sharify_language` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `path` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `Sharify_language` WRITE;
/*!40000 ALTER TABLE `Sharify_language` DISABLE KEYS */;

INSERT INTO `Sharify_language` (`id`, `name`, `path`)
VALUES
	(1,'English','english'),
	(2,'Dutch','dutch');

/*!40000 ALTER TABLE `Sharify_language` ENABLE KEYS */;
UNLOCK TABLES;

CREATE TABLE `Sharify_log` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `time` int(100) NOT NULL,
  `msg` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `Sharify_receivers` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `upload_id` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `private_id` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `Sharify_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE Sharify_sessions ADD PRIMARY KEY (id);

CREATE TABLE `Sharify_settings` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `site_name` varchar(100) NOT NULL,
  `site_title` varchar(100) NOT NULL,
  `site_desc` varchar(200) NOT NULL,
  `site_keywords` varchar(255) NOT NULL,
  `site_url` varchar(100) NOT NULL,
  `lock_page` varchar(100) NOT NULL,
  `name_on_file` varchar(100) NOT NULL,
  `max_size` int(100) NOT NULL,
  `max_chunk_size` int(10) NOT NULL DEFAULT 1,
  `max_files` int(200) NOT NULL,
  `max_file_reports` int(100) NOT NULL,
  `blocked_types` text,
  `expire` LONGTEXT NOT NULL,
  `default_expire` int(10) DEFAULT NULL,
  `upload_id_length` int(10) NOT NULL DEFAULT 8,
  `upload_dir` varchar(100) NOT NULL,
  `favicon_path` varchar(100) NOT NULL,
  `logo_path` varchar(100) NOT NULL,
  `theme_color` varchar(10) DEFAULT NULL,
  `theme_color_secondary` varchar(10) DEFAULT NULL,
  `theme_color_text` varchar(10) DEFAULT NULL,
  `language` varchar(100) NOT NULL,
  `bg_timer` int(100) NOT NULL,
  `email_verify` varchar(10) NOT NULL DEFAULT 'false',
  `default_destruct` varchar(100) NOT NULL,
  `default_sharetype` varchar(100) NOT NULL,
  `default_email_to` text NOT NULL,
  `password_enabled` varchar(100) NOT NULL,
  `destruct_enabled` varchar(10) DEFAULT 'true',
  `share_enabled` varchar(10) DEFAULT 'true',
  `file_previews` varchar(10) DEFAULT 'false',
  `analytics` text NOT NULL,
  `enable_sender_cookie` varchar(10) DEFAULT 'false',
  `accept_terms` varchar(100) NOT NULL,
  `disable_ip_logging` varchar(10) NOT NULL DEFAULT 'false',
  `email_from_name` varchar(100) NOT NULL,
  `email_from_email` varchar(100) NOT NULL,
  `email_to_name` varchar(100) NOT NULL,
  `email_server` varchar(100) NOT NULL,
  `smtp_host` varchar(100) NOT NULL,
  `smtp_auth` varchar(100) NOT NULL,
  `smtp_secure` varchar(100) NOT NULL,
  `smtp_port` int(100) NOT NULL,
  `smtp_username` varchar(100) NOT NULL,
  `smtp_password` varchar(100) NOT NULL,
  `terms_text` LONGTEXT NOT NULL,
  `about_text` LONGTEXT NOT NULL,
  `ad_1_enabled` varchar(100) NOT NULL,
  `ad_1_code` LONGTEXT NOT NULL,
  `ad_2_enabled` varchar(100) NOT NULL,
  `ad_2_code` LONGTEXT NOT NULL,
  `purchase_code` varchar(100) NOT NULL,
  `version` varchar(100) NOT NULL,
  `debug_mode` varchar(10) DEFAULT 'false',
  `last_update_check` int(100) NOT NULL,
  `encrypt_files` int(1) DEFAULT NULL,
  `timezone` varchar(255) DEFAULT NULL,
  `recaptcha_key` varchar(100) DEFAULT NULL,
  `recaptcha_secret` varchar(100) DEFAULT NULL,
  `contact_enabled` varchar(10) DEFAULT NULL,
  `contact_email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `Sharify_settings` WRITE;
/*!40000 ALTER TABLE `Sharify_settings` DISABLE KEYS */;

INSERT INTO `Sharify_settings` (`id`, `site_name`, `site_title`, `site_desc`, `site_keywords`, `site_url`, `lock_page`, `name_on_file`, `max_size`, `max_chunk_size`, `max_files`, `max_file_reports`, `blocked_types`, `expire`, `upload_dir`, `favicon_path`, `logo_path`, `language`, `bg_timer`, `default_destruct`, `default_sharetype`, `default_email_to`, `password_enabled`, `analytics`, `accept_terms`, `email_from_name`, `email_from_email`, `email_to_name`, `email_server`, `smtp_host`, `smtp_auth`, `smtp_secure`, `smtp_port`, `smtp_username`, `smtp_password`, `terms_text`, `about_text`, `ad_1_enabled`, `ad_1_code`, `ad_2_enabled`, `ad_2_code`, `purchase_code`, `version`, `last_update_check`, `encrypt_files`)
VALUES
	(1,'Sharify','Sharify - Online file sharing','Online file sharing','','','false','Sharify',1024,1,10,2,'',1209600,'uploads/','assets/img/icon.png','assets/img/logo.png','english',5,'no','mail','','true','','yes','No-Reply Sharify','noreply@yourdomain.com','','LOCAL','','true','tls',587,'','','Files sent through this application are only intended for the specific receiver, sharing the files with other people is not allowed','This is an about text that can be modified in the admin panel','false','','false','','','2.4.8',0,0);

/*!40000 ALTER TABLE `Sharify_settings` ENABLE KEYS */;
UNLOCK TABLES;

CREATE TABLE `Sharify_social` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `facebook` varchar(100) NOT NULL,
  `twitter` varchar(100) NOT NULL,
  `google` varchar(100) NOT NULL,
  `instagram` varchar(100) NOT NULL,
  `github` varchar(100) NOT NULL,
  `tumblr` varchar(100) NOT NULL,
  `pinterest` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `Sharify_social` WRITE;
/*!40000 ALTER TABLE `Sharify_social` DISABLE KEYS */;

INSERT INTO `Sharify_social` (`id`, `facebook`, `twitter`, `google`, `instagram`, `github`, `tumblr`, `pinterest`)
VALUES
	(1,'http://facebook.com/Abhi','http://twitter.com/Abhi_us','','','http://github.com','','');

/*!40000 ALTER TABLE `Sharify_social` ENABLE KEYS */;
UNLOCK TABLES;

CREATE TABLE `Sharify_templates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(100) NOT NULL,
  `msg` text NOT NULL,
  `lang` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `Sharify_templates` WRITE;
/*!40000 ALTER TABLE `Sharify_templates` DISABLE KEYS */;

INSERT INTO `Sharify_templates` (`id`, `type`, `msg`, `lang`)
VALUES
	(1,'receiver','Dear {email_to},\r\n\r\nYou have received some file(s) from {email_from} with a total size of {size}.\r\nThe file(s) will be destroyed after {expire_time}.\r\n\r\n<b>Files:</b>\r\n{file_list}\r\n\r\n<b>Message:</b>\r\n{message}\r\n\r\n{download_btn}\r\n\r\nBest regards,\r\n{site_name}','english'),
	(2,'sender','Dear,\r\n\r\nThank you for using {site_name} your file(s) have been successfully uploaded and an email has been sent to the recipients. The uploaded files will be destroyed after {expire_time}.\r\n\r\nYou can manually delete the files over <a href="{delete_url}">here</a>\r\n\r\n<b>Files sent to:</b>\r\n{email_list}\r\n<b>Files sent:</b>\r\n{file_list}\r\n\r\n{download_btn}\r\n\r\nBest regards,\r\n{site_name}\r\n','english'),
	(3,'destroyed','Dear,\r\n\r\nThis is just an email to let you know that your files on <strong>{site_name}</strong> have been destroyed.\r\n\r\n<b>Files destroyed:</b>\r\n{file_list}\r\n\r\nBest regards,\r\n{site_name}','english'),
	(4,'downloaded','Dear,\r\n\r\n{download_email} has downloaded your file(s) from {site_name}.\r\n\r\n<b>Files downloaded:</b>\r\n{file_list}\r\n\r\n<b>Receivers of files:</b>\r\n{email_list}\r\n\r\n{download_btn}\r\n\r\nBest regards,\r\n{site_name}','english'),
	(5,'receiver_subject','You have received some files !','english'),
	(6,'sender_subject','Your items have been sent !','english'),
	(7,'destroyed_subject','Your items have been destroyed !','english'),
	(8,'downloaded_subject','Someone has downloaded your items !','english'),
	(9,'receiver','Beste,\r\n\r\n{email_from} heeft u bestanden gestuurd met een totale grootte van {size}\r\nDe bestanden worden vernietigd over {expire_time}\r\n\r\n<b>Bestanden:</b>\r\n{file_list}\r\n\r\n<b>Bericht:</b>\r\n{message}\r\n\r\n{download_btn}\r\n\r\nMet vriendelijke groet,\r\n{site_name}','dutch'),
	(10,'sender','Beste,\r\n\r\nBedankt voor het gebruiken van {site_name}, de bestanden zijn succesvol naar de ontvangers gestuurd.\r\nDe bestanden worden vernietigd in {expire_time}\r\n\r\n<b>Verstuurd naar:</b>\r\n{email_list}\r\n<b>Bestanden verstuurd:</b>\r\n{file_list}\r\n\r\n{download_btn}\r\n\r\nMet vriendelijke groet,\r\n{site_name}\r\n','dutch'),
	(11,'destroyed','Beste,\r\n\r\nUw bestanden op {site_name} zijn vernietigd.\r\n\r\n<b>Bestanden vernietigd:</b>\r\n{file_list}\r\n<b>Bestanden waren verstuurd  naar:</b>\r\n{email_list}\r\n\r\nMet vriendelijke groet,\r\n{site_name}','dutch'),
	(12,'downloaded','Beste,\r\n\r\nDit is een email om u ervan op hoogte te stellen dat {download_email} uw bestanden heeft gedownload.\r\n\r\n<b>Bestanden:</b>\r\n{file_list}\r\n\r\n<b>Ontvangers:</b>\r\n{email_list}\r\n\r\n{download_btn}\r\n\r\nMet vriendelijke groet,\r\n{site_name}','dutch'),
	(13,'receiver_subject','U heeft bestanden ontvangen','dutch'),
	(14,'sender_subject','Uw bestanden zijn verzonden','dutch'),
	(15,'destroyed_subject','Uw bestanden zijn vernietigd','dutch'),
	(16,'downloaded_subject','Iemand heeft uw bestanden gedownload','dutch'),
    (17,'email_verify_subject', 'Your verification code', 'english'),
    (18,'email_verify', 'Dear,\r\n\r\nUse the code <b>{code}</b> to start your upload.\r\n\r\nBest regards,\r\n{site_name}', 'english'),
    (19,'email_verify_subject', 'Jouw verificatie code', 'dutch'),
    (20,'email_verify', 'Beste,\r\n\r\nGebruik de code <b>{code}</b> om jouw upload te starten.\r\n\r\nMet vriendelijke groet,\r\n{site_name}', 'dutch');

/*!40000 ALTER TABLE `Sharify_templates` ENABLE KEYS */;
UNLOCK TABLES;

CREATE TABLE `Sharify_themes` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `path` varchar(200) NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `Sharify_themes` WRITE;
/*!40000 ALTER TABLE `Sharify_themes` DISABLE KEYS */;

INSERT INTO `Sharify_themes` (`id`, `name`, `path`, `status`)
VALUES
    (1,'Modern','modern','ready');

/*!40000 ALTER TABLE `Sharify_themes` ENABLE KEYS */;
UNLOCK TABLES;

CREATE TABLE `Sharify_updates` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `version` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `Sharify_uploads` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `upload_id` varchar(200) NOT NULL,
  `email_from` varchar(500) NOT NULL,
  `message` varchar(5000) NOT NULL,
  `secret_code` varchar(500) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `size` varchar(100) NOT NULL,
  `time` int(100) NOT NULL,
  `time_expire` int(100) NOT NULL,
  `ip` varchar(100) NOT NULL,
  `count` int(100) NOT NULL,
  `share` varchar(100) NOT NULL,
  `destruct` varchar(100) NOT NULL,
  `flag` varchar(100) NOT NULL,
  `lang` varchar(100) NOT NULL,
  `encrypt` varchar(500) DEFAULT NULL,
  `pm_email` varchar(200) DEFAULT NULL,
  `file_previews` varchar(10) DEFAULT 'false',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `Sharify_users` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `ip` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `Sharify_pages` (
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
    `type` varchar(100) NOT NULL DEFAULT '',
    `title` varchar(255) DEFAULT NULL,
    `content` longtext DEFAULT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `Sharify_email_verify` (
   `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
   `email` longtext NOT NULL,
   `time` int(11) NOT NULL,
   `code` int(11) NOT NULL,
   `status` varchar(20) NOT NULL DEFAULT 'pending',
   PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
ALTER TABLE Sharify_settings ADD COLUMN `email_verify` varchar(10) DEFAULT 'false' AFTER `bg_timer`;

INSERT INTO `Sharify_templates` (`type`, `msg`, `lang`)
VALUES
    ('email_verify_subject', 'Your verification code', 'english'),
    ('email_verify', 'Dear,\r\n\r\nUse the code <b>{code}</b> to start your upload.\r\n\r\nBest regards,\r\n{site_name}', 'english'),
    ('email_verify_subject', 'Jouw verificatie code', 'dutch'),
    ('email_verify', 'Beste,\r\n\r\nGebruik de code <b>{code}</b> om jouw upload te starten.\r\n\r\nMet vriendelijke groet,\r\n{site_name}', 'dutch');

CREATE TABLE `Sharify_email_verify` (
   `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
   `email` longtext NOT NULL,
   `time` int(11) NOT NULL,
   `code` int(11) NOT NULL,
   `status` varchar(20) NOT NULL DEFAULT 'pending',
   PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
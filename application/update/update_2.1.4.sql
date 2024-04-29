ALTER TABLE Sharify_settings ADD `site_keywords` varchar(255) DEFAULT NULL AFTER `site_desc`;
ALTER TABLE Sharify_settings ADD `recaptcha_key` varchar(100) DEFAULT NULL;
ALTER TABLE Sharify_settings ADD `recaptcha_secret` varchar(100) DEFAULT NULL;
ALTER TABLE Sharify_settings ADD `contact_enabled` varchar(10) DEFAULT 'false';
ALTER TABLE Sharify_settings ADD `contact_email` varchar(255) DEFAULT NULL;
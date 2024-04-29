ALTER TABLE Sharify_settings MODIFY default_email_to TEXT DEFAULT NULL;
ALTER TABLE Sharify_settings ADD COLUMN `destruct_enabled` varchar(10) DEFAULT 'true' AFTER `password_enabled`;
ALTER TABLE Sharify_settings ADD COLUMN `share_enabled` varchar(10) DEFAULT 'true' AFTER `destruct_enabled`;
ALTER TABLE Sharify_settings ADD COLUMN `default_expire` int(10) DEFAULT NULL AFTER `expire`;
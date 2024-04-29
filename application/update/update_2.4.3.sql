ALTER TABLE Sharify_settings ADD COLUMN `file_previews` varchar(10) DEFAULT 'false' AFTER `share_enabled`;

ALTER TABLE Sharify_downloads ALTER COLUMN email SET DEFAULT NULL;
ALTER TABLE Sharify_downloads ALTER COLUMN ip SET DEFAULT NULL;

ALTER TABLE Sharify_uploads ADD COLUMN `file_previews` varchar(10) DEFAULT 'false';
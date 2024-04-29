CREATE TABLE IF NOT EXISTS `Sharify_sessions` (
        `id` varchar(128) NOT NULL,
        `ip_address` varchar(45) NOT NULL,
        `timestamp` int(10) unsigned DEFAULT 0 NOT NULL,
        `data` blob NOT NULL,
        KEY `ci_sessions_timestamp` (`timestamp`)
);

UPDATE Sharify_templates SET lang = LOWER(lang);
UPDATE Sharify_templates SET lang = REPLACE(lang, '.php', '');

UPDATE Sharify_uploads SET lang = LOWER(lang);
UPDATE Sharify_uploads SET lang = REPLACE(lang, '.php', '');

UPDATE Sharify_uploads SET destruct = LOWER(destruct);
UPDATE Sharify_uploads SET password = '' WHERE password = 'EMPTY';

UPDATE Sharify_themes SET path = REPLACE(path, '/', '');

TRUNCATE TABLE Sharify_accounts;

ALTER TABLE Sharify_files ADD `size` int(20) DEFAULT 0;
ALTER TABLE Sharify_files ADD `time` int(20) DEFAULT NULL;

ALTER TABLE Sharify_backgrounds ADD `duration` int(10) DEFAULT NULL;

ALTER TABLE Sharify_settings ADD `timezone` varchar(255) DEFAULT NULL;

UPDATE Sharify_settings SET `language` = LOWER(`language`);
UPDATE Sharify_settings SET `language` = REPLACE(`language`, '.php', '');

UPDATE Sharify_language SET `path` = LOWER(`path`);
UPDATE Sharify_language SET `path` = REPLACE(`path`, '.php', '');

/** V2.0.3 **/

ALTER TABLE Sharify_settings ADD `timezone` varchar(255) DEFAULT NULL;


INSERT INTO `Sharify_updates` (`version`, `type`, `date`) VALUES ('2.1.6', '', CURRENT_TIMESTAMP);
UPDATE Sharify_settings SET version = '2.1.3' LIMIT 1;
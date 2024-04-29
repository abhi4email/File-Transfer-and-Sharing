ALTER TABLE Sharify_settings MODIFY expire LONGTEXT;
ALTER TABLE Sharify_files ADD COLUMN `original_path` LONGTEXT DEFAULT NULL AFTER `file`;
ALTER TABLE Sharify_settings ADD COLUMN `theme_color` varchar(10) DEFAULT NULL AFTER `logo_path`;
ALTER TABLE Sharify_settings ADD COLUMN `theme_color_secondary` varchar(10) DEFAULT NULL AFTER `theme_color`;
ALTER TABLE Sharify_settings ADD COLUMN `theme_color_text` varchar(10) DEFAULT NULL AFTER `theme_color_secondary`;
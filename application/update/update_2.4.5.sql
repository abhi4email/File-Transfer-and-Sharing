ALTER TABLE Sharify_settings MODIFY terms_text LONGTEXT;
ALTER TABLE Sharify_settings MODIFY about_text LONGTEXT;
alter table Sharify_files convert to character set utf8mb4 collate utf8mb4_unicode_ci;
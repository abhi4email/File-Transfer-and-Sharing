ALTER TABLE Sharify_settings ADD COLUMN `upload_id_length` int(10) DEFAULT 8 AFTER `expire`;
ALTER TABLE Sharify_settings ADD COLUMN `enable_sender_cookie` varchar(10) DEFAULT 'false' AFTER `analytics`;
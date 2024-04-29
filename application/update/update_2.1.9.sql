ALTER TABLE `Sharify_settings`
ADD COLUMN `max_chunk_size`  int(10) NOT NULL DEFAULT 1 AFTER `max_size`;